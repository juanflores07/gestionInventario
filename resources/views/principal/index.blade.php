@extends('menu')

@section('title', 'Inventario')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="display-4 text-primary">Bienvenido, Usuario!</h1>
            <p class="lead">Hoy es <span id="current-date"></span> y son las <span id="current-time"></span>.</p>
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <h5 class="card-title">Métricas</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Productos en inventario: <span id="product-count">0</span></li>
                        <li class="list-group-item">Productos agregados hoy: <span id="product-added-today">0</span></li>
                        <li class="list-group-item">Productos vendidos hoy: <span id="product-sold-today">0</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="chart-container"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Update the current date and time
    function updateTime() {
        const now = new Date();
        const date = now.toLocaleDateString();
        const time = now.toLocaleTimeString();
        document.getElementById('current-date').textContent = date;
        document.getElementById('current-time').textContent = time;
    }

    // Update the product count
    function updateProductCount() {
        const productCount = 1; // Replace with actual product count
        document.getElementById('product-count').textContent = productCount;
    }

    // Update the product added and sold today
    function updateProductsToday() {
        const productAddedToday = 1; // Replace with actual product added today
        const productSoldToday = 0; // Replace with actual product sold today
        document.getElementById('product-added-today').textContent = productAddedToday;
        document.getElementById('product-sold-today').textContent = productSoldToday;
    }

    // Initialize the page
    updateTime();
    updateProductCount();
    updateProductsToday();

    // Update the time every second
    setInterval(updateTime, 1000);
</script>
@endsection