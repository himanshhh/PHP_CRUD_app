<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC&display=swap" rel="stylesheet">

<script src="validation.js"></script>

<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>

<h1>Contact us</h1>
<form method="POST" name="contactform" action="contact-form-handler.php"> 
<p>
<label for='name'>Your Name:</label> <br>
<input type="text" name="name">
</p>
<p>
<label for='email'>Email Address:</label> <br>
<input type="text" name="email"> <br>
</p>
<p>
<label for='phone'>Phone Number:</label> <br>
<input type="text" name="phone"> <br>
</p>
<p>
<label for='message'>Message:</label> <br>
<textarea name="message"></textarea>
</p>
<input type="submit" value="Submit"><br>
</form>
<?php
include('includes/footer.php');
?>