<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/367053df97.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('styles')
</head>
<body>
    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('principal')}}">Gestión Inventario</a>
            <a class="navbar-text ml-auto">Usuario</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-2 col-md-2 px-0" style="margin-top: 57px;"> <!-- Ajusta el padding horizontal a 0 para eliminar cualquier espacio -->
                @include('barraLateral')
            </div>

            <div class="col-10 col-md-10" style="margin-top: 80px;">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer fixed-bottom bg-dark text-white d-flex justify-content-end align-items-center">
        <p class="mb-0">&copy; {{ date('Y') }} Gestión de inventarios ©</p>
    </footer>

    @yield('scripts')

</body>
</html>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>