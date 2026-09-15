<form method="POST">

    <input type="text"
           name="name"
           placeholder="Name">

    <input type="email"
           name="email"
           placeholder="Email">

    <input type="password"
           name="password"
           placeholder="Password">

    <button type="submit">
        Register
    </button>

</form> 
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password']; 
```php
<?php

require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash(
        $_POST["password"],
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO customers
            (name, email, password)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $name,
        $email,
        $password
    );

    if (mysqli_stmt_execute($stmt)) {

        $message = "Registration successful!";

    } else {

        $message = "Registration failed.";

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Register</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-5">

    <h2>Register</h2>

    <p><?php echo $message; ?></p>

    <form method="POST">

        <input
            type="text"
            name="name"
            class="form-control mb-3"
            placeholder="Name"
            required
        >

        <input
            type="email"
            name="email"
            class="form-control mb-3"
            placeholder="Email"
            required
        >

        <input
            type="password"
            name="password"
            class="form-control mb-3"
            placeholder="Password"
            required
        >

        <button class="btn btn-primary">
            Register
        </button>

    </form>

</div>

</body>

</html>
```
