<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion " id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
         {{ 'cricketZone' }}
        </div>
        <div class="sidebar-brand-text mx-3 d-sm-block d-md-none d-lg-none">{{ 'cricketZone' }}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

  
      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
  
           <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Charts -->
      <li class="nav-item {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}"  >
        <a class="nav-link" href="{{ route('admin.users.index') }}">
          <i class="fas fa-users"></i>
          <span>Users</span></a>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}"  >
        <a class="nav-link" href="{{ route('admin.orders.index') }}">
          <i class="fas fa-shopping-cart"></i>
          <span>Orders</span></a>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.products.index') }}" >
          <i class="fas fa-shopping-bag"></i>
          <span>Products</span></a>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.brands.index') }}">
          <i class="fas fa-briefcase"></i>
          <span>Brands</span></a>
      </li>
      
      <li class="nav-item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.attributes.index') }}">
          <i class="fas fa-th"></i>
          <span>Attributes</span></a>
      </li>


      <li class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
          <i class="fas fa-tags"></i>
          <span>Categories</span></a>
      </li>
      
      <li class="nav-item {{ Route::currentRouteName() == 'admin.banners.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.category.banners.index') }}">
          <i class="fas fa-map"></i>
          <span>Category Banners</span></a>
      </li>


      <li class="nav-item {{ Route::currentRouteName() == 'admin.banners.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.banners.index') }}">
          <i class="fas fa-map"></i>
          <span>Home Page Banners</span></a>
      </li>

      

       <li class="nav-item {{ Route::currentRouteName() == 'admin.couponAndDeals.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.couponAndDeals.index') }}">
          <i class="fas fa-map"></i>
          <span>Coupons & Deals</span></a>
      </li>

       <li class="nav-item {{ Route::currentRouteName() == 'admin.videos.index' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.videos.index') }}">
          <i class="fas fa-map"></i>
          <span>Videos</span></a>
      </li>


      <li class="nav-item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" >
        <a class="nav-link" href="{{ route('admin.settings') }}">
          <i class="fas fa-cog"></i>
          <span>Settings</span></a>
      </li>

     
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>


