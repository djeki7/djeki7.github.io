<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function new_order(Request $request){
        $data = $request->except('_token');

        try{
            Mail::send('emails.order_mail', ['data' => $data], function ($message) use ($data) {

                $message->from(env('MAIL_FROM'), $data['client_name'].' '.$data['client_family']);
                $message->subject('Новый заказ yt-studio.com');
                $message->to(env('MAIL_ADMIN'));
            });

            if(count(Mail::failures()) > 0){
                return 'TRANSPORT_ERROR';
            }
            return 'OK';
        }
        
        catch(\Swift_TransportException $e){

            return 'TRANSPORT_ERROR';
        }
        catch(\Exception $e){
            return 'ERROR ';
        }
    }

    public function mail_send(Request $request)
    {
        
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению',
            'email' => 'Введите правильный email'
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ], $messages);

        $data = $request->except('_token');

        try{
            Mail::send('emails.index_mail', ['data' => $data], function ($message) use ($data) {

                $message->from($data['email'], $data['name']);
                $message->subject('yt-studio.com');
                $message->to(env('MAIL_ADMIN'));
            });

            if(count(Mail::failures()) > 0){
                return 'TRANSPORT_ERROR';
            }
            return 'OK';
        }
        
        catch(\Swift_TransportException $e){

            return 'TRANSPORT_ERROR';
        }
        catch(\Exception $e){

            return 'ERROR';
        }
    }

   
}
