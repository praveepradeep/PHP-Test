<?php
// session_start();
$user = isset($_SESSION['user_data']) ? unserialize($_SESSION['user_data']) : header('Location:index.php?action=logout');
 
 include "templates/header.php";

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

    <h5 class="home">Helloo, <span class="name"> <?= $data['first_name'] . " " . $data['last_name']; ?> </span> welcome back !</h5>

    <?php include "templates/footer.php"; ?>