@extends('menu')

@section('title', 'Ver producto')

@section('contenido')
<div class="row">
    <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-sm float-right">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Gestión</a></li>
            <li class="breadcrumb-item"><a href="{{route('productos')}}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver producto</li>
        </ol>
    </nav>
</div>
<section class="container">

<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <h3>Viendo el producto con código: {{$producto->codigo}}</h3>
        </div>
    </div>
</div>

<br>
<table class="table table-bordered">
    <tr>
        <th><strong> Nombre </strong></th>
        <td>{{$producto->nombre}}</td>
    </tr>
    <tr>
        <th><strong> Existencias </strong></th>
        <td>{{$producto->cantidad}}</td>
    </tr>
    <tr>
        <th><strong> Descripción </strong></th>
        <td>{{$producto->descripcion}}</td>
    </tr>
    <tr>
        <th><strong> Fecha de ingreso </strong></th>
        <td>{{$producto->fecha_ingreso}}</td>
    </tr>
    <tr>
        <th><strong> Fecha de vencimiento </strong></th>
        <td>{{$producto->fecha_vencimiento ? $producto->fecha_vencimiento : 'No aplica'}}</td>
    </tr>
    <tr>
        <th><strong> Precio </strong></th>
        <td>${{$producto->precio}}</td>
    </tr>
    <tr>
        <th><strong> Proveedor </strong></th>
        <td>{{$producto->proveedor->nombre}}</td>
    </tr>
</table>

<div class="mb-3"></div>

<div class="form-group row">
    <div class="col-md-6">
        <a href="{{ route('productos') }}" class="btn btn-info btn-sm btn-block"><i class="fa-solid fa-arrow-left"></i>&nbsp;Regresar</a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('editar_producto', ['id_producto' => $producto->id_producto]) }}" class="btn btn-app bg-warning btn-sm btn-block"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Editar</a>
    </div>
</div>
</section>

@endsection

@section('scripts')

@endsection