@extends('main.layout')

@section('form-title')
<h6 class="m-0 font-weight-bold text-primary">Editar Usuario</h6>
@endsection

@section('contenido')


<form id="formulario" class="form-registrar" action='usuarios/{{$ObjUsuario->id}}' method ='POST' >
    @csrf
    @method('PUT')

        <div class="doble">
            <label for="" class="form-label">Tipo de rol</label><br>
            <select required="" id="selector" class="form-label" name="TipoRol">
            <option class="form-label" value="">Tipo rol</option>
            
			<option class="form-label" value="1"
            
            <?php if($ObjUsuario->TipoRol == "1"){
                echo "selected";}
                
                ?>
                >Administrador</option>
            
			<option class="form-label" value="2"
            <?php if($ObjUsuario->TipoRol == "2"){
                echo "selected";}
                
                ?>
            >Gerente</option>

            <option class="form-label" value="3"
            <?php if($ObjUsuario->TipoRol == "3"){
                echo "selected";}
                
                ?>
            >Mecánico</option>
            <option class="form-label" value="4"
            <?php if($ObjUsuario->TipoRol == "4"){
                echo "selected";}
                
                ?>
            >Vendedor</option>
            
            </select><br>
            <label for="" class="form-label">Nickname</label>
            <input required=""  class="form-control" type="text" name="NickName" id="NickName" placeholder="Ingrese su nickname o apodo" value="{{$ObjUsuario->NickName}}">
            <label for="" class="form-label">Correo electronico</label>
            <input  required="" class="form-control" type="email" name="Email" id="Email" placeholder="Ingrese su correo electrónico"value="{{$ObjUsuario->Email}}">
            <label for="" class="form-label">Nombres completos</label>
            <input required=""  class="form-control" type="text" name="NombreCompleto" id="NombreCompleto" placeholder="Ingrese su nombre completo" value="{{$ObjUsuario->NombreCompleto}}">
            <br>
            <div>
                <label for="" class="form-label">Contraseña <button id="actualizarpass" type="button" class="btn btn-outline-warning"onclick="activarPass()">Cambiar contraseña</button></label>
            <input required=""   class="form-control" type="password" name="PasswordSALT" id="PasswordSALT" placeholder="Ingrese su contraseña" value="{{$ObjUsuario->PasswordSALT}}">
            <br>
            <input required=""  class="form-control" type="password" name="PasswordHASH" id="PasswordHASH" placeholder="Ingrese su contraseña" value="{{$ObjUsuario->PasswordHASH}}">
            </div>
            <br>
            

        </div>
        <br>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a> <input required="" id="box" type="checkbox" checked="true"></p>

        <input type="submit"  class="btn btn-outline-primary" value="Finalizar Actualización">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" tabindex="7">Cancelar</button>
        </form>
        @endsection
        <script>
            contador = 0;
            function activarPass(){
                
                if(contador%2 == 0){
                    document.getElementById("PasswordSALT").value = "";
                    document.getElementById("PasswordHASH").value="";
                    contador = 1;
                }
               
                
            }
        </script>

 