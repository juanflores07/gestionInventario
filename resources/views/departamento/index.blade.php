@extends('menu')

@section('title', 'Departamentos')

@section('estilos')
<style>
/* Estilos CSS */
#tablaDepartamento {
    border-collapse: separate;
    border-spacing: 0;
}

#tablaDepartamento th,
#tablaDepartamento td {
    padding: 8px;
    border-bottom: 1px solid #ddd; /* Borde inferior para todas las celdas */
}

#tablaDepartamento th {
    background-color: #f2f2f2;
}
</style>
@endsection

@section('contenido')
<div class="row">
    <nav aria-label="Breadcrumb">
    <ol class="breadcrumb breadcrumb-sm float-right">
        <li class="breadcrumb-item"><a href="{{route('principal')}}">Gestión</a></li>
        <li class="breadcrumb-item active" aria-current="page">Departamentos</li>
    </ol>
    </nav>
</div>

<div class="mb-3"></div>

<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <h3>Departamentos</h3>
        </div>
    </div>
</div>

<br>

<div class="table-responsive" id="tabProveedor">
    <table id="tablaDepartamento" class="table table-bordered">
    <thead class="text-center">
        <tr class="bg-navy">
            <th>ID</th>
            <th>Nombre</th>
            <th>País</th>
        </tr>
    </thead>
    <tbody class="text-center">
      @foreach ($departamentos as $departamento)
        <tr>
          <td>{{ $departamento->id_departamento }}</td>
          <td>{{ $departamento->nombre }}</td>
          <td>{{ $departamento->pais->nombre }}</td>
        </tr>
      @endforeach
    </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  var table = $('#tablaDepartamento').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'copyHtml5',
        text: '<i class="far fa-copy"></i>',
        titleAttr: 'Copiar'
      },
      {
        extend: 'excelHtml5',
        text: '<i class="far fa-file-excel"></i>',
        titleAttr: 'Excel'
      },
      {
        extend: 'csvHtml5',
        text: '<i class="fas fa-file-csv"></i>',
        titleAttr: 'CSV'
      },
      {
        extend: 'pdfHtml5',
        text: '<i class="far fa-file-pdf"></i>',
        titleAttr: 'PDF'
      }, 
      {
        extend: 'print',
        text: '<i class="fas fa-print"></i>',
        titleAttr: 'Imprimir'
      }, 
      'colvis'
    ],
    "lengthMenu": [[5, 10, 25, -1], [5, 10, 50, "All"]],
    "order": [[ 0, "asc" ]],
    "language": {
    "decimal": "",
    "emptyTable": "No hay información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    "infoEmpty": "No hay entradas",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad",
      "print": "Imprimir",
      "copyTitle": 'Copiado al portapapales',
      "copySuccess": {
        1: "Se copió una fila al portapapeles",
        _: "Se copiaron %d filas al portapapeles"
      },
      "copyKeys": 'Presiona <i>ctrl</i> or <i>\u2318</i> + <i>C</i> para copiar el contenido en<br>tu portapapeles.<br><br>Para cancelar presiona este mensaje o la tecla Esc.'
    },
    "zeroRecords": "Sin resultados encontrados",
    "paginate": {
      "first": "Primero",
      "last": "Último",
      "next": "Siguiente",
      "previous": "Anterior"
    }
  },
  "info": true,
  "paginate": true,
  "sort": false,
  "lengthMenu": false,
  "bLengthChange": false,
  "bProcessing": true,
  "paging": true,
    
  });
});

</script>
@endsection
