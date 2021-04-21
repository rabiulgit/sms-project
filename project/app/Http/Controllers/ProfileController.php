<?php

namespace App\Http\Controllers;
use App\user;
use Auth;
use Session;
use Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      return view('profile.profile');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required'
    ]);
     if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }
    $user=User::find($request->id);
    $user->name = $request->name;
    $user->email = trim($request->email);
    if (!empty($request->password)) {
      $user->password = Hash::make($request->password);
    }
    

    $user->save();
    Session::flash('success_message', 'Updated successfully!.');
    return redirect()->back();
  }

}
