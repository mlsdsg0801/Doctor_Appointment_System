<?php
include('admin_index.php');
include('../database/connection.php');


// ADD DOCTOR
session_start();
if($_POST)
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name= validate($_POST['doctor_name']);
    $email= validate($_POST['doctor_email']);
    $Description= validate($_POST['description']);
    $Contact= validate($_POST['contact']);
    $address= validate($_POST['clinic_address']);
    $password= validate($_POST['doctor_password']);
    $specialty = validate($_POST['specialty']);

    $sql1= "INSERT INTO `doctor`(`doctor_name`, `doctor_email`, `doctor_password`, `description`, `contact`, `clinic_address`, `specialty`)
     VALUES ('$name','$email','$password','$Description','$Contact','$address','$specialty')";
    $sql2= "INSERT INTO `website_user`(`Email`, `usertype`) 
    VALUES ('$email','d')";

    $result = mysqli_query($conn,$sql1);
    $result = mysqli_query($conn,$sql2);

    if ($result) {
        // header("Location: admin_doctor.php?msg=Doctor added successfully");
        echo "<script> alert('Added Successfully!'); location.replace('admin_doctor.php') </script>";
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_side_css/admin_doctor.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Doctors</title>
</head>
<body>
        <!-- <center>
    <p class = "sub_headings">Add New Doctor</p>
        </center> -->

    <div class="title">
        <h1 class="maintitle">Add New Doctor</h1>
            <center>
                <div class="button">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add New <i class="fas fa-user-plus"></i></button></div>
            </center>
        <h2 class="subtitle">Include the physician's details with the best Doctor's Appointment System.</h2>
        
    </div>
    <center>
    <div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Doctor</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class = "">
    <form style = "font-family: monospace;" method="post" >
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label">Name:</label>
                <div class = "col-sm-6">
                    <input type="text" class = "form-control" name="doctor_name" value=""required>
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label">Email:</label>
                <div class = "col-sm-6">
                    <input type="email" class = "form-control" name="doctor_email" value=""required>
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label">Description:</label>
                <div class = "col-sm-6">
                    <input type="text" class = "form-control" name="description" value=""required>
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label">Contact:</label>
                <div class = "col-sm-6">
                    <input type="text" class = "form-control" name="contact" value=""required>
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label">Specialty:</label>
                <div class = "col-sm-6">
                <select name="specialty" id="" class = "form-control">
                    <option>Select Specialty</option>
                <?php
                        $sql_list = "SELECT * FROM `Doctor_Specialty` ORDER BY `Specialty_Title` asc;";
                        $result = mysqli_query($conn,$sql_list);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    
                                    <option> <?php echo $row['Specialty_Title']?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label">Clinic Address:</label>
                <div class = "col-sm-6">
                    <input type="text" class = "form-control" name="clinic_address" value=""required>
                </div>
            </div>
            <div class = "row mb-3">
                <label class = "col-sm-3 col-form-label">Password:</label>
                <div class = "col-sm-6">
                    <input type="password" class = "form-control" name="doctor_password"  value=""required>
                </div>
            </div>

      </div>

      <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type = "submit" class = "btn btn-outline-primary">Done</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-primary" href="admin_doctor.php" role = "button">Cancel</a>
                </div>
            </div>
        </form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

        </div>

    </center>
<center>
        <center>
    <table  width = "75%" class="sub-table">
    <thead>
        <tr>
            <th class = "header">Doctor Name</th>
            <th class = "header">Email</th>
            <th class = "header">Specialty</th>
            <th class = "header">Contact</th>
            <th class = "header">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php

            $sql = 'SELECT * FROM `doctor`';
            $result = mysqli_query($conn,$sql);

            while ($row = mysqli_fetch_assoc($result)) 
            {
                 echo '<tr class = "list_doctor">';
                 echo '<td>'. $row['doctor_name'].'</td>';
                 echo '<td>'. $row['doctor_email'].'</td>';
                 echo '<td>'. $row['specialty'].'</td>';
                 echo '<td>'. $row['contact'].'</td>';
                 echo '<td>';
                 echo ' <a  type="button" class="btn btn-success btn-sm" href="edit_doctor.php?action=edit & id='.$row['doctor_id'].'">EDIT</a> ';
                 echo ' <a  type="button" class="btn btn-danger btn-sm" href="delete_doctor.php?type=doctor&delete & id=' . $row['doctor_id'].'">DELETE</a>';
                 echo '</td>';
                 echo '</tr> ';
            }
        ?>
                            
    </tbody>
    </table>
        </center>
</center>
</body>
</html>