<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    } else {
        try {
            // Correct the connection string by removing extra space
            $con = mysqli_connect('localhost', 'root', 'Passw0rd', 'db_fproject');
            
            // Check if the connection failed
            if (!$con) {
                throw new Exception("Database connection failed: " . mysqli_connect_error());
            }

            // Corrected SQL query without the "TABLE" keyword
            $sql = "INSERT INTO STUDENT (Name, LastName, Address, City, Country, Phone, Major)VALUES ('$name', '$lname', '$Address', '$City', '$Country', '$Phone', '$Major')";

            // Run the query and check if it's successful
            if (mysqli_query($con, $sql)) {
                mysqli_commit($con);
                echo "<script>alert('Student added successfully.');</script>";
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="Styles/create.css"/>
    <link rel="stylesheet" href="Styles/index.css"/>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    
    <input type="checkbox" id="check">

    <label for="check">
        <span class="material-icons" id="menu">menu</span>
        <span class="material-icons" id="close">close</span>
    </label>
    
    <div class="sidebar">
        <header><a href="index.php">Main Menu</a></header>

        <ul>
            <li>
                <a href="#" id="students-link">
                    <span class="material-icons">school</span>
                    Students
                </a>

                <ul id="students-submenu" class="submenu">
                    <li>
                        <a href="add_student.php">
                            <span class="material-icons">person_add</span>
                            Add Student
                        </a>
                    </li>



                    <li>
                        <a href="viewAllStudents.php">
                            <span class="material-icons">list</span>
                            View All Students
                        </a>
                    </li>


                </ul>
            </li>
        </ul>


        <ul>
            <li>
                <a href="#">
                    <span class="material-icons">work</span>
                    Courses
                </a>

                <ul id="students-submenu" class="submenu">
                    <li>
                        <a href="#">
                            <span class="material-icons">add</span>
                            Add Course
                        </a>
                    </li>


                    <li>
                        <a href="#">
                            <span class="material-icons">list</span>
                            View All Courses
                        </a>
                    </li>


                </ul>
            </li>
        </ul>


        <ul>
            <li>
                <a href="#">
                    <span class="material-icons">bar_chart</span>
                    Grades
                </a>

                <ul id="students-submenu" class="submenu">
                    <li>
                        <a href="#">
                            <span class="material-icons">add</span>
                            Add Grade
                        </a>
                    </li>



                    <li>
                        <a href="#">
                            <span class="material-icons">list</span>
                            View All Grades
                        </a>
                    </li>


                </ul>

            </li>
        </ul>
    </div>
    
    
    
    <div class="container">
        <div class="form-container">
             <h2>Student Details</h2>
            <form method="POST" action="">
               
                <div class="list-box"><!-- comment -->
                    
                    <div>
                        <label>First Name</label>
                        <input name="FirstName" type="text" required/>
                    </div>
                    
                    <div>
                        <label>Last Name</label>
                        <input name="LastName" type="text" required/>
                    </div>
                    
                    
                    <div>
                        <label>Address</label>
                        <input name="Address" type="text" required/>
                    </div>
                    
                    <div>
                        <label>City</label>
                        <input name="City" type="text" required/>
                    </div>
                    
                    
                    <div>
                        <label>Country</label>
                        <input name="Country" type="text" required/>
                    </div>
                    
                    
                    <div>
                        <label>Phone</label>
                        <input name="Phone" type="text" required/>
                    </div>

                    
                    <div>
                        <label>Major</label>
                        <input name="Major" type="text" required/>
                    </div>

                    <div class="button-div">
                        <button id="add" type="submit"> Add </button>
                        <button id="cancel" onclick="cancel()"> Cancel </button>
                    </div>

                </div>

            </form>
        </div>
    </div>
    
</body>
</html>
