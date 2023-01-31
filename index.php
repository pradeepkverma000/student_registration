<?php
session_start();
include_once('config.php');
if(!isset($_SESSION['LOGIN']))
{
    header('Location: login.php');
    die();
}


if(isset($_POST['submit']))
{
    $studentname = mysqli_real_escape_string($conn, $_POST['studentname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $collegename = mysqli_real_escape_string($conn, $_POST['collegename']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    if($studentname !="" && $mobile !="" && $email !="" && $gender !="" && $branch !="" && $collegename !="" && $country !="")
    {

    $query="INSERT INTO registration_tab(studentname,mobile,email,gender,branch, collegename,country) 
    VALUES('$studentname','$mobile','$email','$gender','$branch','$collegename','$country')";

    $result=mysqli_query($conn,$query);
    if($result)
	{
        ?>
		<script type="text/javascript">
			alert("Data Submited Successfully");
            window.open("http://localhost/student_registration/display.php","_self");
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Try Again Later");
		</script>
		<?php
	}
    }
    else
    {
        echo "<script>alert('Please! Enter Required Field')</script>";
    }

}

?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">

    <title>Student Registraton</title>
    
  </head>
  <body>
    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    <h4>Register New Student
                        <a href="display.php" class="btn btn-danger">Back</a>
                        <a href="logout.php" class="btn btn-danger float-start">Log out</a>
                    </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label>Student Name:</label>
                                <input type="text" name="studentname" placeholder="Enter Student Name" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>Mobile:</label>
                                <input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>E-Mail:</label>
                                <input type="email" name="email" placeholder="Enter Email Id" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>Gender:</label>
                                <select name="gender">
                                    <option required>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>          
                            </div>
                            <div class="mb-3">
                                <label>Branch:</label>
                                <select name="branch" required>
                                    <option>Select Branch</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Electronics & Communication">Electronics & Communication</option>
                                    <option value="Rocket Science">Rocket Science</option>
                                    <option value="Space Science">Space Science</option>
                                </select>          
                            </div>
                            <div class="mb-3">
                                <label>College Name:</label>
                                <input type="text" name="collegename" placeholder="Enter College Name" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>Country:</label>
                                <select name="country" required>
                                    <option>Select Country</option>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Israel">Israel</option>
                                </select>          
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

  </body>
</html>


