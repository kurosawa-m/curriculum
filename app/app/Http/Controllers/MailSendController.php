<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailSendController extends Controller
{
    public function index(){

    	$data = [];

    	Mail::send('email', $data, function($message){
    	    $message->to('test@example.com', 'Test')
    	    ->subject('パスワードリセット');
    	});
    }

}
