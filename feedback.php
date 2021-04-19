<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */

echo "<p style='color:green;'>".'You are logged in!'."</p>";

    require_once('database.php');

    // Get all feedbacks
    $query = 'SELECT * FROM feedback
              ORDER BY feedbackID';
    $statement = $db->prepare($query);
    $statement->execute();
    $feedbacks = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
    <h1>Feedback List</h1>
    <table>
        <tr>
            <th>Comment</th>
            <th>User</th>
        </tr>
        <?php foreach ($feedbacks as $feedback) : ?>
        <tr>

            <td><?php echo $feedback['comment']; ?></td>
            <td><?php echo $feedback['username']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <br>

    <h2>Give us your Feedback!</h2>
    <form action="add_feedback.php" method="post"
          id="add_feedback_form">

        <label id="comment">Comment:</label>
        <input id="comment" type="input" name="comment">
        <br>

        <label >Name:</label>
        <input id="userr" type="input" name="name">
        <input id="add_feedback_button" type="submit" value="Add">
    </form>

    <a id="display_user" href="display_user.php">Display registered users</a>

    <?php
include('includes/footer.php');
?>