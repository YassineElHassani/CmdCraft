<?php

session_start();

if (!isset($_SESSION["id"]) || $_SESSION["role"] !== "admin") {
  header("Location: ../signin/index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../css/style.min.css">
</head>

<body>
  <div class="layer"></div>
  <!-- ! Body -->
  <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
  <div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-start">
        <div class="sidebar-head">
          <a href="/" class="logo-wrapper" title="Home">
            <span class="sr-only">Home</span>
            <span class="icon logo" aria-hidden="true"></span>
            <div class="logo-text">
              <span class="logo-title">Store</span>
              <span class="logo-subtitle">Dashboard</span>
            </div>

          </a>
          <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
            <span class="sr-only">Toggle menu</span>
            <span class="icon menu-toggle" aria-hidden="true"></span>
          </button>
        </div>
        <div class="sidebar-body">
          <ul class="sidebar-body-menu">
            <li>
              <a href="./index.php" class="active"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
            </li>
            <li>
              <a href="./users.php" class="active"><span class="icon user-3" aria-hidden="true"></span>Users</a>
            </li>
            <li>
              <a href="./products.php" class="active" ><span class="icon category" aria-hidden="true"></span>Products</a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
    <div class="main-wrapper">
      <!-- ! Main nav -->
      <nav class="main-nav--bg">
        <div class="container main-nav">
          <div class="main-nav-start">
          </div>
          <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
              <span class="sr-only">Toggle menu</span>
              <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
              <span class="sr-only">Switch theme</span>
              <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
              <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
            </button>
            <div class="notification-wrapper">
              <ul class="users-item-dropdown notification-dropdown dropdown">
                <li>
                  <a href="##">
                    <div class="notification-dropdown-icon info">
                      <i data-feather="check"></i>
                    </div>
                    <div class="notification-dropdown-text">
                      <span class="notification-dropdown__title">System just updated</span>
                      <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                        here.</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="notification-dropdown-icon danger">
                      <i data-feather="info" aria-hidden="true"></i>
                    </div>
                    <div class="notification-dropdown-text">
                      <span class="notification-dropdown__title">The cache is full!</span>
                      <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                        interfere ...</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="notification-dropdown-icon info">
                      <i data-feather="check" aria-hidden="true"></i>
                    </div>
                    <div class="notification-dropdown-text">
                      <span class="notification-dropdown__title">New Subscriber here!</span>
                      <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="link-to-page" href="##">Go to Notifications page</a>
                </li>
              </ul>
            </div>
            <div class="nav-user-wrapper">
              <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                <span class="sr-only">My profile</span>
                <span class="nav-user-img">
                  <picture>
                    <source srcset="../img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="../img/avatar/avatar-illustrated-02.png" alt="User name">
                  </picture>
                </span>
              </button>
              <ul class="users-item-dropdown nav-user-dropdown dropdown">
                <li><a href="##">
                    <i data-feather="user" aria-hidden="true"></i>
                    <span>Profile</span>
                  </a></li>
                <li><a href="##">
                    <i data-feather="settings" aria-hidden="true"></i>
                    <span>Account settings</span>
                  </a></li>
                <li><a class="danger" href="##">
                    <i data-feather="log-out" aria-hidden="true"></i>
                    <span>Log out</span>
                  </a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- ! Main -->
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title">Dashboard</h2>
          <div class="row stat-cards">
            <div class="col-md-6 col-xl-3">
              <article class="stat-cards-item">
                <div class="stat-cards-icon primary">
                  <i data-feather="bar-chart-2" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                  <p class="stat-cards-info__num">1478 286</p>
                  <p class="stat-cards-info__title">Total Orders</p>
                  <p class="stat-cards-info__progress">
                    <span class="stat-cards-info__profit success">
                      <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                    </span>
                    Last month
                  </p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-xl-3">
              <article class="stat-cards-item">
                <div class="stat-cards-icon warning">
                  <i data-feather="file" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                  <p class="stat-cards-info__num">1478 286</p>
                  <p class="stat-cards-info__title">Total Customers</p>
                  <p class="stat-cards-info__progress">
                    <span class="stat-cards-info__profit success">
                      <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                    </span>
                    Last month
                  </p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-xl-3">
              <article class="stat-cards-item">
                <div class="stat-cards-icon purple">
                  <i data-feather="file" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                  <p class="stat-cards-info__num">1478 286</p>
                  <p class="stat-cards-info__title">Total Products</p>
                  <p class="stat-cards-info__progress">
                    <span class="stat-cards-info__profit danger">
                      <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                    </span>
                    Last month
                  </p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-xl-3">
              <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                  <i data-feather="feather" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                  <p class="stat-cards-info__num">1478 286</p>
                  <p class="stat-cards-info__title">Total Active Customers</p>
                  <p class="stat-cards-info__progress">
                    <span class="stat-cards-info__profit warning">
                      <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                    </span>
                    Last month
                  </p>
                </div>
              </article>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-9">
              <!-- <div class="chart">
                <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
              </div> -->
              
            </div>
            <div class="col-lg-3">
              
            </div>
          </div>
        </div>
      </main>
      <!-- ! Footer -->
      <footer class="footer">
        <div class="container footer--flex">
          <div class="footer-start">
          </div>
          <ul class="footer-end">
            <li><a href="##">About</a></li>
            <li><a href="##">Support</a></li>
            <li><a href="##">Puchase</a></li>
          </ul>
        </div>
      </footer>
    </div>
  </div>
  <!-- Chart library -->
  <script src="../plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="../plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="../js/script.js"></script>
</body>

</html>