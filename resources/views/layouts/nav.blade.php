<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-header">PENDAFTARAN PASIEN</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Pendaftaran Pasien
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('pendaftaranPasien')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>Input Pasien Baru</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('showdatapasien')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-warning"></i>
              <p>Pencarian Data Pasien</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-edit"></i>
          <p>
              Kunjungan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('Kunjungan')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-success"></i>
              <p>Input Kunjungan Sakit</p>
            </a>
          </li>
        </ul>
      </li>
      @if (Auth::user()->role === '3' || Auth::user()->role === '4'  )
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
              <i class="far fa-circle nav-icon text-danger"></i>
              <p>Input Diagnosa</p>
            </a>
          </li>
        </ul>
      </li>
      @endif
      
      
      <li class="nav-item">
        <a href="{{Route('ubah.password')}}" class="nav-link" >
          <i class=" nav-icon fas fa-cog"></i>
          <p>
            Ubah Password
          </p>
        </a>
      </li>
      @if (Auth::user()->role === '4')
      <li class="nav-item">
        <a class="nav-link" href="{{route('tambahuser')}}">
          <i class="nav-icon fa-solid fas fa-users"></i>
          <p>
            Tambah User
          </p>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fa-solid fas fa-solid fas fa-receipt"></i>
          <p>
            Laporan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('laporan')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>Laporan Kunjungan Poli</p>
            </a>
          </li>
        </ul>
        <li class="nav-item">
          <a class=" nav-link " href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <p>Logout</p>
          </a>
        </li>
      </li>

      <li class="nav-item">


      </li>

    </ul>
  </nav>
