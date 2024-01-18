<?php
require('../../controllers/LoginController.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require __DIR__ . '/./inc/links.php' ?>
    <title>Admin Authentication</title>
</head>

<body>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <!-- <img src="assets/img/img-login.svg" alt=""> -->
            </div>

            <div class="login__forms">
                <form method="POST" action="../../controllers/LoginController.php" class="login__registre" id="login-in">
                    <h1 class="login__title">Log In</h1>
                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input name="admin_name" type="text" require placeholder="Username" class="login__input">
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input name="admin_pass" type="password" require placeholder="Password" class="login__input">
                    </div>

                    <a href="#" class="login__forgot">Forgot password?</a>

                    <button name="login" type="submit" class="login__button">Sign In</button>

                    <div>
                        <span class="login__account">Don't have an Account ?</span>
                        <span class="login__signin" id="sign-up">Sign Up</span>
                    </div>

                </form>

                <form action="" class="login__create none" id="login-up">
                    <h1 class="login__title">Create Account</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" placeholder="Username" class="login__input">
                    </div>

                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="text" placeholder="Email" class="login__input">
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" placeholder="Password" class="login__input">
                    </div>

                    <a href="#" class="login__button">Sign Up</a>

                    <div>
                        <span class="login__account">Already have an Account ?</span>
                        <span class="login__signup" id="sign-in">Sign In</span>
                    </div>

                    <div class="login__social">
                        <a href="#" class="login__social-icon"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="login__social-icon"><i class='bx bxl-twitter'></i></a>
                        <a href="#" class="login__social-icon"><i class='bx bxl-google'></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===== MAIN JS =====-->
    <?php require('./inc/scripts.php') ?>

</body>

</html>