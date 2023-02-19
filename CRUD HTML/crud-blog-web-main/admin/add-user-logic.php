<?php

require './config/database.php';

if(isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];
    if(!$firstname) {
        $_SESSION['add-user'] = 'Please enter your first name';
    } elseif(!$lastname) {
        $_SESSION['add-user'] = 'Please enter your last name';
    } elseif(!$username) {
        $_SESSION['add-user'] = 'Please enter your username';
    } elseif(!$email) {
        $_SESSION['add-user'] = 'Please enter your email';
    // }elseif(!$is_admin) {
    //     $_SESSION['add-user'] = 'Please select user role';
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = 'Password should be 8+ characters';
    } elseif (!$avatar['name']) {
        $_SESSION['add-user'] = 'Please upload an avatar';
    } else {
        if ($createpassword !== $confirmpassword) {
            $_SESSION['sign-up'] = 'Passwords do not match';
        } else {
            $hashedpassword = password_hash($createpassword, PASSWORD_DEFAULT);
            $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['add-user'] = 'Username or email already exists';
            } else {
                $time = time();
                $avatar_name = $time . '_' . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;
                $allowed_files = ['jpg', 'jpeg', 'png'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                if(in_array($extension, $allowed_files)) {
                    if($avatar['size'] < 1000000) {
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = 'Avatar is too large. Should be less than 1mb';
                    }
                } else {
                    $_SESSION['add-user'] = 'Avatar should be a jpg, jpeg or png';
                }
            }
        }
    }

    if(isset($_SESSION['add-user'])) {
        $_SESSION['add-user-data'] = $_POST;
        header('Location: ' . ROOT_URL . '/admin/add-user.php');
        die();
    } else {
        $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', 
        email='$email', password='$hashedpassword', avatar='$avatar_name', is_admin=$is_admin";
        $insert_user_result = mysqli_query($connection, $insert_user_query);
        if(!mysqli_errno($connection)) {
            $_SESSION['add-user-success'] = "New user $firstname $lastname added successfully.";
            header('Location: ' . ROOT_URL . 'admin/manage-users.php');
            die();
        }
    }

} else {
    header('Location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}
