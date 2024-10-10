<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Styles/index.css">
    <link rel="stylesheet" href="Styles/edit.css"></link>
    <link rel="stylesheet" href="Styles/viewAllStudents.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                        <a href="#">
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

    
    
    <div class="main">
        <div class="div-table">
            <form >
            <table class="w3-table w3-striped w3-bordered">
                <thead>
                    <tr style="background-color: #13786E; color:white;">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Major</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
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
                    $sql = "SELECT * FROM student";
                    $resultSet = $con->query($sql);
                    
                    if (!$resultSet) {
                        die("Invalid query: " . $con->error);
                    }
                    
                    while($row = $resultSet->fetch_assoc())
                    {
                        echo "<tr style='height:55px'>
                        <td>" . $row["Id"] ."</td>
                        <td>" . $row["Name"] ."</td>
                        <td>" . $row["LastName"] ."</td>
                        <td>" . $row["Address"] ."</td>
                        <td>" . $row["City"] ."</td>
                        <td>" . $row["Country"] ."</td>
                        <td>" . $row["Phone"] ."</td>
                        <td>" . $row["Major"] ."</td>
                        <td style='width:75px'>
                            <form class=linkDiv action='edit_student.php' method='post'>
                                <input type='hidden' name='id' value='" . $row["Id"] ."'/>
                                <button type=submit class=btnEdit>Edit</button>
                            </form>
                        </td>
                    </tr>";
                    }
                    ?>
                    
                    
                    

                </tbody>
                   
        </table>
            </form>
        </div>
    </div>
    
</body>

</html>