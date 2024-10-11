<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['id'];

    

    try {
        // Correct the connection string by removing extra space
        $con = mysqli_connect('localhost', 'root', 'Passw0rd', 'db_fproject');
        echo 'con successful';
        // Check if the connection failed
        if (!$con) {
            throw new Exception("Database connection failed: " . mysqli_connect_error());
        }

       $sql = "delete from student s WHERE s.Id = $student_id";
      


        // Run the query and check if it's successful
        if (mysqli_query($con, $sql)) {
            mysqli_commit($con);
            echo "<script>alert('Student deleted successfully.');</script>";
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