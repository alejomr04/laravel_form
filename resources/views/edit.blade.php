
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Editar Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullname }}">
                                @error('fullname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_email" class="form-label">Confirmar correo electrónico</label>
                                <input type="email" class="form-control" id="confirm_email" name="confirm_email" placeholder="Confirmar correo electrónico">
                                @error('confirm_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Imagen de perfil</label>
                                <input type="file" class="form-control" id="file" name="file" placeholder="Imagen de perfil">
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <img src="{{ asset('storage/images/' . $user->file_url) }}" alt="image">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="text" class="form-control" id="password" name="password" value="{{ $user->password }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="social_facebook" class="form-label">Usuario de Facebook</label>
                                <input type="text" class="form-control" id="social_facebook" name="social_facebook" value="{{ $user->social_facebook }}">
                                @error('social_facebook')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="social_twitter" class="form-label">Usuario de Twitter</label>
                                <input type="text" class="form-control" id="social_twitter" name="social_twitter" value="{{ $user->social_twitter }}">
                                @error('social_twitter')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>