@extends('menu')

@section('title', 'Editar producto')

@section('contenido')
<div class="row">
    <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-sm float-right">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Gestión</a></li>
            <li class="breadcrumb-item"><a href="{{route('productos')}}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
        </ol>
    </nav>
</div>
<section class="container">
    <div class="mb-4"></div>
    <form action="{{ route('guardar_edicion_producto', ['id_producto' => $producto->id_producto]) }}" method="POST">
    @csrf
        <h3>Editando producto con código: {{ $producto->codigo }}</h3>
        <div class="mb-3"></div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
        </div>

        <div class="form-group">
            <label for="cant">Cantidad</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}">
        </div>

        <div class="form-group">
            <label for="cant">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" >{{ $producto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">Fecha ingreso</label>
            <input type="date" class="form-control datetimepicker" id="fecha_ingreso" name="fecha_ingreso"  value="{{ $producto->fecha_ingreso }}">
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">Fecha vencimiento</label>
            <input type="date" class="form-control datetimepicker" id="fecha_vencimiento" name="fecha_vencimiento"  value="{{ $producto->fecha_vencimiento }}">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" placeholder="$" name="precio"  value="{{ $producto->precio }}">
        </div>

        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select id="proveedor" class="select2" name="id_proveedor">
                <option value="{{$producto->proveedor->id_proveedor}}">{{$producto->proveedor->nombre}}</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <a href="{{ route('productos') }}" class="btn btn-info btn-sm btn-block"><i class="fa-solid fa-arrow-left"></i>&nbsp;Regresar</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Guardar edición</a>
            </div>
        </div>
    </form>

    <div class="mb-3"></div>

    <div class="form-group row">
        <div class="col-md-6">
            <form id="formEliminarProducto" action="{{ route('eliminar_producto', ['id_producto' => $producto->id_producto]) }}" method="POST">
            @csrf
                <button id="btnBorrar" class="btn btn-danger btn-sm btn-block"><i class="fa-solid fa-trash"></i>&nbsp;Eliminar producto</button>
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

$(document).on('change', '#proveedor', function(){
    proveedor = $("#proveedor").val();
    console.log(proveedor);
});

$('#btnBorrar').on('click', function() {
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará el producto permanentemente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, enviar la solicitud de eliminación
            $('#formEliminarProducto').submit();
        }
    });
});


</script>

@endsection