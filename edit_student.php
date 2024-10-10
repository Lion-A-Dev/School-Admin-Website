<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Styles/index.css">
    <link rel="stylesheet" href="Styles/edit_student.css"></link>
    

</head>

<body>
    <!--Side bar-->
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


    <main class="">
        <div class="student_div">
            <h2>Edit Student Information</h2>
            <form class="student_form" method="post" actio="edit_student.php">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])){
                        $student_id = $_POST['id'];
                        $serverName = "localhost";
                        $username = "root";
                        $password = "Passw0rd";
                        $database = "db_fproject";
                        
                        global $name;
                        global $lname;
                        global $Add;
                        global $ville;
                        global $pays;
                        global $telephone;
                        global $majeur;

                        //Create connetion
                                $con = new mysqli($serverName, $username, $password, $database);

                                if ($con->connect_error) {
                                    die("Connection Failed: " . $con->connect_error);
                                }

                                //read all rows from database table
                                $sql = " select Name, LastName, Address, City, Country, Phone, Major
                                         from student
                                         where student.Id  = '$student_id'";
                                $resultSet = $con->query($sql);
                                
                                if (!$resultSet) {
                                    die("Invalid query: " . $con->error);
                                }
                                
                                 while($row=$resultSet->fetch_assoc()){
                                     $name= $row["Name"];
                                     $lname = $row["LastName"];
                                     $Add = $row["Address"];
                                     $ville = $row["City"];
                                     $pays = $row["Country"];
                                     $telephone = $row["Phone"];
                                     $majeur = $row["Major"];
                                }
          
                    }

                ?>

                
                <div class="persInfo">
                    
                    <div>
                        <label>First Name</label>
                        <input name="FirstName" type="text" value="<?php echo $name;?>" required="true" />
                    </div>
                    
                    <div>
                        <label>Last Name</label>
                        <input name="LastName" type="text" value="<?php echo $lname;?>" required="true" />
                    </div>
                    
                    
                    <div>
                        <label>Address</label>
                        <input name="Address" type="text" value="<?php echo $Add;?>" required="true" />
                    </div>
                    
                    <div>
                        <label>City</label>
                        <input name="City" type="text" value="<?php echo $ville;?>" required="true" />
                    </div>
                    
                    
                    <div>
                        <label>Country</label>
                        <input name="Country" type="text" value="<?php echo $pays;?>" required="true"/>
                    </div>
                    
                    
                    <div>
                        <label>Phone</label>
                        <input name="Phone" type="text" value="<?php echo $telephone;?>" required="true" />
                    </div>

                    
                    <div>
                        <label>Major</label>
                        <input name="Major" type="text" value="<?php echo $majeur;?>" required="true" />
                    </div>


                    
                </div>
                
                
                
                <div class="coursesInfo">
                    <table style="width:100%">
                        <thead style="width:100%">
                            <tr>
                                <th>Course ID</th>
                                <th>Name</th>
                                <th>Credits</th>
                                <th>Grades</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])){
                                $student_id = $_POST['id'];
                                $serverName = "localhost";
                                $username = "root";
                                $password = "Passw0rd";
                                $database = "db_fproject";
                                
                            
                                //Create connetion
                                $con = new mysqli($serverName, $username, $password, $database);

                                if ($con->connect_error) {
                                    die("Connection Failed: " . $con->connect_error);
                                }

                                //read all rows from database table
                                $sql = "SELECT c.ID AS CourseID, c.Name AS CourseName, c.Credits, g.Grade
                                        FROM Courses c
                                        INNER JOIN Grades g ON c.ID = g.CourseID
                                        INNER JOIN Student s ON g.StudentID = s.Id
                                        WHERE s.Id = '$student_id'";
                                $resultSet = $con->query($sql);
                                
                                if (!$resultSet) {
                                    die("Invalid query: " . $con->error);
                                }
                                
                                while($row = $resultSet->fetch_assoc()){
                                    echo "<tr style='height:55px'>
                                    <td>" . $row["CourseID"] ."</td>
                                    <td>" . $row["CourseName"] ."</td>
                                    <td>" . $row["Credits"] . "</td>
                                    <td>" . $row["Grade"] ."</td>

                                    </tr>";
                                
                                    
                                }
                                $con->close();
                            }    
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <button id="edit" type="submit"> Edit </button>
                <button id="delete" type="submit">Delete Student</button>
            </form>
        </div>
    </main>
    
</body>

</html>