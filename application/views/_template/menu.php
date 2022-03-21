<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <h1>hotel zzz</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
          <li class="nav-item">
            <?php if($role =='admin') : ?>

                <a class="nav-link text-white border-right active" aria-current="page" href="<?= site_url('admin/admin_room')?>">Kamar</a>


          </li>
                <li class="nav-item">
                <a class="nav-link text-white border-right active" aria-current="page" href="<?= site_url('admin/admin_facility')?>">Fasilitas</a>


          </li>
            <?php elseif ($role =='receptionist') : ?>

                <li class="nav-item">
                <a class="nav-link text-white border-right active" aria-current="page" href="<?= site_url('receptionist/reservation')?>">Reservasi</a>
          </li>

          
            <?php endif ?>
                <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('auth/logout') ?>">Logout</a>     
      </li>
    </ul>
  </div>
</div>
</nav>