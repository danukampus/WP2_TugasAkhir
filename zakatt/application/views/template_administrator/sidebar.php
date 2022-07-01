  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
          <div class="sidebar-brand-icon">
              <i class="fas fa-mosque"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Masjid Nurul Iman <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php
        $role_id = $this->session->userdata('role_id');
        ?>
      <?php if ($role_id == 1) : ?>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/mustahik') ?>">
                  <i class="fas fa-fw fa-book-reader"></i>
                  <span>Data Mustahik</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/panitia') ?>">
                  <i class="fas fa-fw fa-users"></i>
                  <span>Data Panitia</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/zakat') ?>">
                  <i class="fas fa-fw fa-pencil-alt"></i>
                  <span>Data Muzakki</span></a>
          </li>
      <?php else : ?>
      <?php endif; ?>

      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('user') ?>">
              <i class="fas fa-fw fa-user"></i>
              <span>Profil Saya</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('user/datapezakat') ?>">
              <i class="fas fa-fw fa-pencil-alt"></i>
              <span>Catat Muzakki</span></a>
      </li>

      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <!-- End of Sidebar -->