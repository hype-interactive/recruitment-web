<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Mail\SuccessfulRegistration;
use App\Mail\BirthdayReminder;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $user = User::find(3);
        $email = $user->email;
        // dd($email);
        // Mail::to($data['email'])->send(new SuccessfulRegistration($data));
        if (Mail::to($email)->send(new BirthdayReminder($email))) return back();
    }
}
