<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['admin']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */

echo "<p style='color:green;'>".'You are logged in!'."</p>";

    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">

        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_category_button" type="submit" value="Add">
    </form>

    <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>