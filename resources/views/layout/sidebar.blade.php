<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('/assets/img/favicon/logo.png') }}" alt="">
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">monas</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>
  @php $menus = ['properties', 'wisma-admin', 'ruangan.detail']; $route = Route::currentRouteName(); @endphp
  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ ($route == 'dashboard') ? 'active' : '' }}">
      <a href="/" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    @if (Auth::user()->role == 'admin')
    <li class="menu-item {{ (in_array($route, $menus))? 'active open' : '' }}">
      <a href="#" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-coin-stack"></i>
        <div data-i18n="Apps">Data Master</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item {{ ($route == 'properties') ? 'active' : '' }}">
          <a href="{{ route('properties') }}" class="menu-link">
            <div data-i18n="going">Data Ruangan</div>
          </a>
        </li>
        <li class="menu-item {{ ($route == 'ruangan.detail') ? 'active' : '' }}">
          <a href="{{ route('ruangan.detail') }}" class="menu-link">
            <div data-i18n="going">Peminjaman Ruangan</div>
          </a>
        </li>
        <li class="menu-item {{ ($route == 'wisma-admin') ? 'active' :  '' }}">
          <a href="{{ route('wisma-admin') }}" class="menu-link">
            <div data-i18n="idle">Asrama & Paviliun</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ (strpos($route, 'transactions') !== false) ? 'active open' : '' }}">
      <a href="#" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-grid-alt"></i>
        <div data-i18n="Apps">Peminjaman</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item {{ ($route == 'transactions.ruangan.show') ? 'active' : '' }}">
          <a href="{{ route('transactions.ruangan.show') }}" class="menu-link">
            <div data-i18n="going">Ruangan</div>
          </a>
        </li>
        <li class="menu-item {{ ($route == 'transactions.wisma.show') ? 'active' : '' }}">
          <a href="{{ route('transactions.wisma.show') }}" class="menu-link">
            <div data-i18n="idle">Asrama & Paviliun</div>
          </a>
        </li>
      </ul>
    </li>
    @endif

    @if(Auth::user()->role == 'user')
    <li class="menu-item {{ ($route == 'wisma_show_user') ? 'active' : '' }}">
      <a href="{{ route('wisma_show_user') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-building-house"></i>
        <div data-i18n="Apps">Asrama & Paviliun</div>
      </a>
    </li>
    @endif

    <li class="menu-item {{ ($route == 'calendar') ? 'active' : ''}}">
      <a href="{{ route('calendar') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div data-i18n="room">Kalender Kegiatan</div>
      </a>
    </li>
  </ul>
</aside>