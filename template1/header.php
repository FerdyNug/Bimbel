<!-- =========

	Template Name: Play
	Author: UIdeck
	Author URI: https://uideck.com/
	Support: https://uideck.com/support/
	Version: 1.1

========== -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EduSquad | Bimbel dan Tryout Online</title>

  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/svg" />

  <!-- ===== All CSS files ===== -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?= filemtime('assets/css/bootstrap.min.css'); ?>" />
  <link rel="stylesheet" href="assets/css/animate.css?v=<?= filemtime('assets/css/animate.css'); ?>" />
  <link rel="stylesheet" href="assets/css/lineicons.css?v=<?= filemtime('assets/css/lineicons.css'); ?>" />
  <link rel="stylesheet" href="assets/css/ud-styles.css?v=<?= filemtime('assets/css/ud-styles.css'); ?>" />
  <link rel="stylesheet" href="assets/css/custom.css" />

  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
  <!-- ====== Header Start ====== -->
  <header class="ud-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="./landpage.php">
              <img src="assets/images/logo/logo.png" alt="Logo" width="40px" class="rounded-circle" />
            </a>
            <button class="navbar-toggler">
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
            </button>

            <div class="navbar-collapse">

            </div>

            <li class="btn-group">
              <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./assets/images/favicon.png" width="35" height="35" class="img-fluid rounded-circle" alt="">
              </a>
              <ul class="dropdown-menu dropdown-menu-md-end bsb-dropdown-animation bsb-fadeIn">
                <li>
                  <h6 class="dropdown-header fs-7 text-center">Welcome, Muhammad Khaeruman</h6>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <div class="dropdown-item" aria-current="true">
                    <div class="row g-0 align-items-center">
                      <div class="col-3">
                        <img src="./assets/images/favicon.png" width="55" height="55" class="img-fluid rounded-circle" alt="Luke Reeves">
                      </div>
                      <div class="col-9">
                        <div class="ps-3 px-5">
                          <div class="text-secondary mt-1 fs-7">email@domain.com</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="profil.php">
                    <span>
                      <i class="bi bi-person-fill me-2"></i>
                      <span class="fs-7">Profil</span>
                    </span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item text-center" href="#!">
                    <span>
                      <span class="fs-7">Log Out</span>
                    </span>
                  </a>
                </li>
              </ul>
            </li>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ====== Header End ====== -->