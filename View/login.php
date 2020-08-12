<?php include "templates/header.php";

$error = isset($_SESSION['log_error_msg']) ? $_SESSION['log_error_msg'] : null;
if (isset($_SESSION['user_data'])) {
    header('Location:index.php?action=home');
}

?>
<section>
    <div id="container_demo">

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
                        <!-- <a href="#toregister" class="to_register">Join us</a> -->
                        <a href="./index.php?action=signup" class="to_register">Join us</a>

                    </p>
                </form>
            </div>


        </div>
    </div>
</section>

<?php include "templates/footer.php"; ?>