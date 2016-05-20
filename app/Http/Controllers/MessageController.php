<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator;
use Session;
use Auth;
use App\Message;
use DB;

use Jenssegers\Date\Date;

use App\Http\Requests;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inbox = DB::table('messages')->where('to_user_id', Auth::user()->id)->get();
        $outbox = DB::table('messages')->where('from_user_id', Auth::user()->id)->get();
        return View('message.index')->with('inbox',$inbox)->with('outbox',$outbox);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('message.create');
    }

     public function sendTo($id)
     {
         return View('message.sendto')->with('to_user_id', $id);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->from_user_id = Auth::user()->id;

        $rules = array(
            'to_user_id' => 'required',
            'subject' => 'required',
            'message' => 'required'
        );

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('job/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $message = new Message;

            $message->from_user_id  = $request->from_user_id;
            $message->to_user_id    = $request->to_user_id;
            $message->subject       = $request->subject;
            $message->message       = $request->message;
            $message->save();

            Session::flash('message', 'Berhasil mengirimkan pesan!');
            return redirect('message');
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
        $message = Message::find($id);
        $uid = Auth::user()->id;
        if($uid != $message->from_user_id && $uid != $message->to_user_id) {
          Session::flash('message', 'Anda tidak memiliki kewenangan untuk mengakses halaman yang anda minta');
          return redirect('message');
        } else {
          $message->read = true;
          $message->save();
          return View('message.view')->with('message', $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
