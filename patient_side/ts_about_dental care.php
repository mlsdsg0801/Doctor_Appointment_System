<?php 
include('header_nav.php');
include('../database/connection.php');
 ?> <!-- TO CALL TOP NAVIGATIONS -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/patient_side_css/ts_about_dental care.css">
    <title>Doctor Appointment System</title>
</head>
<body style="cursor: default;">
<div class="about">
    <h1>Top Specialties | About Dental Care</h1>
</div>
<div>
    <h1 class = "headertitle">Dental Care</h1>
    <h1 class = "aboutdef">DEFINITION</h1>
    <h2 class = "def1">An expert in medicine who focuses on dentistry is a dentist, commonly referred to as a dental surgeon 
        (the diagnosis, prevention, management, and treatment of diseases and conditions of the oral cavity and other aspects of the 
        craniofacial complex including the temporomandibular joint).</h2>
    <h2 class = "def2">Dental hygiene, the practice of keeping the mouth and teeth clean to prevent dental problems, is a subset of 
        dental care, which is the maintenance of healthy teeth. Dental care is provided by a dentist, who also performs dental surgery 
        and maintains a professional oral hygiene regimen.</h2>
</div>
<div class="titlelist" style="text-align:center;"><h1>DOCTORS LIST</h1></div>
        <?php
        $sql = "SELECT * FROM doctor WHERE specialty = 'Dental Care';";
        $result = mysqli_query($conn,$sql);

        while ($row = mysqli_fetch_assoc($result))
        {
            $d_id = $row['doctor_id'];
            $name = $row['doctor_name'];
            $des = $row['description'];
            $con = $row['contact'];
            $addr = $row['clinic_address'];
            $spe = $row['specialty'];
        
        ?>
            <div class="doctor-container">
                <div class="doctor-info">
                    <img src="../images/doc img.png" alt="Doctor Profile Picture">
                    <h2><?php echo $name ?></h2><br>
                    <h3><?php echo $spe ?></h3><br>
                    <h4><?php echo $des ?></h4><br>
                    <center>
                    <h5>Clinic Location & Schedule:</h5><br>
                    <h6><?php echo $addr ?></h6><br>
                    <p>Monday-Thursday 08:00 A.M. to 05:00 P.M. | Friday 10:00 A.M. to 05:00 P.M</p>
                    </center>
                    <div class ="btns">
                        <a class="buttonvm" href="#doc<?php echo $d_id?>">View More</a>
                        <a class="buttonvm" style="background-color:#0d9994; color:white;" href="#book-doc#<?php echo $d_id?>">Book Now!</a>
                    </div>
                </div>
            </div>

            <div id="doc<?php echo $d_id?>" class="overlay">
                <div class="popup">
                    <center>
                        <h1><?php echo $name ?></h1>
                        <h2><?php echo $spe ?></h2>
                        <a class="close" href="#">&times;</a>
                    </center>
                        <center>
                            <div class="content">
                                <h3>Professional Experience:</h3>
                                    <h4><?php echo $des ?></h4>
                                <h3>Clinic Location:</h3>
                                    <h4><?php echo $addr ?></h4> 
                                <h3>Availability:</h3>
                                    <h4>Monday - Thursday 08:00 A.M. to 05:00 P.M. | Friday 10:00 A.M. to 07:00 P.M</h4>
                                <h3>Contact Number:</h3>
                                    <h4><?php echo $con ?></h4>
                            </div>
                        </center>
                </div>
            </div>

                <!-- book now popup -->
            <div id="book-doc#<?php echo $d_id?>" class="overlay">
                <div class="popup">
                    <center>
                        <h1>APPOINTMENT FORM</h1>
                        <h2>Fill up all the field to proceed from booking</h2>
                        <a class="close" href="#">&times;</a>
                    </center>

                    <center>
                                <div class="content">
                                    <form action="booking.php" method = "POST">
                                        <h2>APPOINTMENT INFORMATION:</h2>
                                        <h3>Selected Doctor:<p><?php echo $name?></p></h3>
                                                <input type="hidden" name="doc_id" value = "<?php echo $d_id?>">
                                         <h3>Full Name:</h3>
                                                <input type="text" name="patient_name"  value = "" required><br>
                                         <h3>Age:</h3>
                                                <input type="text" name="patient_age" value = "" required><br>
                                         <h3>Gender:</h3>
                                                <select name="patient_gender">
                                                    <option>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                          <h3>Date of Birth:</h3>
                                                <input type="date" name="patient_dob" value = "" required><br>
                                          <h3>Home Address:</h3>
                                                <input type="text" name="patient_address" value = "" required><br>
                                          <h3>Email Address:</h3>
                                                    <input type="email" name="patient_email" value = "" required><br>
                                          <h3>Contact Number:</h3>
                                                    <input type="tel" name="patient_contact" value = "" required><br>
                                          <h3>Appointment Date:</h3>
                                                    <input type="date" name="appointment-date" min="2023-04-24" max="2029-12-31" required><br>
                                                <div>
                                                    <input type="submit" name = "appointment" value="Submit">
                                                </div>
                                    </form>
                                 </div>
                    </center>
                </div>
            </div>

            <?php  
        }
            ?>
</body>
</html>