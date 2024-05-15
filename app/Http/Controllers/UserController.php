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
        $fileName = time() . '.' . $request->file->extension();

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

    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        // Validar el correo electrónico si se está actualizando
        if ($request->email != $user->email) {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
        }

        // Actualizar los campos del usuario
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->social_facebook = $request->social_facebook;
        $user->social_twitter = $request->social_twitter;

        // Actualizar la contraseña si se proporcionó una nueva
        if ($request->password) {
            $user->password = $request->password;
        }

        // Actualizar la imagen de perfil si se proporcionó una nueva
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public/images', $fileName);
            $user->file_url = $fileName;
        }

        $user->save();

        return redirect()->route('index')->with('success', 'Usuario actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
