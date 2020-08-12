<?php
$error = isset($_SESSION['error_msg']) ? $_SESSION['error_msg'] : null;
if (isset($_SESSION['user_data'])) {
    header('Location:index.php?action=home');
}
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

    <section>
        <div id="container_demo">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form action="./index.php?action=login" method="post">
                        <h1>Log in</h1>
                        <p>

                            <label for="username" class="uname" data-icon="u"> Your email or username </label>
                            <input id="username" name="email" required="required" type="text" placeholder="myusername or mymail@mail.com" />
                        </p>
                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                            <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                        </p>
                        <?php
                        if ($error) { ?>
                            <p style="color:red;">
                                <?= $error; ?>
                            </p>
                        <?php    } ?>

                        <p class="login button">
                            <input type="submit" value="Login" name="login" />
                        </p>
                        <p class="change_link">
                            Not a member yet ?
                            <a href="#toregister" class="to_register">Join us</a>
                        </p>
                    </form>
                </div>

                <div id="register" class="animate form">
                    <form action="./index.php?action=signup" method="post">
                        <h1> Sign up </h1>
                        <p>
                            <label for="usernamesignup" class="uname" data-icon="f">First Name</label>
                            <input id="usernamesignup" name="first_name" required="required" type="text" placeholder="First Name" class="form-control" />
                        </p>
                        <p>
                            <label for="usernamesignup" class="uname" data-icon="l">Last Name</label>
                            <input id="usernamesignup" name="last_name" required="required" type="text" placeholder="Last Name" class="form-control" />
                        </p>
                        <p>
                            <label for="emailsignup" class="youmail" data-icon="e"> Your email</label>
                            <input id="emailsignup" name="email" required="required" type="email" placeholder="Email id" class="form-control" />
                        </p>
                        <p>
                            <label for="usernamesignup" class="uname" data-icon="d">Date of Birth</label>
                            <input id="usernamesignup" name="date_of_birth" required="required" type="text" placeholder="YYYY-MM-D" class="form-control" />
                        </p>
                        <p>
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                            <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO" class="form-control" />
                        </p>
                        <p>
                            <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                            <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO" />
                        </p>
                        <p class="signin button">
                            <input type="submit" value="Sign up" name="signup" />
                        </p>
                        <p class="change_link">
                            Already a member ?
                            <a href="#tologin" class="to_register"> Go and log in </a>
                        </p>
                    </form>
                </div>

            </div>
        </div>
    </section>

</body>

</html>