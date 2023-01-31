<?php
session_start();
include_once('config.php');
if(!isset($_SESSION['LOGIN']))
{
    header('Location: login.php');
    die();
}

$id=$_GET['id'];

if(isset($_POST['submit']))
{
    $studentname = mysqli_real_escape_string($conn, $_POST['studentname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $collegename = mysqli_real_escape_string($conn, $_POST['collegename']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $update="UPDATE registration_tab SET studentname='$studentname',mobile='$mobile',email='$email',gender='$gender',branch='$branch',collegename='$collegename',country='$country' WHERE id='$id'";
    $result=mysqli_query($conn,$update);
    if($result)
    {
        ?>
		<script type="text/javascript">
			alert("Data Updated Successfully");
            window.open("http://localhost/student_registration/display.php","_self");
		</script>
		<?php  
    }

}

$select="SELECT * FROM registration_tab WHERE id='$id'";
$query=mysqli_query($conn, $select);
$row=mysqli_fetch_assoc($query);

$studentname=$row['studentname'];
$mobile=$row['mobile'];
$email=$row['email'];
$gender=$row['gender'];
$branch=$row['branch'];
$collegename=$row['collegename'];
$country=$row['country'];

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">

    <title>Update Student Data</title>
    
  </head>
  <body>
    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Update Student
                        <a href="display.php" class="btn btn-danger">Back</a>
                        <a href="logout.php" class="btn btn-danger float-start">Log out</a>
                    </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label>Student Name:</label>
                                <input type="text" name="studentname" value="<?php echo $studentname=$row['studentname'];?>" placeholder="Enter Student Name" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>Mobile:</label>
                                <input type="text" name="mobile" value="<?php echo $mobile=$row['mobile'];?>" placeholder="Enter Mobile Number" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>E-Mail:</label>
                                <input type="text" name="email" value="<?php echo $email=$row['email'];?>" placeholder="Enter Email Id" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>Gender:</label>
                                <select name="gender" value="<?php echo $row['gender'];?>">
                                    <option>Select Gender</option>
                                    <option value="Male"

                                    <?php if($gender == 'Male')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    
                                    >Male</option>
                                    <option value="Female"
                                    <?php if($gender == 'Female')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Female</option>
                                </select>          
                            </div>
                            <div class="mb-3">
                                <label>Branch:</label>
                                <select name="branch" value="<?php echo $row['branch'];?>" required>
                                    <option>Select Branch</option>
                                    <option value="Information Technology" 
                                    
                                    <?php if($branch == 'Information Technology')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Information Technology</option>

                                    <option value="Computer Science"
                                    <?php if($branch == 'Computer Science')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Computer Science</option>

                                    <option value="Electronics & Communication"
                                    <?php if($branch == 'Electronics & Communication')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Electronics & Communication</option>

                                    <option value="Rocket Science"
                                    <?php if($branch == 'Rocket Science')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Rocket Science</option>

                                    <option value="Space Science"
                                    <?php if($branch == 'Space Science')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Space Science</option>
                                </select>          
                            </div>
                            <div class="mb-3">
                                <label>College Name:</label>
                                <input type="text" name="collegename" value="<?php echo $collegename=$row['collegename'];?>" placeholder="Enter College Name" class="form-control" required>                            
                            </div>
                            <div class="mb-3">
                                <label>Country:</label>
                                <select name="country" value="<?php echo $row['country'];?>" required>
                                    <option>Select Country</option>
                                    <option value="India"
                                    <?php if($country == 'India')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >India</option>

                                    <option value="USA"
                                    <?php if($country == 'USA')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >USA</option>

                                    <option value="Russia"
                                    <?php if($country == 'Russia')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Russia</option>

                                    <option value="Israel"
                                    <?php if($country == 'Israel')
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >Israel</option>
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
