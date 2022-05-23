<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class OrderSend extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'topic' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        dd($request->all());
        dump($request->all());
        dump($request);
        dump($user);

        $order = Order::create([
            'topic' => $request->topic,
            'message' => $request->message,
        ]);

        if($request->file){

        }

//        $order->users()->attach($user);

        return true;//redirect(RouteServiceProvider::HOME);
    }
}
