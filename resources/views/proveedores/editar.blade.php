@extends('menu')

@section('title', 'Editar proveedor')

@section('contenido')
<div class="row">
    <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-sm float-right">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Gestión</a></li>
            <li class="breadcrumb-item"><a href="{{route('proveedores')}}">Proveedor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar proveedor</li>
        </ol>
    </nav>
</div>
<section class="container">
    <div class="mb-4"></div>
    <form action="{{ route('guardar_edicion_proveedor', ['id_proveedor' => $proveedor->id_proveedor]) }}" method="POST">
    @csrf
        <h3>Editando el proveedor: {{ $proveedor->nombre }}</h3>
        <div class="mb-3"></div>

        <div class="form-group">
            <label for="nit">NIT</label>
            <input type="text" class="form-control" id="nit" name="nit" value="{{ $proveedor->nit }}">
        </div>

        <div class="form-group">
            <label for="nrc">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $proveedor->telefono }}">
        </div>
        
        <div class="form-group">
            <label for="nrc">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $proveedor->direccion }}">
        </div>

        <div class="form-group">
            <label for="pais">País</label>
            <select id="pais" class="select2">
                <option value="{{ $proveedor->municipio->departamento->pais->id_pais}}">{{ $proveedor->municipio->departamento->pais->nombre }}</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->id_pais }}">{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select id="departamento" class="select2">
                <option value="{{ $proveedor->municipio->departamento->id_departamento }}">{{ $proveedor->municipio->departamento->nombre }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="municipio">Municipio</label>
            <select id="municipio" class="select2" name="id_municipio">
                <option value="{{ $proveedor->municipio->id_municipio}}">{{ $proveedor->municipio->nombre}}</option>
            </select>
        </div>

        <div class="mb-3"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <a href="{{ route('proveedores') }}" class="btn btn-info btn-sm btn-block"><i class="fa-solid fa-arrow-left"></i>&nbsp;Regresar</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Guardar edición</a>
            </div>
        </div>
    </form>

    <div class="mb-3"></div>

    <div class="form-group row">
        <div class="col-md-6">
            <form id="formEliminarProveedor" action="{{ route('eliminar_proveedor', ['id_proveedor' => $proveedor->id_proveedor]) }}" method="POST">
            @csrf
                <button id="btnBorrar" class="btn btn-danger btn-sm btn-block"><i class="fa-solid fa-trash"></i>&nbsp;Eliminar proveedor</button>
            </form>
        </div>
    </div>
</section>

@endsection

@section('scripts')

<script>
$(document).ready(function() {
    $('.select2').select2();
});

$(document).on('change', '#pais', function(){
    var url = "{{ route('buscar_departamento') }}";
    var idPais = document.getElementById("pais");
    var pais = idPais.options[idPais.selectedIndex].value;

    console.log(pais);
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'idPais': pais,
            '_token': '{{ csrf_token() }}'
        },
    })
    .done(function(response) {
        if (response.code == 200) {
            $("#departamento").html(response.departamento);
            console.log("Todo parece ir bien");
        } else {
            $("#departamento").html('<option value="">No hay departamentos</option>');
            console.log("No hay información");
        }
    })
    .fail(function(){
        console.log("Error");
    })
    .always(function(){
        console.log("Completo");
    }); 
});

$(document).on('change', '#departamento', function(){
    var url = "{{ route('buscar_municipio') }}";
    var idDepartamento = document.getElementById("departamento");
    var departamento = idDepartamento.options[idDepartamento.selectedIndex].value;

    console.log(departamento);
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'idDepartamento': departamento,
            '_token': '{{ csrf_token() }}'
        },
    })
    .done(function(response) {
        if (response.code == 200) {
            $("#municipio").html(response.municipio);
            console.log("Todo parece ir bien");
        } else {
            $("#municipio").html('<option value="">No hay municipios</option>');
            console.log("No hay información");
        }
    })
    .fail(function(){
        console.log("Error");
    })
    .always(function(){
        console.log("Completo");
    }); 
});

$('#btnBorrar').on('click', function() {
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará el proveedor permanentemente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, enviar la solicitud de eliminación
            $('#formEliminarProveedor').submit();
        }
    });
});

</script>

@endsection