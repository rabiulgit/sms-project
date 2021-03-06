<?php

namespace App\Http\Controllers;
use App\Classes;
use App\Groups;
use App\Sections;
use App\Session;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class StudentController extends Controller
{
  public function list(){


    $data['session'] = Session::where('status', 1)->get();
    $data['classes'] = Classes::where('status', 1)->get();
    $data['sections'] = Sections::where('status', 1)->get();
    $data['groups'] = Groups::where('status', 1)->get();

    $data['students'] = Students::leftJoin('session', 'session.id', '=', 'students.session_id')
    ->leftJoin('classes', 'classes.id', '=', 'students.class_id')
    ->leftJoin('sections', 'sections.id', '=', 'students.section_id')
    ->leftJoin('groups', 'groups.id', '=', 'students.group_id')
    ->where('students.status', 1)
    ->select([
      'session.session_start',
      'session.session_end',
      'classes.name as class_name',
      'sections.name as section_name',
      'groups.name as groups_name',
      'students.*',
    ])->paginate(10);

    return view('student', $data);
  }

  public function store(Request $request){
   $validator = Validator::make($request->all(), [
    'session_id' => 'required',
    'first_name' => 'required',
    'sms_no' => 'required',
    'gender' => 'required',
    'present_address' => 'required',
    'group_id' => 'required',
    'section_id' => 'required',
    'class_id' => 'required',
    'status' => 'required',
  ]);

   if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
  }

  $student = new Students();
  $student->session_id = $request->session_id;
  $student->first_name = $request->first_name;
  $student->last_name = $request->last_name;
  $student->gender = $request->gender;
  $student->dob = date('Y-m-d', strtotime($request->dob));
  $student->present_address = $request->present_address;
  $student->sms_no = $request->sms_no;
  $student->class_id = $request->class_id;
  $student->section_id = $request->section_id;
  $student->group_id = $request->group_id;
  $student->status = $request->status;

  $student->save();

  $id_prefix = date("Ym");
  DB::statement("update students, students as table2  SET students.student_id=(select concat('$id_prefix', LPAD(IFNULL(MAX(SUBSTR(table2.student_id, -4, 4)) + 1, 1), 4, '0')) as student_id from (select * from students) as table2 where table2.id!='$student->id' and table2.student_id like '$id_prefix%') where students.id='$student->id' and table2.id='$student->id'");


  \Illuminate\Support\Facades\Session::flash('success_message', 'Data is stored successfully!');

  return redirect()->route('studentList');
}

public function edit($id) {


 $student = DB::table('students')->where('students.id', $id)->first();


 return response()->json($student);


}

public function update(Request $request){
  $update_id = $request->id;
  $validator = Validator::make($request->all(), [
    'first_name' => 'required',
    'sms_no' => 'required',
    'gender' => 'required',
    'present_address' => 'required',
    'group_id' => 'required',
    'section_id' => 'required',
    'class_id' => 'required',
    'status' => 'required',
  ]);

   if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
  }
 
 $student = Students::findOrFail($update_id);
  $student->first_name = $request->first_name;
  $student->last_name = $request->last_name;
  $student->gender = $request->gender;
  $student->dob = date('Y-m-d', strtotime($request->dob));
  $student->present_address = $request->present_address;
  $student->sms_no = $request->sms_no;
  $student->class_id = $request->class_id;
  $student->section_id = $request->section_id;
  $student->group_id = $request->group_id;
  $student->status = $request->status;
  $student->update($request->all());

  \Illuminate\Support\Facades\Session::flash('success_message', ' Updated Successfully!');

  return redirect()->route('studentList');
}


}
