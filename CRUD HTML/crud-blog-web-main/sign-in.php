<?php
require 'admin/config/constants.php';

$username_email = $_SESSION['sign-in-data']['username_email'] ?? null;
$password = $_SESSION['sign-in-data']['password'] ?? null;
unset($_SESSION['sign-in-data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>
    <!--CSS STUFFS-->
    <link rel="stylesheet" href="./css/style.css">
    <!--ICON CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--FONT-->
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>


    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign In</h2>
            <?php if(isset($_SESSION['sign-up-success'])) : ?>
                <div class="alert__message success">
                    <p>
                        <?= $_SESSION['sign-up-success'];
                        unset($_SESSION['sign-up-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['sign-in'])) : ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['sign-in'];
                        unset($_SESSION['sign-in']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signin-logic.php" method='POST'>
                <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Username or Email">
                <input type="text" name="password" value="<?= $password ?>" placeholder="Password">
                <button type="submit" name="submit" class="btn">Sign In</button>
                <small> Don't have an account? <a href="sign-up.php">Sign Up</a>
            </small>
            </form>
        </div>
    </section>


</body>

</html>