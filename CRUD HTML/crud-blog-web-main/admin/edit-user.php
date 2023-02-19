<?php
include 'partials/header.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
} else{
    header('location: ' . ROOT_URL . 'admin/manage-users.php');
    die();
}
?>

    <section class="form__section">
        <div class="container form__section-container">
            <h2>Edit User</h2>
            <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" method="POST">
                <input type="hidden" value="<?= $user['id'] ?>" name="id">
                <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First name">
                <input type="text" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last name">
                <select name="userrole">
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form__control">
                    <label for="avatar"></label>
                    <input type="file" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Update User</button>
            </form>
        </div>

    </section>

<?php
include '../partials/footer.php';
?>