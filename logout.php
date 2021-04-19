<?php

SESSION_START();

session_destroy();

header('Location: login.php');

echo "<p style='color:red;'>".'You are logged out!'."</p>";


?>



