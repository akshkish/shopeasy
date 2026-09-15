```php
<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "online_shopping"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
} 
session_start();

setcookie(
    "shop_user",
    "ShopEasy",
    time() + 86400,
    "/"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ShopEasy</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        /* CSS3 TRANSFORM + TRANSITION */

        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* Image zoom */

        .product-card img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s;
        }

        .product-card:hover img {
            transform: scale(1.08);
        }

        /* Button transition */

        .btn-cart {
            transition: transform 0.2s, background-color 0.3s;
        }

        .btn-cart:hover {
            transform: scale(1.05);
        }

        /* CSS3 ANIMATION */

        .hero-title {
            animation: slideDown 1s ease;
        }

        .hero-text {
            animation: fadeIn 1.5s ease;
        }

        @keyframes slideDown {

            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        @keyframes fadeIn {

            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }

        }

    </style>

</head> 
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/script.js"></script>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            ShopEasy
        </a>

        <!-- Mobile menu button -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="navbarMenu">

            <div class="navbar-nav ms-auto">

                <a class="nav-link" href="index.php">
                    Home
                </a>

                <a class="nav-link" href="products.php">
                    Products
                </a>

                <a class="nav-link" href="cart.php">
                    Cart
                </a>

                <a class="nav-link" href="login.php">
                    Login
                </a>

            </div>

        </div>

    </div>

</nav>


<!-- HERO SECTION -->

<div class="container-fluid bg-light text-center py-5">

    <h1 class="display-4 fw-bold hero-title">
        Welcome to ShopEasy
    </h1>

    <p class="lead hero-text">
        Shop your favourite products at the best prices.
    </p>

    <a href="products.php" class="btn btn-primary btn-lg">
        Shop Now
    </a>

</div>


<!-- PRODUCT LIST -->

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Our Products
    </h2>


    <div class="row">


        <?php

        $result = mysqli_query(
            $conn,
            "SELECT * FROM products"
        );

        while ($product = mysqli_fetch_assoc($result)) {

        ?>


        <!-- Bootstrap responsive grid -->

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">


            <!-- Product Card -->

            <div class="card product-card h-100">


                <img
                    src="uploads/<?php echo $product['image']; ?>"
                    class="card-img-top"
                    alt="<?php echo $product['name']; ?>"
                >


                <div class="card-body d-flex flex-column">


                    <h5 class="card-title">
                        <?php echo $product['name']; ?>
                    </h5>


                    <p class="text-muted">
                        <?php echo $product['category']; ?>
                    </p>


                    <p>
                        <?php echo $product['description']; ?>
                    </p>


                    <h5 class="mb-3">
                        ₹<?php echo $product['price']; ?>
                    </h5>


                    <button class="btn btn-primary btn-cart mt-auto">
                        Add to Cart
                    </button>


                </div>

            </div>


        </div>


        <?php

        }

        ?>


    </div>

</div>


```html
<!-- Bootstrap JavaScript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>

/* ================================
   JAVASCRIPT CLASS
   ================================ */

class Product {

    constructor(name, price) {
        this.name = name;
        this.price = price;
    }

    showDetails() {
        return this.name + " - ₹" + this.price;
    }

}


/* ================================
   JAVASCRIPT EVENT
   ================================ */

document.querySelectorAll(".btn-cart").forEach(function(button) {

    button.addEventListener("click", function() {

        // Get product information from the card
        let card = this.closest(".product-card");

        let name = card.querySelector(".card-title").innerText;
        let price = card.querySelector("h5").innerText.replace("₹", "");

        // Create Product object
        let product = new Product(name, price);

        // Display result
        alert(product.showDetails() + " added to cart!");

    });

});


</script>


</body>
</html>
```
