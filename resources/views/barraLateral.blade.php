<div class="sidebar d-flex flex-column flex-shrink-0 bg-light">
  <div class="sidebar-inner">
    <ul class="sidebar-menu list-unstyled mb-0">
      <li class="sidebar-menu-item">
        <a class="d-flex align-items-left">
          <i class="fa-solid fa-boxes-stacked"></i>
          <span class="menu-text">Productos</span>
          <span class="submenu-toggle ml-auto" data-toggle="collapse" data-target="#productos-submenu">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <ul id="productos-submenu" class="collapse sidebar-submenu">
          <li><a href="{{route('nuevo_producto')}}" class="d-flex align-items-center"><i class="fa-solid fa-plus"></i>Agregar nuevo producto</a></li>
          <li><a href="{{route('productos')}}" class="d-flex align-items-center"><i class="fa-solid fa-list"></i>Registro de productos</a></li>
        </ul>
      </li>

      <li class="sidebar-menu-item">
        <a class="d-flex align-items-left">
          <i class="fa-solid fa-user-tie"></i>
          <span class="menu-text">Proveedores</span>
          <span class="submenu-toggle ml-auto" data-toggle="collapse" data-target="#proveedores-submenu">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <ul id="proveedores-submenu" class="collapse sidebar-submenu">
          <li><a href="{{route('nuevo_proveedor')}}" ><i class="fa-solid fa-plus"></i>Agregar nuevo proveedor</a></li>
          <li><a href="{{route('proveedores')}}" ><i class="fa-solid fa-people-group"></i>Registro de proveedores</a></li>
        </ul>
      </li>

      <li class="sidebar-menu-item">
        <a class="d-flex align-items-left">
          <i class="fa-solid fa-chart-line"></i>
          <span class="menu-text">Reportes</span>
          <span class="submenu-toggle ml-auto" data-toggle="collapse" data-target="#metricas-submenu">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <ul id="metricas-submenu" class="collapse sidebar-submenu">
          <li><a href="{{route('productos_recientes')}}"><i class="fa-solid fa-truck-ramp-box"></i>Nuevos productos ingresados</a></li>
          <li><a href="{{route('productos_retirados')}}"><i class="fa-solid fa-people-carry-box"></i>Productos retirados</a></li>
        </ul>
      </li>

      <li class="sidebar-menu-item">
        <a class="d-flex align-items-left">
          <i class="fa-solid fa-gear"></i>
          <span class="menu-text">Configuración</span>
          <span class="submenu-toggle ml-auto" data-toggle="collapse" data-target="#ajustes-submenu">
            <i class="fa-solid fa-chevron-down"></i>
          </span>
        </a>
        <ul id="ajustes-submenu" class="collapse sidebar-submenu">
          <li><a href="#"><i class="fa-solid fa-gears"></i>Ajustes</a></li>
          <li><a href="{{route('paises')}}"><i class="fa-solid fa-earth-americas"></i>Países</a></li>
          <li><a href="{{route('departamentos')}}"><i class="fa-solid fa-earth-americas"></i>Departamentos</a></li>
          <li><a href="{{route('municipios')}}"><i class="fa-solid fa-earth-americas"></i>Municipios</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
