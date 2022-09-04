<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-header">PETUGAS PENDAFTARAN </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            PASIEN
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('pendaftaranPasien')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>PENDAFTARAN PASIEN</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('showdatapasien')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-warning"></i>
              <p>PENCARIAN DATA PASIEN</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-edit"></i>
          <p>
              PENCATATAN
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('Kunjungan')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-success"></i>
              <p>KUNJUNGAN</p>
            </a>
          </li>
        </ul>
      </li>
      @if (Auth::user()->role === '3' || Auth::user()->role === '4'  )
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-edit"></i>
          <p>
            PELAYANAN PASIEN
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('diagnosa')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-danger"></i>
              <p>INPUT DIAGNOSA</p>
            </a>
          </li>
        </ul>
      </li>
      @endif
      
      
      <li class="nav-item">
        <a href="{{route('ubah.password')}}" class="nav-link" >
          <i class=" nav-icon fas fa-cog"></i>
          <p>
            UBAH PASSWORD
          </p>
        </a>
      </li>
      @if (Auth::user()->role === '4')
      <li class="nav-item">
        <a class="nav-link" href="{{route('tambahuser')}}">
          <i class="nav-icon fa-solid fas fa-users"></i>
          <p>
            MANAJEMEN USER
          </p>
        </a>
      </li>
      @endif
      @if (Auth::user()->role === '4')
      <li class="nav-item">
        <a href="{{route('poli')}}" class="nav-link">
          <i class="nav-icon fas fa-hospital"></i>
          <p>Manajemen Poli</p>
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
            <a href="{{route('laporan')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>Laporan Kunjungan Poli</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
