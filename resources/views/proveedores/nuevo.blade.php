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
    <form>
        <h3>Nuevo proveedor</h3>
        <div class="mb-3"></div>

        <div class="form-group">
            <label for="nombre">Nombre o razón social</label>
            <input type="text" class="form-control" id="nombre_producto" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="nit">NIT</label>
            <input type="text" class="form-control" id="cantidad_producto" placeholder="####-######-###-#">
        </div>

        <div class="form-group">
            <label for="nrc">NRC</label>
            <input type="text" class="form-control" id="cantidad_producto" placeholder="######-#">
        </div>

        <div class="form-group">
            <label for="pais">País</label>
            <select id="pais" class="select2">
                <option value="">Seleccione el país...</option>
            </select>
        </div>

        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select id="departamento" class="select2">
                <option value="">Seleccione el departamento...</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <select id="ciudad" class="select2">
                <option value="">Seleccione la ciudad...</option>
            </select>
        </div>


        <div class="mb-3"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <a href="{{ route('proveedores') }}" class="btn btn-info btn-sm btn-block"><i class="fa-solid fa-arrow-left"></i>&nbsp;Regresar</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('proveedores') }}" class="btn btn-success btn-sm btn-block"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</a>
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
</script>

@endsection