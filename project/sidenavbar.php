<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css"/>
    </head>

    <body>
        <div class="sidenav">
            <a href="#"><i class ="fa fa-user"> Add Students into DB </i></a>
            </br>
            <a href="lect_EnrollStudents.php"> <i class ="fa fa-user"> Enroll Students into Module</i></a>
            </br>
            <a href="lect_Modules.php"><i class ="fa fa-user"> View Modules [use this]</i></a>
            </br>
            <ul>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        [DEPRECATED]Module</i></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Assessments</a>
                        </li>
                        <li>
                            <a href="#">Grades</a>
                        </li>
                        <li>
                            <a href="#">Summative Feedback</a>
                        </li>
                        <li>
                            <a href="#">Formative Feedback</a>
                        </li>
                        <li>
                            <a href="#">Weightage</a>
                        </li>

                    </ul>

                </li>
                </br>
                <li>
                    <a href="#"> Preset Feedback</a>
                </li>
            </ul>
        </div>
    </body>
</html>
