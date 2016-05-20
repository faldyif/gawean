<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator;
use Session;
use Auth;
use App\Job;
use DB;

use Jenssegers\Date\Date;

use App\Http\Requests;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::all();
        $myjob = DB::table('jobs')->where('user_id', Auth::user()->id)->get();
        return View('job.index')->with('job',$job)->with('myjob',$myjob);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user_id = Auth::user()->id;

        if($request->active == NULL) {
            $request->active = 1;
        }

        $rules = array(
            'name' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'description' => 'required'
        );

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('job/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $job = new Job;
            if(Input::file('pic')->isValid()){
                $destinationPath = 'uploads/jobs';
                $extension = Input::file('pic')->getClientOriginalExtension(); 
                $fileName = date('YmdHms').'_'.$request->user_id.'.'.$extension;
                Input::file('pic')->move($destinationPath, $fileName);
                $job->pic = $fileName;
            }

            $job->user_id       = $request->user_id;
            $job->name          = $request->name;
            $job->category_id   = $request->category_id;
            $job->location      = $request->location;
            $job->description   = $request->description;
            $job->phone         = $request->phone;
            $job->email         = $request->email;
            $job->active        = $request->active;
            $job->save();

            Session::flash('message', 'Berhasil menambahkan lowongan!');
            return redirect('job');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        return View('job.view')->with('job',$job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);

        if($job->user_id == Auth::user()->id) {
            return View('job.edit')->with('job', $job);
        } else {
            Session::flash('message', 'Anda tidak memiliki kewenangan untuk mengakses');
            return redirect('job');
        }
        
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
        $request->user_id = Auth::user()->id;
        if($request->active == NULL) {
            $request->active = 1;
        }

        $rules = array(
            'name' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('job/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $job = Job::find($id);
            if(Input::file('pic')->isValid()){
                $destinationPath = 'uploads/jobs';
                $extension = Input::file('pic')->getClientOriginalExtension();
                $fileName = date('YmdHms').'_'.$request->user_id.'.'.$extension;
                $job->pic = $fileName; 
                Input::file('pic')->move($destinationPath, $fileName);
            }

            $job->user_id       = $request->user_id;
            $job->name          = $request->name;
            $job->category_id   = $request->category_id;
            $job->location      = $request->location;
            $job->description   = $request->description;
            $job->phone         = $request->phone;
            $job->email         = $request->email;
            $job->active        = $request->active;
            $job->save();

            Session::flash('message', 'Berhasil mengedit lowongan!');
            return redirect('job');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
