<footer>
<p>&copy; <?php echo date("Y"); ?> DESI RESTAURANT</p>
</footer>
</div><!-- close div container -->

<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("phone","req","Please provide your phone number");  
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
frmvalidator.addValidation("phone","phone","Please enter a valid phone number");
</script>

</body>
</html>