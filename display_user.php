<?php

// /**
//  * Start the session.
//  */
// session_start();

// /**
//  * Check if the user is logged in.
//  */
// if(!isset($_SESSION['admin']) || !isset($_SESSION['logged_in'])){
//     //User not logged in. Redirect them back to the login.php page.
//     header('Location: login.php');
//     exit;
// }


// /**
//  * Print out something that only logged in users can see.
//  */

// echo 'Congratulations! You are logged in!';

require_once('database.php');

    // Get all users
    $query = 'SELECT * FROM users
              ORDER BY username';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
    <h1 id="users">User List</h1>
    <table id="usertable">
        <tr>
            <th>Users</th>
        </tr>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['username']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>