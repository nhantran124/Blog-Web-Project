<?php
include '../partials/header.php';

//fetch users from database but not current user
$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
$users = mysqli_query($connection, $query);
?>

    <section class="dashboard">
        <?php if(isset($_SESSION['add-user-success'])) : //shows if add user was successfully?>   
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['add-user-success'];
                    unset($_SESSION['add-user-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['edit-user-success'])) : //shows if edit user was successfully?>   
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['edit-user-success'];
                    unset($_SESSION['edit-user-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['delete-user'])) : //shows if delete user was NOT successful?>   
            <div class="alert__message error success">
                <p>
                    <?= $_SESSION['delete-user'];
                    unset($_SESSION['delete-user']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['delete-user-success'])) : //shows if delete user was successful?>   
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['delete-user-success'];
                    unset($_SESSION['delete-user-success']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <div class="container dashboard__container">
            <button id="show__sidebar-btn" class="sidebar__toggle">
                <i class="uil uil-angle-right-b"></i>
            </button>
            <button id="hide__sidebar-btn" class="sidebar__toggle">
                <i class="uil uil-angle-right-b"></i>
            </button>
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php"><i class = "uil uil-pen"></i>
                            <h5>Add Post</h5>
                        </a>
                    </li>
                    <li>
                        <a href="index.php"><i class = "uil uil-postcard"></i>
                            <h5>Manager Post</h5>
                        </a>
                    </li>
                    <?php if(isset($_SESSION['user_is_admin'])): ?>
                        <li>
                            <a href="add-user.php"><i class = "uil uil-user-plus"></i>
                                <h5>Add User</h5>
                            </a>
                        </li>
                        <li>
                            <a href="manage-users.php"><i class = "uil uil-pen"></i>
                                <h5>Manager User</h5>
                            </a>
                        </li>
                        <li>
                            <a href="add-category.php"><i class = "uil uil-edit"></i>
                                <h5>Add Category</h5>
                            </a>
                        </li>
                        <li>
                            <a href="manage-categories.php"><i class = "uil uil-pen"></i>
                                <h5>Manager Category</h5>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Manager User</h2>
                <?php if(mysqli_num_rows($users) >0) : ?>
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </thead>
                    <tbody>
                        <?php while($user = mysqli_fetch_assoc($users)) : ?>
                            <tr>
                                <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                                <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td> 
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
                <?php else : ?>
                    <div class="alert__message error"><?= "No users found" ?></div>
                <?php endif ?>
            </main>
        </div>
    </section>


<?php
include '../partials/footer.php';
?>