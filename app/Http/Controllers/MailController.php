<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\testMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail() {
        Mail::to('oswin.herman.somally@sekolah.pahoa.sch.id')->send(new testMail());

        return "email has been sent";
    }
}
