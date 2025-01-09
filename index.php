<?php 
require_once './classes/ProductManager.php';

// session_start();

// if (!isset($_SESSION["id"]) || $_SESSION["role"] !== "customer") {
//   header("Location: ../signin/index.php");
//   exit();
// }


$products = new ProductManager();
$product = $products->getAllProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #cart {
            position: fixed;
            top: 95%;
            right: 20px;
            transform: translateY(-50%);
            background-color: transparent;
            border-radius: 8px;
            max-height: 80vh;
            overflow-y: auto;
            cursor: pointer;
        }
        #cart_container {
            position: fixed;
            height: 800px;
            width: 800px;
            background-color:rgb(156, 152, 156);
            border-radius: 50px;
            margin-left: 29%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-blue-500 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="\" class="text-xl font-bold flex items-center g"><img src="../img/svg/logo.svg" height="30px" width="30px"><p style="margin-left: 5px;"><b>My Store</b></p></a>
            <ul class="flex space-x-4">
                <li><a href="./signin/index.php" class="hover:text-blue-200"><img src="./img/svg/Bulk/AddUser.svg" alt="Login"></a></li>
            </ul>
        </div>
    </nav>

    <div id="cart_container" style="visibility: hidden;">
        <button id="close" style="margin-top: 20px; margin-left: 92%;"><img src="./img/avatar/close.png" height="30px" width="30px"></button><br>
        <center>
            <h2 class="text-lg font-bold mb-4">Shopping Cart</h2>
        </center>
        <ul id="cart-items"></ul>
        <center>
            <div id="cart-total" class="mt-4 font-bold">Total: $0.00</div>
            <button id="confirm-order" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Confirm Order</button>
            <button id="clear-cart" class="mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Clear Cart</button>
        </center>
    </div>
    

    <section class="bg-blue-100 py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold text-blue-800 mb-4">Welcome to Our Store</h1>
            <p class="text-lg text-gray-700">Explore our amazing products.</p>
        </div>
    </section>

    <div id="cart">
        <p id="counter_products" style="color: red; position: relative;"><b>0</b></p>
        <img src="./img/avatar/basket.png" style="position: relative; margin-bottom: 15px;" height="60px" width="60px"/>
    </div>

    <section class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Featured Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8" id="products-container">

            <?php 
                $i = 0;
                while ($i < count($product)):
            ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="<?php echo htmlspecialchars($product[$i]["image"]) ?>" alt="Product Image" style="height: 280px; width: 280px;" class="mb-4 rounded-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo htmlspecialchars($product[$i]["name"]) ?></h3>
                <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($product[$i]["description"]) ?></p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-bold text-blue-500">$<?php echo htmlspecialchars($product[$i]["price"]) ?></span>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
                </div>
            </div>

            <?php $i++;
            endwhile; ?>

        </div>
    </section>

    <footer class="bg-gray-800 py-4 text-white text-center h-[200px] flex items-center justify-center">
        <p>&copy; 2025 My Store. All rights reserved.</p>
    </footer>

    <script src="./js/main.js"></script>
</body>
</html>