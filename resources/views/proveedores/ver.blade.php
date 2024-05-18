@extends('menu')

@section('title', 'Ver proveedor')

@section('contenido')
<div class="row">
    <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-sm float-right">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Gestión</a></li>
            <li class="breadcrumb-item"><a href="{{route('proveedores')}}">Proveedor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver proveedor</li>
        </ol>
    </nav>
</div>
<section class="container">

<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <h3>Viendo el proveedor: {{$proveedor->nombre}}</h3>
        </div>
    </div>
</div>

<br>
<table class="table table-bordered">
    <tr>
        <th><strong> Teléfono </strong></th>
        <td>{{ $proveedor->telefono }}</td>
    </tr>
    <tr>
        <th><strong> NIT </strong></th>
        <td>{{ $proveedor->nit }}</td>
    </tr>
    <tr>
        <th><strong> Dirección </strong></th>
        <td>{{ $proveedor->direccion }}</td>
    </tr>
    <tr>
        <th><strong> Municipio </strong></th>
        <td>{{ $proveedor->municipio->nombre}}</td>
    </tr>
    <tr>
        <th><strong> Departamento </strong></th>
        <td>{{ $proveedor->municipio->departamento->nombre}}</td>
    </tr>
    <tr>
        <th><strong> País </strong></th>
        <td>{{ $proveedor->municipio->departamento->pais->nombre}}</td>
    </tr>
</table>

<div class="mb-3"></div>

<div class="form-group row">
    <div class="col-md-6">
        <a href="{{ route('proveedores') }}" class="btn btn-info btn-sm btn-block"><i class="fa-solid fa-arrow-left"></i>&nbsp;Regresar</a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('editar_proveedor', ['id_proveedor' => $proveedor->id_proveedor]) }}" class="btn btn-app bg-warning btn-sm btn-block"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Editar</a>
    </div>
</div>
</section>

@endsection

@section('scripts')

@endsection