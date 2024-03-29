  
  <!-- Main Sidebar Container -->
  <aside id="MySide"  <?php if(auth()->user()->mode == 'on') echo 'class="main-sidebar elevation-2 sidebar-dark-navy"'; else echo 'class="main-sidebar elevation-2 sidebar-light-navy"';?>>
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-navy">
      <img src="{{asset('logo1.png')}}" alt="Kopkar Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong style="font-family: 'Lucida Handwriting', 'Lucida Handwriting','cursive;">Kopkar</strong> MAS</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image">
          <a href="/profile-anggota"><img class="img-circle elevation-2" src="{{url('storage/foto_user/'.auth()->user()->foto)}}" style="width: 45px;height: 45px;object-fit: cover;object-position: 100% 0;"alt="User Avatar"></a>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{strtoupper(auth()->user()->name)}}</a>
          <span class="badge badge-info">@if(auth()->user()->level == 1) Administrator @elseif(auth()->user()->level == 3) Bendahara @elseif(auth()->user()->level == 4) Ketua @elseif(auth()->user()->level == 5) Petugas Barang @elseif(auth()->user()->level == 6) Petugas Motor @elseif(auth()->user()->level == 7) Petugas Tunai @else @endif</span>

        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link {{request()->is('/')?'active':''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          @if(auth()->user()->level == 1)
          <li class="nav-item {{request()->is('admin/list-user')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('admin/list-user')?'active':''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Data Control
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/list-user" class="nav-link {{request()->is('admin/list-user')?'active':''}}">
                  <i class="far fa-user-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{request()->is('petugas-tunai/kredit-anggota')?'active':''}}">
                  <i class="fa fa-book-open nav-icon "></i>
                  <p>Simpanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{request()->is('petugas-tunai/kredit-anggota')?'active':''}}">
                  <i class="fa fa-shopping-cart nav-icon "></i>
                  <p>Kredit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{request()->is('petugas-tunai/kredit-anggota')?'active':''}}">
                  <i class="fa fa-hand-holding-usd nav-icon "></i>
                  <p>Angsuran</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth()->user()->level == 3)
          <li class="nav-item {{request()->is('bendahara/anggota')?'menu-open':''}}">
            <a href="/bendahara/anggota" class="nav-link {{request()->is('bendahara/anggota')?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Anggota
              </p>
            </a>
          </li>
          <li class="nav-item {{request()->is('bendahara/simpanan')?'menu-open':''}}">
            <a href="/bendahara/simpanan" class="nav-link {{request()->is('bendahara/simpanan')?'active':''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Simpanan
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>

          </li>
          <li class="nav-item {{request()->is('bendahara/pengajuan-kredit-anggota','bendahara/kredit-anggota')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('bendahara/pengajuan-kredit-anggota','bendahara/kredit-anggota')?'active':''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Kredit
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/bendahara/pengajuan-kredit-anggota" class="nav-link {{request()->is('bendahara/pengajuan-kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/bendahara/kredit-anggota" class="nav-link {{request()->is('bendahara/kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>Kredit Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{request()->is('bendahara/sisa-hasil-usaha')?'active':''}}" >
            <a href="/bendahara/sisa-hasil-usaha" class="nav-link {{request()->is('bendahara/sisa-hasil-usaha')?'active':''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                SHU
              </p>
            </a>
          </li>
          @endif

          @if(auth()->user()->level == 4)
          <li class="nav-item {{request()->is('ketua/list-user')?'menu-open':''}}">
            <a href="/ketua/list-user" class="nav-link {{request()->is('ketua/list-user')?'active':''}}">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data User
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{request()->is('ketua/pengajuan-kredit-anggota','ketua/kredit-anggota')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('ketua/pengajuan-kredit-anggota','ketua/kredit-anggota')?'active':''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Kredit
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ketua/pengajuan-kredit-anggota" class="nav-link {{request()->is('ketua/pengajuan-kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ketua/kredit-anggota" class="nav-link {{request()->is('ketua/kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>Kredit Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth()->user()->level == 5)
          <li class="nav-item {{request()->is('petugas-barang/pengajuan-kredit-anggota','petugas-barang/kredit-anggota')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('petugas-barang/pengajuan-kredit-anggota','petugas-barang/kredit-anggota')?'active':''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Kredit
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/petugas-barang/pengajuan-kredit-anggota" class="nav-link {{request()->is('petugas-barang/pengajuan-kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/petugas-barang/kredit-anggota" class="nav-link {{request()->is('petugas-barang/kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>Kredit Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth()->user()->level == 6)
          <li class="nav-item {{request()->is('petugas-motor/pengajuan-kredit-anggota','petugas-motor/kredit-anggota')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('petugas-motor/pengajuan-kredit-anggota','petugas-motor/kredit-anggota')?'active':''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Kredit
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/petugas-motor/pengajuan-kredit-anggota" class="nav-link {{request()->is('petugas-motor/pengajuan-kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/petugas-motor/kredit-anggota" class="nav-link {{request()->is('petugas-motor/kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>Kredit Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth()->user()->level == 7)
          <li class="nav-item {{request()->is('petugas-tunai/pengajuan-kredit-anggota','petugas-tunai/kredit-anggota')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('petugas-tunai/pengajuan-kredit-anggota','petugas-tunai/kredit-anggota')?'active':''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Kredit
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/petugas-tunai/pengajuan-kredit-anggota" class="nav-link {{request()->is('petugas-tunai/pengajuan-kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-green"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/petugas-tunai/kredit-anggota" class="nav-link {{request()->is('petugas-tunai/kredit-anggota')?'active':''}}">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>Kredit Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <div class="dropdown-divider" style="background-image: linear-gradient(90deg, navy, orange);height: 4px"></div>
          @if(auth()->user()->level != 1)
          <li class="nav-item {{request()->is('simpanan-saya','kredit-saya','shu-saya/'.auth()->user()->nik_ktp)?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('simpanan-saya','kredit-saya','shu-saya/'.auth()->user()->nik_ktp)?'active':''}}">
              <i class="nav-icon fas fa-star"></i>
              <p>
                My Folder
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/simpanan-saya" class="nav-link {{request()->is('simpanan-saya')?'active':''}}">
                  <i class="fas fa-circle nav-icon text-green"></i>
                  <p>Tabungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kredit-saya" class="nav-link {{request()->is('kredit-saya')?'active':''}}">
                  <i class="fas fa-circle nav-icon text-red"></i>
                  <p>Kredit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/shu-saya/{{auth()->user()->nik_ktp}}" class="nav-link {{request()->is('shu-saya/'.auth()->user()->nik_ktp)?'active':''}}">
                  <i class="fas fa-circle nav-icon text-blue"></i>
                  <p>SHU</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="/edit-password" class="nav-link {{request()->is('edit-password')?'active':''}}">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Ubah Password 
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-logout">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>