<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // $service_id = $request->input('service_id');
        // $user_id = $request->input('user_id');
        // $service = \App\Library\Service::getService($service_id);
        // $user = \App\Models\User::find($user_id);
        // $user->services()->attach($service_id);
        // return redirect()->route('application_panel', ['id' => $user_id]);

        return redirect()->back()->with('msg', 'You have successfully subscribed to the service');
    }
}
