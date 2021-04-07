<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use Notification;

class TestController extends Controller
{
    public function index(){
    	Notification::route('mail','fillydeveloper@gmail.com')->notify(new TestNotification);
			return 'message sent check email';
    }
}
