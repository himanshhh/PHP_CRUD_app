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
        <th>&nbsp;</th>
            <th>Name</th>
            <th>User</th>
        </tr>
        <?php foreach ($feedbacks as $feedback) : ?>
        <tr>

        <td><?php echo $feedback['feedbackID']; ?></td>
            <td><?php echo $feedback['comment']; ?></td>
            <td><?php echo $feedback['username']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <?php
include('includes/footer.php');
?>