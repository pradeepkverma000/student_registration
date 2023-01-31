<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>View Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h3>All Data
                    <a href="index.php" class="btn btn-primary">Add New Student</a>
                    <a href="index.php" class="btn btn-danger">Back</a>
                    <a href="logout.php" class="btn btn-danger float-start">Logout</a>
                </h3>
    <table class="table table-bordered-sm table-striped">
        <tr>
            <th>Id</th>
            <th>Student Name</th>
            <th>Mobile</th>
            <th>E-Mail</th>
            <th>Gender</th>
            <th>Branch</th>
            <th>College Name</th>
            <th>Country</th>
            <th>Action</th>
        </tr>

        <?php
        session_start();
        if(!isset($_SESSION['LOGIN']))
        {
            header('Location: login.php');
        }
        include_once('config.php');

        $select="SELECT * FROM registration_tab";
        $result=mysqli_query($conn,$select);
        if($result)
        {
            while($row=mysqli_fetch_assoc($result))
            {?>

                <tr>

                <td><?php echo $id=$row['id']; ?></td>
                <td><?php echo $studentname=$row['studentname'];?></td>
                <td><?php echo $mobile=$row['mobile'];?></td>
                <td><?php echo $email=$row['email'];?></td>
                <td><?php echo $gender=$row['gender'];?></td>
                <td><?php echo $branch=$row['branch'];?></td>
                <td><?php echo $collegename=$row['collegename'];?></td>
                <td><?php echo $country=$row['country'];?></td>
                <td>
                
                <a href="update.php?id=<?php echo $id=$row['id']; ?>" class="btn btn-success">Update</a>
                <a href="delete.php?id=<?php echo $id=$row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>

                </tr>
                <?php
            
            }
        }

        ?>

    </table>
               </div>
          </div>
        </div>
       </div>
    </div>
    
</body>
</html>