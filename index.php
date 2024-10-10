<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Styles/index.css">

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
                        <a href="edit_student.php">
                            <span class="material-icons">edit</span>
                            Edit Student
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
                            <span class="material-icons">edit</span>
                            Edit Course
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
                            <span class="material-icons">edit</span>
                            Edit Grade
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

        <section class="welcome">
            <p class="date"> Date: </p>
            <p class="welBack"> Welcome back.</p>
            <div class="school-icon">
                <img src="images/school-icon.png">
            </div>
        </section>

        <section class="analytics">
            <p class="analyticsTag"> Analytics </p>

            <div class="block"></div>

            <div class="block"></div>

            <div class="block"></div>

            <div class="block"></div>
        </section>

    </div>
</body>

</html>
