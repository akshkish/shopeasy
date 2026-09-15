```php
<?php

session_start();

require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM customers
            WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $email
    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $user = mysqli_fetch_assoc($result);

    if ($user &&
        password_verify(
            $password,
            $user["password"]
        )) {

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];

        header("Location: index.php");
        exit();

    } else {

        $message = "Invalid email or password.";

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Login</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-5">

    <h2>Login</h2>

    <p><?php echo $message; ?></p>

    <form method="POST">

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
            Login
        </button>

    </form>

    <p class="mt-3">
        New user?
        <a href="register.php">Register</a>
    </p>

</div>

</body>

</html>
```
