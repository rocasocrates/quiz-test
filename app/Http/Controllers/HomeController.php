<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment');
    }

    public function payment(){
        return view('payment');
    }
    public function subscription(Request $request){

        //una clave para identificar al usuario y su medio de pago en stripe
        $token = $request->stripeToken;
        //Registro del pago haciendo uso de la api
        \Auth::user()->subscription('semanal')->create($token);
        return ('you are subscribed now');
    }
}
