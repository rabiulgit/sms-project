<?php

namespace App\Http\Controllers;

use App\Fees;
use App\FeesCategory;
use App\FeesSetup;
use App\Session;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use Validator;

class FeesBookController extends Controller
{
    public function list(){
        $data['session'] = Session::where('status', 1)->get();
        $data['feesCategory'] = FeesCategory::where('status', 1)->get();
        $data['students'] = Students::where('status', 1)->get();

        $data['fees'] = Fees::leftJoin('session', 'session.id', '=', 'fees_book.session_id')
        ->leftJoin('fees_category', 'fees_category.id', '=', 'fees_book.cat_id')
        ->leftJoin('students', 'students.id', '=', 'fees_book.student_id')
        ->leftJoin('classes', 'classes.id', '=', 'students.class_id')
        ->leftJoin('sections', 'sections.id', '=', 'students.section_id')
        ->leftJoin('groups', 'groups.id', '=', 'students.group_id')
        ->select([
            'session.session_start',
            'session.session_end',
            'fees_category.name as cat_name',
            'students.student_id as student_unique_id',
            DB::raw("CONCAT(students.first_name, ' ', students.last_name) as student_name"),
            'students.roll',
            'classes.name as class',
            'sections.name as section',
            'groups.name as group',
            'fees_book.*',
        ])->paginate(10);

       
        return view('fees_book', $data);
    }

    public function store(Request $request){
      
        $existing_fees = $query = Fees::where('session_id', $request->session_id)
        ->where('student_id', $request->student_id)
        ->where('cat_id', $request->cat_id);
        if($request->cat_id == 2){
            $existing_fees->where('month', date('F', strtotime($request->month)));
        }
        $existing_fees = $existing_fees->first();

        if(!empty($existing_fees)){
            \Illuminate\Support\Facades\Session::flash('error_message', 'Already paid!');
            return redirect()->back();
        }


        $fees = new Fees();

        $fees->session_id = $request->session_id;
        $fees->student_id = $request->student_id;
        $fees->cat_id = $request->cat_id;
        $fees->value = $request->value;
        if($request->cat_id == 2) {
            $fees->month = date('F', strtotime($request->month));
        }else{
            $month = FeesSetup::where('session_id', $request->session_id)->where('cat_id', $request->cat_id)->value('month');
            $fees->month = $month;
        }

        $fees->save();

        \Illuminate\Support\Facades\Session::flash('success_message', 'Data is stored successfully!');
        return redirect()->route('feesBookList');
    }

    public function feesValueByCategory(Request $request)
    {
        try {
            $value = FeesSetup::where('session_id', $request->session_id)->where('cat_id', $request->cat_id)->value('value');
            if (!$value) {
                $data = ['responseCode' => 0, 'data' => 'Sorry! Value not found in this type.'];
                return response()->json($data);
            }
            $data = ['responseCode' => 1, 'data' => $value];
            return response()->json($data);

        } catch (\Exception $e) {
            $data = ['responseCode' => -1, 'data' => $data];
            return response()->json($data);
        }
    }

    public function generateVoucher($fees_id)
    {
        try {
        
         

            $data['feesCategory'] = FeesCategory::where('status', 1)->get();
            $data['feesBook'] = Fees::leftJoin('session', 'session.id', '=', 'fees_book.session_id')
            ->leftJoin('fees_category', 'fees_category.id', '=', 'fees_book.cat_id')
            ->leftJoin('students', 'students.id', '=', 'fees_book.student_id')
            ->leftJoin('classes', 'classes.id', '=', 'students.class_id')
            ->leftJoin('sections', 'sections.id', '=', 'students.section_id')
            ->leftJoin('groups', 'groups.id', '=', 'students.group_id')
            ->where('fees_book.id', $fees_id)
            ->first([
                'session.session_start',
                'session.session_end',
                'fees_category.name as cat_name',
                'students.student_id as student_unique_id',
                DB::raw("CONCAT(students.first_name, ' ', students.last_name) as student_name"),
                'students.roll',
                'students.gender',
                'classes.name as class',
                'sections.name as section',
                'groups.name as group',
                'fees_book.*',
            ]);
             
             
            $contents = view('voucher', $data)->render();


            $mpdf = new mPDF(['setAutoBottomMargin' => 'pad', 'setAutoTopMargin' => 'pad']);

            // static header section
            $mpdf->SetHTMLHeader('<div style="margin-bottom: 20px;">
                <table class="table" cellspacing="0" width="100%">
                <tr>
                
                <td> <h4 style="font-size: 14px; color: #092270;">Invoice No:<span style="font-weight: bold; font-size: 14px;">0012345</span></h4> </td>
              

                <td width="70%" style="text-align: right;">
                <h4 style="font-size: 18px; color: #092270;">School Management System</h4>
                
                <h4 style="font-size: 14px; color: #092270;">Date:<span style="font-weight: bold; font-size: 14px;">{DATE Y-m-d}</span></h4> </td>
               
                <p style="font-size: 12px;">Rabiul Hasan</p>
                </td>
                </tr>
                </table>
                </div>');

            $mpdf->useSubstitutions;
            $mpdf->SetProtection(array('print'));
            $mpdf->SetDefaultBodyCSS('color', '#000');
            $mpdf->SetTitle("School Management System");
            $mpdf->SetSubject("Subject");
            $mpdf->SetAuthor("Rabiul Hasan");
            $mpdf->autoScriptToLang = true;
            $mpdf->baseScript = 1;
            $mpdf->autoVietnamese = true;
           
            $mpdf->autoLangToFont = true;

            $mpdf->SetDisplayMode('fullwidth');

            // static footer section
            $mpdf->SetHTMLFooter('
                <div style="margin-top:20px;">
                <table class="table" width="100%">
                <tr>
                <td style="align:left; width: 75%">
                _____________________________<br/>
                Depositor Signature<br/>
                Mobile No:
                </td>
                <td style="text-align:right;">
                _____________________________<br/>
                Bank Officer Signature
                </td>
                </tr>
                </table>

                </div>
                <table width="100%">
                <tr>
                <td align="left">
                <span style="font-size: 10px;"><i>Download time: {DATE j-M-Y h:i a}</i></span>
                </td>
                <td align="right">
                <span style="font-size: 10px;">Page <strong>{PAGENO}</strong> of <strong>{nbpg}</strong></span>
                </td>
                </tr>
                </table>');
            $stylesheet = file_get_contents('assets/stylesheets/invoice-print.css');
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML($contents, 2);
            $mpdf->defaultfooterfontsize = 10;
            $mpdf->defaultfooterfontstyle = 'B';
            $mpdf->defaultfooterline = 0;
            $mpdf->SetCompression(true);
            $mpdf->Output('Voucher.pdf', 'I');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
