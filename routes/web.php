<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Use Illuminate\Http\Request;
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return view('home');
});

Route::get('payment', 'HomeController@payment');
Route::post ( 'payment/', function (Request $request) {
    Stripe\Stripe::setApiKey ( 'test_SecretKey' );
    try {
        Stripe\Charge::create ( array (
            "amount" => 300 * 100,
            "currency" => "usd",
            "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
            "description" => "Test payment."
        ) );
        Session::flash ( 'success-message', 'Payment done successfully !' );
        return Redirect::back ();
    } catch ( Exception $e ) {
        Session::flash ( 'fail-message', "Error! Please Try again." );
        return Redirect::back ();
    }
} );
//Route::post('payment', 'HomeController@subscription');

Route::get('/register/verify/{code}', 'GuestController@verify');

Route::get('/correcto', function(){

    return "confirmado correo";
});

Route::get('/exists', 'GuestController@exists');
