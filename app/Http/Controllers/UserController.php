<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::get();
        return view('index', compact('usuarios'));

    }

    /**
     * Store a newly created resource in storage.
     */


     public function create()
    {
        return view('create');
    }

    public function store(UserRequest $request)
    {
        $fileName = time().'.'.$request->file->extension();

        //guarda en la imagen en la carpeta public/images
        $request->file->storeAs('public/images', $fileName);

        //Ingresar en la bd la imagen y los demas datos
        $user = new User;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->file_url = $fileName;
        $user->password = $request->password;
        $user->social_facebook = $request->social_facebook;
        $user->social_twitter = $request->social_twitter;

        $user->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
