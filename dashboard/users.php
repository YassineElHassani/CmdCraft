<?php
require_once '../classes/Users.php';

session_start();

if (!isset($_SESSION["id"]) || $_SESSION["role"] !== "admin") {
  header("Location: ../signin/index.php");
  exit();
}

$customers = new Users();
$customer = $customers->getAllUsers();

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
              <span class="logo-title">Elegant</span>
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
              <a href="./users.php" class="active"><span class="icon user-3" aria-hidden="true"></span>Customers</a>
            </li>
            <li>
              <a href="./products.php" class="active"><span class="icon category" aria-hidden="true"></span>Products<span class="msg-counter">7</span></a>
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
          <h2 class="main-title">Customers</h2>
          <div class="users-table table-wrapper">
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th>ID</th>
                  <th>Customer</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                while ($i < count($customer)): ?>
                  <tr>
                    <td>
                      <div class="pages-table-img"><?php echo htmlspecialchars($customer[$i]["id"]) ?></div>
                    </td>
                    <td>
                      <div class="pages-table-img"><?php echo htmlspecialchars($customer[$i]["name"]) ?></div>
                    </td>
                    <?php
                      if ($customer[$i]["is_active"] == 1) {
                        echo "<td><span class='badge-success'>Active</span></td>";
                      } else {
                        echo "<td><span class='badge-trashed'>Deactivated</span></td>";
                      }
                    ?>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <i data-feather="more-horizontal" aria-hidden="true"></i>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="./activate.php?id=<?php echo htmlspecialchars($customer[$i]["id"]) ?>">Activate</a></li>
                          <li><a href="./deactivate.php?id=<?php echo htmlspecialchars($customer[$i]["id"]) ?>">Deactivate</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                <?php
                  $i++;
                endwhile;
                ?>
              </tbody>
            </table>
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