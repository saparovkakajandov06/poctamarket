<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends SiteController
{
    public function execute(Request $request) {
        if($request->isMethod('post')) {

            $messages = [
                'email'=>'Поле :attribute должно соответствовать email адресу'
            ];

            $this->validate($request,[
                'email'=>'email|required',
                'name'=>'max:255|required',
                'text'=>'required'
                
            ],$messages);
            
            $data = $request->all();
            Mail::send('site.email_text',['data'=>$data],function($message) use($data) {
                $message->from('turkmenpostmarket.com@gmail.com', 'turkmenpostmarket.tm');
                $message->to('sopa.97@mail.ru')->subject('Контактная форма с веб сайта');
            });

            return redirect()->back()->with('status', 'Your message accepted');
        }
        return view('site.email')->with('cartCount',$this->countItems($request));
    }
}
