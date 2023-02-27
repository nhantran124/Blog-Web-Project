<?php
require 'config/constants.php';

$firstname = $_SESSION['sign-up-data']['firstname'] ?? null;
$lastname = $_SESSION['sign-up-data']['lastname'] ?? null;
$username = $_SESSION['sign-up-data']['username'] ?? null;
$email = $_SESSION['sign-up-data']['email'] ?? null;
$createpassword = $_SESSION['sign-up-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['sign-up-data']['confirmpassword'] ?? null;
unset($_SESSION['sign-up-data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>
    <!--CSS STUFFS-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <!--ICON CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--FONT-->
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>


    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign Up</h2>
            <?php if(isset($_SESSION['sign-up'])) : ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['sign-up'];
                        unset($_SESSION['sign-up']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First name">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last name">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                <input type="text" name="email" value="<?= $email ?>" placeholder="Your Email">
                <input type="text" name="createpassword" value= "<?= $createpassword ?>" placeholder="Your Password">
                <input type="text" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Your Password">
                <div class="form__control">
                    <label for="avatar"></label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <small> Already have an account? <a href="sign-in.php">Sign In</a>
            </small>
            </form>
        </div>
    </section>


</body>

</html>