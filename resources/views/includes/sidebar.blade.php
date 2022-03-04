<nav id="sidebar" style="display: none" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === '/forget' ? false : true">
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="{{ asset('backend/img/logo/logo2.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <router-link class="nav-link" to="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></router-link>
    </li>

    <li class="nav-item active">
      <router-link class="nav-link" to="/pos">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Pos</span></router-link>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Employee </span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/store-employee">Add Employee</router-link>
          <router-link class="collapse-item" to="/employees">All Employee</router-link>
          
        </div>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap11"
        aria-expanded="true" aria-controls="collapseBootstrap11">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Suppliers </span>
      </a>
      <div id="collapseBootstrap11" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/store-supplier">Add Suppliers</router-link>
          <router-link class="collapse-item" to="/suppliers">All Suppliers</router-link>
          
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap111"
        aria-expanded="true" aria-controls="collapseBootstrap111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Categories </span>
      </a>
      <div id="collapseBootstrap111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/store-category">Add Category</router-link>
          <router-link class="collapse-item" to="/categories">All Categories</router-link>
          
        </div>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1111"
        aria-expanded="true" aria-controls="collapseBootstrap1111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Products </span>
      </a>
      <div id="collapseBootstrap1111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/store-product">Add Product</router-link>
          <router-link class="collapse-item" to="/products">All Products</router-link>
          
        </div>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap11111"
        aria-expanded="true" aria-controls="collapseBootstrap11111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Customers </span>
      </a>
      <div id="collapseBootstrap11111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/store-customer">Add Customer</router-link>
          <router-link class="collapse-item" to="/customers">All Customer</router-link>
          
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap111111"
        aria-expanded="true" aria-controls="collapseBootstrap111111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Salar </span>
      </a>
      <div id="collapseBootstrap111111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/give-salar">Add Salar</router-link>
          <router-link class="collapse-item" to="/salaries">All Salar</router-link>
          
        </div>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap111111"
        aria-expanded="true" aria-controls="collapseBootstrap111111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Expenses </span>
      </a>
      <div id="collapseBootstrap111111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/store-expense">Add Expense</router-link>
          <router-link class="collapse-item" to="/expenses">All Expenses</router-link>
          
        </div>
      </div>
    </li>


    
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
        aria-expanded="true" aria-controls="collapseBootstrap4">
        <i class="far fa-fw fa-window-maximize"></i>
        <span> Orders </span>
      </a>
      <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">

          <router-link class="collapse-item" to="/orders">Today Order </router-link>
          <router-link class="collapse-item" to="/order/search">Search</router-link>
          
        </div>
      </div>
    </li>

    <li class="nav-item">
      <router-link class="nav-link" to="/stock">
        <i class="fab fa-fw fa-wpforms"></i>
        <span>Stock</span>
      </router-link>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
        aria-controls="collapseTable">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span>
      </a>
      <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Tables</h6>
          <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
          <a class="collapse-item" href="datatables.html">DataTables</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ui-colors.html">
        <i class="fas fa-fw fa-palette"></i>
        <span>UI Colors</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Examples
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
        aria-controls="collapsePage">
        <i class="fas fa-fw fa-columns"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Example Pages</h6>
          <a class="collapse-item" href="login.html">Login</a>
          <a class="collapse-item" href="register.html">Register</a>
          <a class="collapse-item" href="404.html">404 Page</a>
          <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>
</nav>