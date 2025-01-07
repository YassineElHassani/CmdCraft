<?php
require_once '../../classes/ProductManager.php';

$manager = new ProductManager();

if (isset($_GET["id"])) {
    $product = $manager->getProduct($_GET["id"]);
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $updatedProduct = new Product(
            (int)$_POST["id"],
            $_POST["name"],
            $_POST["description"],
            (float)$_POST["price"],
            (int)$_POST["quantity"],
            $_POST["image"]
        );
    
        $manager->updateProduct($updatedProduct);
    
        header('Location: ../products.php');
    }
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
  <link rel="shortcut icon" href="../../img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../../css/style.min.css">
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
              <a href="../index.php" class="active"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
            </li>
            <li>
              <a href="../users.php" class="active"><span class="icon user-3" aria-hidden="true"></span>Users</a>
            </li>
            <li>
              <a href="../products.php" class="active" ><span class="icon category" aria-hidden="true"></span>Products</a>
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
                    <source srcset="../../img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="../../img/avatar/avatar-illustrated-02.png" alt="User name">
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
          <h2 class="main-title">Products</h2>
          <div style="background-color: white; border-radius: 30px; font-weight: 500; font-size: 14px; line-height: 2.43; color: #767676; width: 800px; margin-inline: auto;">
            <form method="POST" style="width: 800px; height: 370px; margin-top: 50px;">
              <div style="display: flex; justify-content: space-around; align-items: center; padding: 15px; width: 800px;">
                <div>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($product->getId()); ?>">
                  <div>
                    <label for="name">Product name: </label><br>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($product->getName()); ?>" style="padding-left: 6px;" required>
                  </div>
                  <div>
                    <label for="price">Price: </label><br>
                    <input type="number" id="price" name="price" step="0.01" value="<?= htmlspecialchars($product->getPrice()); ?>" style="padding-left: 6px;" required>
                  </div>
                  <div>
                    <label for="quantity">Quantity: </label><br>
                    <input type="number" id="quantity" name="quantity" value="<?= htmlspecialchars($product->getQuantity()); ?>" style="padding-left: 6px;" required>
                  </div>
                </div>
                <div>
                  <label for="description">Description</label><br>
                  <textarea name="description" id="description" style="width: 300px; height: 180px;" style="padding-left: 6px;" required><?= htmlspecialchars($product->getDescription()); ?></textarea>
                </div>
              </div>
              <div style="display: flex; justify-content: space-around; align-items: center; padding: 15px; width: 800px;">
                <div>
                  <label for="image">Product image: </label><br>
                  <input type="text" id="image" name="image" value="<?= htmlspecialchars($product->getImage()); ?>" required>
                </div>
                <div>
                  <button type="submit" id="submit" name="submit" style="width: 300px; height: 40px; background-color:rgb(79, 103, 240); border-radius: 30px; color: white;">Update Product</button>
                </div>
              </div>
            </form>
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
            <li><a href="##">Purchase</a></li>
          </ul>
        </div>
      </footer>
    </div>
  </div>
  <!-- Chart library -->
  <script src="../../plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="../../plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="../../js/script.js"></script>
</body>
</html>