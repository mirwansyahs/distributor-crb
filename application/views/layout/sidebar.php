<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 text-sm  sidebar-dark-teal">
  <!-- Brand Logo -->
  <a href="<?=base_url()?>" class="brand-link navbar-teal sidebar-dark-teal text-sm">
    <img src="<?=base_url()?>assets/img/AdminLTELogo.png" alt="<?=base_name()?>"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?=base_name()?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url()?>assets/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?=$this->userdata->nama?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?=base_url()?>" class="nav-link <?=(@$active == "home")?'active':''?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Beranda
            </p>
          </a>
        </li>
        <?php if ($this->userdata->role == "admin"){ ?>
        <li class="nav-item <?=(@$active == "master")?'menu-open':''?>">
          <a href="#" class="nav-link <?=(@$active == "master")?'active':''?>">
            <i class="nav-icon fas fa-laptop"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url()?>admin/jenis_obat" class="nav-link <?=(@$subactive == "jenis obat")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>admin/supplier" class="nav-link <?=(@$subactive == "supplier")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Supplier</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>admin/pelanggan" class="nav-link <?=(@$subactive == "pelanggan")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Pelanggan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>admin/satuan" class="nav-link <?=(@$subactive == "satuan")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Satuan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?=(@$active == "suplemen")?'menu-open':''?>">
          <a href="#" class="nav-link <?=(@$active == "suplemen")?'active':''?>">
            <i class="nav-icon fas fa-pills"></i>
            <p>
              Data Suplemen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url()?>admin/suplemen" class="nav-link <?=(@$subactive == "data suplemen")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Suplemen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>admin/suplemen_masuk" class="nav-link <?=(@$subactive == "data suplemen masuk")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Suplemen Masuk</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?=(@$active1 == "suplemen add")?'menu-open':''?>">
          <a href="#" class="nav-link <?=(@$active1 == "suplemen add")?'active':''?>">
            <i class="nav-icon fas fa-plus"></i>
            <p>
              Input Suplemen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url()?>admin/suplemen/add" class="nav-link <?=(@$subactive1 == "data suplemen add")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Input Suplemen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>admin/suplemen_masuk/add" class="nav-link <?=(@$subactive1 == "data suplemen masuk add")?'active':''?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Input Suplemen Masuk</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>admin/transaction" class="nav-link <?=(@$active == "transaction")?'active':''?>">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>
              Order
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>admin/laporan" class="nav-link <?=(@$active == "report")?'active':''?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Laporan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url()?>admin/members" class="nav-link <?=(@$active == "users")?'active':''?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Manajemen User
            </p>
          </a>
        </li>
        <?php } ?>
        
        <?php if ($this->userdata->role == "user"){ ?>
          
        <li class="nav-item">
          <a href="<?=base_url()?>admin/transaction" class="nav-link <?=(@$active == "transaction")?'active':''?>">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>
              Order
            </p>
          </a>
        </li>

        <?php } ?>
        <li class="nav-item">
          <a href="<?=base_url()?>admin/members/edit" class="nav-link <?=(@$active == "members")?'active':''?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Ubah Password
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=base_url()?>auth/signout" class="nav-link text-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Keluar
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>