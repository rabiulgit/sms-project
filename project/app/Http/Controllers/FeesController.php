<?php

namespace App\Http\Controllers;

use App\Fees;
use App\FeesCategory;
use App\FeesSetup;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class FeesController extends Controller
{
    public function list(){
        $data['session'] = Session::where('status', 1)->get();
        $data['feesCategory'] = FeesCategory::where('status', 1)->get();

        $data['feesSetups'] = FeesSetup::leftJoin('session', 'session.id', '=', 'fees_setup.session_id')
        ->leftJoin('fees_category', 'fees_category.id', '=', 'fees_setup.cat_id')
        ->where('fees_setup.status', 1)
        ->select([
            'session.session_start',
            'session.session_end',
            'fees_category.name as cat_name',
            'fees_setup.*',
        ])->paginate(10);

        $data['fees'] = Fees::get();

        return view('fees_setup', $data);
    }

    public function store(Request $request){

       $validator = Validator::make($request->all(), [
        
        'session_id' => 'required',
        'cat_id'     => 'required',
        'type'     => 'required',
        'value'     => 'required',
        'class_id' => 'required',
        'status' => 'required',
    ]);

       if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if(!empty($request->id)){
        $fees = FeesSetup::where('id', $request->id)->first();
    }else{
        $existing_fees = FeesSetup::where('session_id', $request->session_id)
        ->where('cat_id', $request->cat_id)->first();

        if(!empty($existing_fees)){
                //error
            return redirect()->back();
        }

        $fees = new FeesSetup();
    }

    $fees->session_id = $request->session_id;
    $fees->cat_id = $request->cat_id;
    $fees->type = $request->type;
    $fees->value = $request->value;
    $fees->month = date('F', strtotime($request->month));
    $fees->status = $request->status;

    $fees->save();
    \Illuminate\Support\Facades\Session::flash('success_message', 'Data is stored successfully!');

    return redirect()->route('feesList');
}
}
