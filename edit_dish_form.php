<?php
require('database.php');

$dishID = filter_input(INPUT_POST, 'dishID', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM dishes
          WHERE dishID = :dishID';
$statement = $db->prepare($query);
$statement->bindValue(':dishID', $dishID);
$statement->execute();
$dishes = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_dish.php" method="post" enctype="multipart/form-data"
              id="add_dish_form">
            <input type="hidden" name="original_image" value="<?php echo $dishes['image']; ?>" />
            <input type="hidden" name="dishID"
                   value="<?php echo $dishes['dishID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $dishes['categoryID']; ?>">
            <br>

            <label>Name:</label>
            <input type="input" name="name"
                   value="<?php echo $dishes['name']; ?>">
            <br>

            <label>Description:</label>
            <input type="input" name="description"
                   value="<?php echo $dishes['description']; ?>">
            <br>

            <label>List Price:</label>
            <input type="input" name="price"
                   value="<?php echo $dishes['price']; ?>">
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($dishes['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $dishes['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>