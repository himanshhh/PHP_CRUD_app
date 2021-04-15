<?php

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

        <label>Comment:</label>
        <input type="input" name="comment">
        <br>

        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_feedback_button" type="submit" value="Add">
    </form>

    <?php
include('includes/footer.php');
?>