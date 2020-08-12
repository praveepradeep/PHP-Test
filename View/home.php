<?php
// session_start();
$user = isset($_SESSION['user_data']) ? unserialize($_SESSION['user_data']) : header('Location:index.php?action=logout');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login or Signup</title>
    <link rel="stylesheet" type="text/css" href="<?= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME']; ?>/php-test/PHP-Test/assets/style.css">
    <link href="<?= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME']; ?>/php-test/PHP-Test/assets/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME']; ?>/php-test/PHP-Test/assets/bootstrap.css">
    <script src="<?= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME']; ?>/php-test/PHP-Test/assets/jquery.min.js"></script>
    <script src="<?= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME']; ?>/php-test/PHP-Test/assets/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME']; ?>/php-test/PHP-Test/assets/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?= 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['SERVER_NAME']; ?>/php-test/PHP-Test/assets/animate-custom.css" />

</head>

<body>
    <?php
    $data = [];
    foreach ($user as $key => $value) {
        $data[$key] = $value;
    }
    ?>


    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <div class="login-container">
            <form action="./index.php?action=logout" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    <h5>Helloo <?= $data['first_name'] . " " . $data['last_name']; ?> welcome back !</h5>
</body>

</html>