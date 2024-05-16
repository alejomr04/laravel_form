<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
  
    label {
        font-family: sans-serif;
    }
.preview-container {
    position: relative;
    width: 200px; /* Ancho inicial */
    height: 200px; /* Altura inicial */
    margin: 0 auto; /* Centra horizontalmente el contenedor */
    margin-top: 10px;
    overflow: hidden; /* Evita que la imagen se salga del contenedor */
}

.preview-image {
    
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 100%; /* Evita que la imagen se desborde del contenedor */
    height: auto; /* Permite que la imagen cambie de tamaño manteniendo su proporción */
}

#cart{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    border-radius: 20px;
}
</style>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center mt-2 justify-content-center">
                    <h4 class="mt-3 mb-4 f-2"><strong> Registrar perfil</strong></h4>
                </div>
                <div class="container" id="cart">
                    
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                            <div class="text-center mt-3">
                                                <label for="file" class="form-label"><strong>Elegir foto de perfil</strong></label>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                                
                                            <input type="file" class="form-control" id="file" name="file" placeholder="Imagen de perfil" onchange="previewImage(event)" required>
                                        </div>
                                            @error('file')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <p class="mt-3">Foto de perfil seleccionada:</p>
                                    </div>
                                    <div class="preview-container">
                                        <img id="preview-image" class="preview-image" src="#" alt="Vista previa de la imagen" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-0">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Nombre completo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre completo" value="{{ old('fullname') }}">
                                        </div>

                                        @error('fullname')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Nombre de usuario</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" value="{{ old('username') }}">
                                    </div>
                                        @error('username')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Correo electrónico</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
                                        </div>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="confirm_email" class="form-label">Confirmar correo electrónico</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                                                </div>
                                                <input type="email" class="form-control" id="confirm_email" name="confirm_email" placeholder="Confirmar correo electrónico">
                                        </div>
                                            @error('confirm_email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                        </div>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña">
                                        </div>
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="social_facebook" class="form-label">Usuario de Facebook</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="social_facebook" name="social_facebook" placeholder="Usuario de Facebook" value="{{ old('social_facebook') }}">
                                    </div>
                                        @error('social_facebook')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="social_twitter" class="form-label">Usuario de Twitter</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="social_twitter" name="social_twitter" placeholder="Usuario de Twitter" value="{{ old('social_twitter') }}">
                                    </div>
                                        @error('social_twitter')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success">Registrar</button>
                                    </div>
                                </div>
                                    

                            </div>
                            
                        </form>
                        <div class="col-md-12 text-center mt-3">
                            <a href="{{ route('index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Script para cargar la imagen
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview-image');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
