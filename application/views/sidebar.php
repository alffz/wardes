<?php

    ?>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('home') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">hubungi Kami</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a  href="<?= base_url().'logout/keluar'?>" class="nav-link">keluar</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-success">
      <img src="<?= base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Logo desa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         
          <a href="<?= base_url('profil')?>" class="d-block">
            <img src="<?= base_url('assets/gambar/').$user['gambar']?>" class="img-circle elevation-2" alt="User Image">
          </a>
        </div>
          
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
         <!--loop  -->
        <?php 
          
          $role_id    = $this->session->userdata('role_id');
          $is_active  = $this->session->userdata('is_active');
          
          /* tampilkan user_menu.menu dari tabel join antara user_menu dan user_acce_access_menu berdasarkan
            user_menu.role_menu dan user_access_menu.role_menu yg memiliki nilai sama , dan pilih yang 
            user_access_menu.role_acces == $role_id
          */
          $query_menu     = "SELECT menu,user_menu.role_menu FROM user_menu INNER JOIN user_access_menu 
                            ON user_menu.role_menu = user_access_menu.role_menu 
                            WHERE user_access_menu.role_access = $role_id ";
          $menu    = $this->db->query($query_menu)->result_array();
              foreach($menu as $menu) :  ?>
          <div class="sidebaar-heading bg-success mt-3">
            <?= $menu['menu']?>
          </div>
          <?php
            // pilih user_sub_menu yang menu_role nya = 1 atau 2 
            // jika 1 maka sub menu yang ditampilkan yg sub menu nya 1 
            $query_sub_menu = "SELECT * FROM user_sub_menu WHERE menu_role = {$menu['role_menu']}";
            $sub_menu = $this->db->query($query_sub_menu)->result_array();
        ?>
          <!-- loop sub menu  -->
          <?php foreach ($sub_menu as $sub_menu) : ?>
            <li class="nav-item">
              <a href="<?= base_url().$sub_menu['url']?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?= $sub_menu['title']?></p>
                  <p><?= $menu['role_menu']?></p>
              </a>
            </li>
            
          <?php endforeach ?>
        <?php endforeach ?>
          
          <li class="nav-header">====================================</li>
          <li class="nav-item">
            <a href="pages/examples/login.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tentang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/login.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Import dari Excel</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/login.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Peta (Gis)</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

        </div>
    </section>
    <!-- /.content -->