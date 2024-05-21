@extends('menu')

@section('title', 'Nuevo producto')

@section('contenido')
<div class="row">
    <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-sm float-right">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Gestión</a></li>
            <li class="breadcrumb-item"><a href="{{route('productos')}}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nuevo producto</li>
        </ol>
    </nav>
</div>
<section class="container">
    <div class="mb-4"></div>
    <form action="{{ route('guardar_producto') }}" method="POST">
    @csrf
        <h3>Nuevo producto</h3>
        <div class="mb-3"></div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="cant">Cantidad</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="####">
        </div>

        <div class="form-group">
            <label for="cant">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripción del producto"></textarea>
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">Fecha ingreso</label>
            <input type="date" class="form-control datetimepicker" id="fecha_ingreso" name="fecha_ingreso">
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">Fecha vencimiento (si aplica)</label>
            <input type="date" class="form-control datetimepicker" id="fecha_vencimiento" name="fecha_vencimiento">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" placeholder="$" name="precio">
        </div>

        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select id="proveedor" class="select2" name="id_proveedor">
                <option value="">Seleccione el proveedor...</option>
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

    $(document).on('change', '#proveedor', function(){
        proveedor = $("#proveedor").val();
        console.log(proveedor);
    });
</script>

@endsection