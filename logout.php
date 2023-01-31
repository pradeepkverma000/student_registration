<?php
session_start();

unset($_SESSION['LOGIN']);
{
    ?>
		<script type="text/javascript">
			alert("Logged Out Successfully");
            window.open("http://localhost/student_registration/login.php","_self");
		</script>
	<?php
}


?>