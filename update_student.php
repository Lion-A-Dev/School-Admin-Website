<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['id'];
    $name = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $Phone = $_POST['Phone'];
    $Country = $_POST['Country'];
    $Major = $_POST['Major'];
    
    // Server-side validation for required fields
    if (empty($name) || empty($lname) || empty($Address) || empty($Country) || empty($City) || empty($Phone) || empty($Major)) {
        echo "<script>alert('Warning! All fields must be filled to add a student.');</script>";                
    }else {
        try {
            // Correct the connection string by removing extra space
            $con = mysqli_connect('localhost', 'root', 'Passw0rd', 'db_fproject');
            echo 'con successful';
            // Check if the connection failed
            if (!$con) {
                throw new Exception("Database connection failed: " . mysqli_connect_error());
            }
        
           $sql = "UPDATE student "
            . "SET Name = '$name', LastName = '$lname', Address = '$Address', City = '$City', Country = '$Country', Phone = '$Phone', Major = '$Major' "
            . "WHERE student.Id = $student_id";
           echo 'sql query was registered';
  
            
            // Run the query and check if it's successful
            if (mysqli_query($con, $sql)) {
                mysqli_commit($con);
                echo "<script>alert('Student edited successfully.');</script>";
            } else {
                throw new Exception("Error inserting student: " . mysqli_error($con));
            }
            } 
        catch (Exception $ex) {
            mysqli_rollback($con);
            echo "<script>alert('Attention! System was not able to add the student! " . $ex->getMessage() . "');</script>";
        }
        finally {
            mysqli_close($con); // Close the connection in all cases
        }
    }
}