@extends('menu')

@section('title', 'Nuevo producto')

@section('content')
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
    <form>
        <h3>Nuevo producto</h3>
        <div class="mb-3"></div>

        <div class="form-group">
            <label for="nombre">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre_producto" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="cant">Cantidad</label>
            <input type="text" class="form-control" id="cantidad_producto" placeholder="####">
        </div>

        <div class="form-group">
            <label for="cant">Descripción</label>
            <textarea class="form-control" id="descripcion_producto" rows="4" placeholder="Descripción del producto"></textarea>
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">Fecha ingreso</label>
            <input type="date" class="form-control datetimepicker" id="fecha_ingreso">
        </div>

        <div class="form-group">
            <label for="proveedor">Proveedor</label>
            <select id="proveedor" class="js-example-responsive" style="width: 100%">
                <option value="">Seleccione el proveedor...</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor['id'] }}">{{ $proveedor['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <a href="{{ route('productos') }}" class="btn btn-info btn-sm btn-block"><i class="fa-solid fa-arrow-left"></i>&nbsp;Regresar</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('productos') }}" class="btn btn-success btn-sm btn-block"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</a>
            </div>
        </div>
    </form>
</section>

@endsection

@section('scripts')


@endsection