<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSubscription;
use App\Models\User;

class ServiceSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        // dd($user);

        if ($user) {
            $subscription = ServiceSubscription::create([
                'service_name' => $request->service_name,
                'user_id' => $user->id,
                'message' => $request->message ? $request->message : null,
            ]);

            return back()->with('msg', 'Subscription created successfully');
        } else {
            return redirect()->route('register')->with('msg', 'User not found, please register first');
        }
    }
}
