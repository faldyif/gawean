<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator;
use Session;
use Auth;
use App\User;
use DB;

use Jenssegers\Date\Date;

use App\Http\Requests;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return View('profile.view')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = User::find(Auth::user()->id);

        return View('profile.edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required',
        );
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('editprofile')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::find($id);
            if(Input::file('pic') != NULL && Input::file('pic')->isValid()){
                $destinationPath = 'uploads/avatars';
                $extension = Input::file('pic')->getClientOriginalExtension();
                $fileName = date('YmdHms').'_'.$request->user_id.'.'.$extension;
                $user->pic = $fileName; 
                Input::file('pic')->move($destinationPath, $fileName);
            }

            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->bio      = $request->bio;
            $user->save();

            Session::flash('message', 'Berhasil mengedit informasi akun!');
            return redirect('home');
        }
    }
}
