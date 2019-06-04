<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code)->first();

        if (!$user) {

            return redirect('/home');

        } else {

            $user->confirmed = true;
            $user->confirmation_code = null; //ya no se va a usar mas por eso lo ponemos a null.
            $user->save();
             return redirect('/home')->with('confirmation', 'Has confirmado correctamente tu correo!');
            //     return redirect()->route('/home/', ['notification'=>'Has confirmado correctamente tu correo!']);
            //return view('home')->with('notification', ['nota' => 'Has confirmado correctamente tu correo!']);
        }


        //return redirect('correcto');
    }
}
