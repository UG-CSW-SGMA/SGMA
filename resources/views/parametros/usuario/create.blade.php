
@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Nuevo Usuario</h6>
@endsection

@section('contenido')

<form id="formulario" class="form-registrar" action='{{url('/usuarios')}}' method ='POST' >
    @csrf

        <div class="doble">
            <label for="" class="form-label">Tipo de rol</label>
            <input required=""  class="form-control" type="number" id="TipoRol" name='TipoRol' placeholder="Ingrese el rol de usuario">
            <label for="" class="form-label">Nickname</label>
            <input required=""  class="form-control" type="text" name="NickName" id="NickName" placeholder="Ingrese su nickname o apodo">
            <label for="" class="form-label">Correo electronico</label>
            <input  required="" class="form-control" type="email" name="Email" id="Email" placeholder="Ingrese su correo electrónico">
            <label for="" class="form-label">Nombres completos</label>
            <input required=""  class="form-control" type="text" name="NombreCompleto" id="NombreCompleto" placeholder="Ingrese su nombre completo">
            <br>
            <div>
                <label for="" class="form-label">Contraseña</label>
            <input required=""  class="form-control" type="password" name="PasswordSALT" id="PasswordSALT" placeholder="Ingrese su contraseña">
            <br>
            <input required=""  class="form-control" type="password" name="PasswordHASH" id="PasswordHASH" placeholder="Ingrese su contraseña">
            </div>
            <br>
            <label for="" class="form-label">Estado de usuario</label><br>
            <select required="" id="selector" class="form-label" name="Activo">
            <option class="form-label" value="">Estado de usuario</option>
			<option class="form-label" value="0">0</option>
			<option class="form-label" value="1">1</option>
            </select>

        </div>
        <br>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a> <input required="" id="box" type="checkbox"></p>

        <input type="submit"  class="btn btn-primary" value="Registrar Usuario">

        </form>
@endsection