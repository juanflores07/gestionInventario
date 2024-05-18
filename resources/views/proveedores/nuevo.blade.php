@extends('menu')

@section('title', 'Nuevo proveedor')

@section('contenido')
<div class="row">
    <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-sm float-right">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Gestión</a></li>
            <li class="breadcrumb-item"><a href="{{route('proveedores')}}">Proveedor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nuevo proveedor</li>
        </ol>
    </nav>
</div>
<section class="container">
    <div class="mb-4"></div>
    <form action="{{ route('guardar_proveedor') }}" method="POST">
    @csrf
        <h3>Nuevo proveedor</h3>
        <div class="mb-3"></div>

        <div class="form-group">
            <label for="nombre">Nombre o razón social</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="nit">NIT</label>
            <input type="text" class="form-control" id="nit" name="nit" placeholder="####-######-###-#">
        </div>

        <div class="form-group">
            <label for="nrc">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="########">
        </div>
        
        <div class="form-group">
            <label for="nrc">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
        </div>

        <div class="form-group">
            <label for="pais">País</label>
            <select id="pais" class="select2">
                <option value="">Seleccione el país...</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->id_pais }}">{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select id="departamento" class="select2">
                <option value="">Seleccione el departamento...</option>
            </select>
        </div>

        <div class="form-group">
            <label for="municipio">Municipio</label>
            <select id="municipio" class="select2" name="id_municipio">
                <option value="">Seleccione el municipio...</option>
            </select>
        </div>


        <div class="mb-3"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <a href="{{ route('proveedores') }}" class="btn btn-info btn-sm btn-block"><i class="fa-solid fa-arrow-left"></i>&nbsp;Regresar</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</a>
            </div>
        </div>
    </form>
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



</script>

@endsection