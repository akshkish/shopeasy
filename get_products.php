```php
<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "online_shopping"
);

$result = mysqli_query(
    $conn,
    "SELECT * FROM products"
);

while ($product = mysqli_fetch_assoc($result)) {

    echo "
    <div class='col-md-3 mb-4'>

        <div class='card product-card h-100'>

            <img
                src='uploads/{$product['image']}'
                class='card-img-top'
                height='200'
            >

            <div class='card-body'>

                <h5 class='card-title'>
                    {$product['name']}
                </h5>

                <p>
                    {$product['description']}
                </p>

                <h5 class='price'>
                    ₹{$product['price']}
                </h5>

                <button class='btn btn-primary btn-cart'>
                    Add to Cart
                </button>

            </div>

        </div>

    </div>
    ";

}

?>
```
