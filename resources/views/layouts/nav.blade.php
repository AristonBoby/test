<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-header">PENDAFTARAN PASIEN</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Data Pasien
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('pendaftaranPasien')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>Pasien Baru</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('updatePasien')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-warning"></i>
              <p>Pasien Terdaftar</p>
            </a>
          </li>
        
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Input Kunjungan 
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('Kunjungan')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kunjungan Sakit</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-edit"></i>
          <p>
            Pelayanan Pasien
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('diagnosa')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Input Diagnosa</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Laporan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('laporan')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}" x-data>
          @csrf

          <a href="{{ route('logout') }}"
                   @click.prevent="$root.submit();">
              {{ __('Log Out') }}
          </a>
      </form>
      </li>
    </ul>
  </nav>