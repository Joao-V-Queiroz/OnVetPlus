<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Mail;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function submit(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
           ]);

    //AQUI É A DIFERENÇA DO HACKER
    $contato = new ContactForm($request);
    try{
        $contato->sendMail();
          return back()   
         ->with('sucess', 'Obrigado por nos contactar');
    } catch(\Exception $error){
       return back()->with("error", "Ocorreu um erro inesperado: {$error->getMessage()}");
    }
    //    $data = array(
    //     'fullName' => $request->fullName,
    //     'email' => $request->email,
    //     'phone' =>$request->phone,
    //     'message' =>$request->message 
    //    );

    //    Mail::to( config('mail.from.address') )
    //       ->send( new SendMail($data) );
    //   return back()   
    //          ->with('sucess', 'Obrigado por nos contactar'); 
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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