<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator;
use Session;
use Auth;
use App\Offer;
use DB;

use Jenssegers\Date\Date;

use App\Http\Requests;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Offer::all();
        $myjob = DB::table('offers')->where('user_id', Auth::user()->id)->get();
        return View('offer.index')->with('job',$job)->with('myjob',$myjob);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('offer.create');
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
            return redirect('offer/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $offer = new Offer;
            if(Input::file('pic')->isValid()){
                $destinationPath = 'uploads/offers';
                $extension = Input::file('pic')->getClientOriginalExtension(); 
                $fileName = date('YmdHms').'_'.$request->user_id.'.'.$extension;
                Input::file('pic')->move($destinationPath, $fileName);
                $offer->pic = $fileName;
            }

            $offer->user_id       = $request->user_id;
            $offer->name          = $request->name;
            $offer->category_id   = $request->category_id;
            $offer->location      = $request->location;
            $offer->description   = $request->description;
            $offer->phone         = $request->phone;
            $offer->email         = $request->email;
            $offer->active        = $request->active;
            $offer->save();

            Session::flash('message', 'Berhasil menambahkan jasa!');
            return redirect('offer');
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
        $offer = Offer::find($id);
        return View('offer.view')->with('job',$offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);

        if($offer->user_id == Auth::user()->id) {
            return View('offer.edit')->with('job', $offer);
        } else {
            Session::flash('message', 'Anda tidak memiliki kewenangan untuk mengakses');
            return redirect('offer');
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
            return redirect('offer/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $offer = Offer::find($id);
            if(Input::file('pic')->isValid()){
                $destinationPath = 'uploads/offers';
                $extension = Input::file('pic')->getClientOriginalExtension();
                $fileName = date('YmdHms').'_'.$request->user_id.'.'.$extension;
                $offer->pic = $fileName; 
                Input::file('pic')->move($destinationPath, $fileName);
            }

            $offer->user_id       = $request->user_id;
            $offer->name          = $request->name;
            $offer->category_id   = $request->category_id;
            $offer->location      = $request->location;
            $offer->description   = $request->description;
            $offer->phone         = $request->phone;
            $offer->email         = $request->email;
            $offer->active        = $request->active;
            $offer->save();

            Session::flash('message', 'Berhasil mengedit lowongan!');
            return redirect('offer');
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
