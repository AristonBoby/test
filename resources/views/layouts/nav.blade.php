<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">
          @if(Auth::user()->role==='1') Petugas Pendaftaran @elseif(Auth::user()->role==='4')Administrator @elseif(Auth::user()->role==='3')Dokter @elseif(Auth::user()->role==='2')Petugas Rekam Medis @endif
        </li>

      <!-- Nav User Role 1 (Pendaftaran) -->
      @if(Auth::user()->role==='1')
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="nav-icon fas fa-file-medical"></i><p> PASIEN <i class="right fas fa-angle-left"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('pendaftaran.pendaftaranPasien')}}" class=" nav-link">
                <i class="fa fa-user-plus nav-icon text-success"></i><p>PENDAFTARAN PASIEN</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('pendaftaran.showdatapasien')}}" class="nav-link">
                <i class="fa fa-search nav-icon text-warning"></i><p>PENCARIAN DATA PASIEN</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('pendaftaran.password')}}" class="nav-link" >
            <i class=" nav-icon fas fa-cog"></i>
            <p>
              UBAH PASSWORD
            </p>
          </a>
        </li>
      @endif
      <!--End Pendaftaran -->

      <!-- Rekam Medis -->
      @if(Auth::user()->role==='2')
      <li class="nav-item">
        <a href="#" class="nav-link "><i class="nav-icon fas fa-file-medical"></i><p> PASIEN <i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('rekamMedis.pendaftaranPasien')}}" class="nav-link">
              <i class="fa fa-user-plus nav-icon text-success"></i><p>PENDAFTARAN PASIEN</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{Route('rekamMedis.showdatapasien')}}" class="nav-link">
              <i class="fa fa-database nav-icon text-warning"></i><p>PENCARIAN DATA PASIEN</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class=" nav-icon fas fa-edit"></i><p>PENCATATAN<i class="fas fa-angle-left right"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('rekamMedis.Kunjungan')}}" class="nav-link"><i class="far fa-circle nav-icon text-success"></i><p>KUNJUNGAN</p></a>
            </li>
          </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('rekamMedis.password')}}" class="nav-link" >
          <i class=" nav-icon fas fa-cog"></i>
          <p>
            UBAH PASSWORD
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fa fa-book text-success"></i>
          <p>
            Laporan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>
                Laporan Pasien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('rekamMedis.laporanDomisili')}}">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>Wilayah</p>
                  </a>
                <li>
              </ul>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('rekamMedis.laporanKunjungan')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>Laporan Kunjungan</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('rekamMedis.laporanPetugas')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              Laporan Petugas </br> Pendaftaran
            </a>
          </li>
        </ul>
      </li>
    @endif
    <!--End Rekam Medis -->

      <!-- Nav User Role 4 (Administrator) -->
      @if(Auth::user()->role==='4')
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="nav-icon fa fa-file-medical"></i><p> PASIEN <i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('admin.pendaftaranPasien')}}" class="nav-link">
              <i class="fa fa-user-plus nav-icon text-success"></i><p>PENDAFTARAN PASIEN</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{Route('admin.showdatapasien')}}" class="nav-link">
              <i class="fa  fa-database  nav-icon text-warning"></i><p>PENCARIAN DATA PASIEN</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="nav-icon fa fa-file-medical"></i><p> PTM <i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{Route('admin.pendaftaranPtm')}}" class=" nav-link">
              <i class="fa fa-user-plus nav-icon text-info"></i><p>PENDAFTARAN PTM</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('admin.ptmPendaftaran')}}" class="nav-link">
              <i class="fa  fa-database  nav-icon text-warning"></i><p>DATA PTM</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('admin.showdatapasien')}}" class="nav-link">
              <i class="fa  fa-database  nav-icon text-warning"></i><p>PENCARIAN DATA PTM</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class=" nav-icon fas fa-edit"></i><p>PENCATATAN<i class="fas fa-angle-left right"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.Kunjungan')}}" class="nav-link"><i class="far fa-circle nav-icon text-success"></i><p>KUNJUNGAN</p></a>
            </li>
          </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-medkit"></i>
          <p>
            PELAYANAN PASIEN
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.diagnosa')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-danger"></i>
              <p>INPUT DIAGNOSIS</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.ptm')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>PTM</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('admin.password')}}" class="nav-link" >
          <i class=" nav-icon fas fa-cog"></i>
          <p>
            UBAH PASSWORD
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('admin.poli')}}" class="nav-link">
          <i class="nav-icon fas fa-clinic-medical"></i>
          <p>MANAJEMEN POLI</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('admin.jaminan')}}" class="nav-link">
          <i class="nav-icon fas fa-hospital"></i>
          <p>MANAJEMEN JAMINAN</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.tambahuser')}}">
          <i class="nav-icon fa-solid fas fa-hospital-user"></i>
          <p>
            MANAJEMEN USER
          </p>
        </a>
      </li>
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
            <a href="" class="nav-link">
              <i class="fa fa-book nav-icon text-info"></i>
              <p>
                Laporan Pasien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.laporanDomisili')}}">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>Wilayah</p>
                  </a>
                <li>
              </ul>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.laporanKunjungan')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>Laporan Kunjungan</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.laporanPetugas')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-info"></i>
              <p>Laporan Petugas Pendaftaran</p>
            </a>
          </li>
        </ul>
      </li>
      @endif
      <!-- End Administrator -->


      @if (Auth::user()->role === '3' || Auth::user()->role === '4'  )

      @endif
      @if (Auth::user()->role === '4')

      @endif

    </ul>
  </nav>
