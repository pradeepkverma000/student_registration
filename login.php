<!-- 
Student Registration Page

Username: pradeep
Password: pradeep123
 -->

 
<?php
session_start();
include_once('config.php');

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $select="SELECT * FROM admin WHERE username='$username' and binary password='$password'";
    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['LOGIN']='yes';
        header('Location: display.php');
    }
    else
    {
        ?>
		<script type="text/javascript">
			alert("Please! Enter Valid Details");
            window.open("http://localhost/student_registration/login.php","_self");
		</script>
		<?php
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">
    <title>Log in</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Log In</h3>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-3">
                                    <lebel>Username:</label>
                                    <input type="text" name="username" placeholder="Enter Username" required>
                                </div>

                                <div class="mb-3">
                                    <lebel>Password:</label>
                                    <input type="text" name="password" placeholder="Enter Password" required>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" name="submit">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>