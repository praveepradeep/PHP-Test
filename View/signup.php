<?php

include "templates/header.php";

$error = isset($_SESSION['reg_error_msg']) ? $_SESSION['reg_error_msg'] : null;

if (isset($_SESSION['user_data']) && !isset($_SESSION['reg_error_msg'])) {
 
    header('Location:index.php?action=home');
}


?>

<section>
    <div id="container_demo">

        <div id="wrapper">
            <div class="animate form">
                <form action="./index.php?action=register" method="post">
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
                        <input type="date" id="usernamesignup" name="date_of_birth" required="required" placeholder="YYYY-MM-D" class="form-control" />
                    </p>
                    <p>
                        <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                        <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO" class="form-control" />
                    </p>
                    <p>
                        <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                        <input id="passwordsignup_confirm" name="password_confirm" required="required" type="password" placeholder="eg. X8df!90EO" />
                    </p>
                    <?php if ($error) { ?>
                        <p style="color:red;">
                            <?= $error; ?>
                        </p>
                    <?php    } ?>
                    <p class="signin button">
                        <input type="submit" value="Sign up" name="signup" />
                    </p>
                    <p class="change_link">
                        Already a member ?
                        <!-- <a href="#tologin" class="to_register"> Go and log in </a> -->
                        <a href="./index.php" class="to_register"> Go and log in </a>

                    </p>
                </form>
            </div>

        </div>
    </div>
</section>

<?php include "templates/footer.php"; ?>