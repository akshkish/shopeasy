```php
<?php

// Variables

$name = "ShopEasy";
$price = 2999;
$available = true;


// Indexed array

$categories = [
    "Fashion",
    "Electronics",
    "Books"
];


// Associative array

$product = [
    "name" => "Running Shoes",
    "price" => 2999,
    "category" => "Fashion"
];


// File handling

$file = "shopping.txt";

file_put_contents(
    $file,
    "ShopEasy shopping record\n",
    FILE_APPEND
);

$content = file_get_contents($file);

?>

<h2><?php echo $name; ?></h2>

<p>Price: ₹<?php echo $price; ?></p>

<p>
    Category:
    <?php echo $product["category"]; ?>
</p>

<h3>Categories</h3>

<?php

foreach ($categories as $category) {

    echo "<p>$category</p>";

}

?>

<h3>File Content</h3>

<pre><?php echo $content; ?></pre>
```
