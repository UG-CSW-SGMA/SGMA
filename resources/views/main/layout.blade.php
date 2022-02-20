<title> @yield('titulo')</title>
<div class="modal-header">
    @yield('form-title')
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div>
        @yield('contenido')
    </div>
</div>