<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/subjects.css" rel="stylesheet" type="text/css">
        <script src="js/managemarks.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrapper"> 
            <div id="header">
                <div class="banner_img">
                </div>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="managesubjects.php" style="font-weight: bold;">SUBJECTS</a></li>
                    <li><a href="managesublect.php" style="font-weight: bold;">SUB-LECT</a></li>
                    <li><a href="managemarks.php" style="font-weight: bold;"> MARKS</a></li>
                    <li><a href="viewprogress.php" style="font-weight: bold;">SUB PROGRESS</a></li>
                    <li><a href="semprogress.php" style="font-weight: bold;">SEM PROGRESS</a></li>
                    <li><a href="index.php" style="font-weight: bold;">LOGOUT</a></li>
                </ul>
            </div>
            <div class="right_side_bar"> 
            </div>    
            <div id="page_content">
                <?php
                include './db.php';
                session_start();
                $staffid = $_SESSION['staffid'];
                ?>
                <form action=""  onsubmit="return validate();" method="">
                    <table style="margin: auto; margin-top: 30px;" cellspacing="20;" >
                        <thead>
                            <tr>
                                <td colspan="2"
                                    style="font-weight: bold; font-size: 30px; color: red; font-family: monospace">MANAGE
                                    MARKS</td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="font-weight: bold; font-size: 20px; color: blue; font-family: monospace">SEMESTER</td>
                            <td><select id="sem" name="sem"
                                        style="height: 25px; font-weight: bold; width: 100px;"
                                        onchange="semchange();">
                                    <option value="">----- select -----</option>
                                    <?php
                                    $selected_sem = 0;
                                    if (isset($_REQUEST['sem'])) {
                                        $selected_sem = $_REQUEST['sem'];
                                    }
                                    for ($i = 1; $i <= 6; $i++) {
                                        if ($selected_sem == $i) {
                                            ?>
                                            <option value="<?php echo $i ?>" selected="selected"><?php echo $i ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <?php
                        $sem = 0;
                        $subject = "";
                        $subjectlecid = 0;
                        if (isset($_REQUEST['sem'])) {
                            $sem = $_REQUEST["sem"];
                            $query = "SELECT * FROM subjectlecture INNER JOIN staffs ON subjectlecture.staffid = staffs.staffid INNER JOIN SUBJECT ON subjectlecture.subjectid = subject.subjectid WHERE subjectlecture.staffid = $staffid and subject.semester = $sem";
                            //echo $query;
                            $subject = "select";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $subject = $row['subjectname'];
                                    $subjectlecid = $row['subjectlectureid'];
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td style="font-weight: bold; font-size: 20px; color: blue; font-family: monospace">SUBJECT</td>
                            <td><select id="subject" name="subject" style="height: 25px; font-weight: bold; width: 150px;">
                                    <option value="<?php echo $subjectlecid ?>"><?php echo $subject ?></option>
                                </select></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold; font-size: 20px; color: blue; font-family: monospace">IA
                                TYPE</td>
                            <td><select id="iatype" name="iatype"
                                        style="height: 25px; font-weight: bold; width: 100px;" onchange="iachange();">
                                    <option value="">----- select------</option>
                                    <?php
                                    $selectedIA = 0;
                                    if (isset($_REQUEST['iatype'])) {
                                        $selectedIA = $_REQUEST['iatype'];
                                    }
                                    for ($i = 1; $i <= 3; $i++) {
                                        if ($selectedIA == $i) {
                                            ?>
                                            <option value="<?php echo $i ?>" selected="selected"><?php echo $i ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <?php
                        $submit = "SAVE";
                        if (isset($_REQUEST['iatype'])) {
                            ?>
                            <tr>
                                <td style="font-weight: bold; font-size: 15px; color: red;">STUDENT
                                    NAME</td>
                                <td style="font-weight: bold; font-size: 15px; color: red">MARKS
                                </td>
                            </tr>
                            <?php
                            $query = "SELECT * FROM student INNER JOIN marks ON student.regno = marks.regno WHERE  student.sem = '$sem' AND marks.iatype = '$selectedIA' and marks.subjectlectureid = $subjectlecid";
                            //echo $query;
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                $submit = "UPDATE";
                                while ($row = $result->fetch_assoc()) {
                                    $name = $row['studentname'];
                                    $regnum = $row['regno'];
                                    $marks = $row['marks'];
                                    $marksId = $row['marksid'];
                                    ?>
                                    <tr>
                                        <td style="font-weight: bold;font-size: 12px; color: green">
                                            <?php echo $name ?>
                                            <input type="hidden" id="regno" name="regno[]" value="<?php echo $regnum ?>"/>
                                            <input type="hidden" id="marksId" name="marksId[]" value="<?php echo $marksId ?>"/>
                                        </td>
                                        <td>
                                            <input type="text" id="marks" name="marks[]" style="width: 75px;" value="<?php echo $marks ?>"/>	
                                        </td>
                                    </tr>										
                                    <?php
                                }
                            } else {
                                $submit = "SAVE";
                                $query = "SELECT * FROM student WHERE student.sem = $sem";
                                //echo $query;
                                $result = $conn->query($query);

                                while ($row = $result->fetch_assoc()) {
                                    $name = $row['studentname'];
                                    $regnum = $row['regno'];
                                    ?>
                                    <tr>
                                        <td style="font-weight: bold;font-size: 12px; color: green">
                                            <?php echo $name ?>
                                            <input type="hidden" id="regno" name="regno[]" value="<?php echo $regnum ?>"/>
                                        </td>
                                        <td>
                                            <input type="text" id="marks" name="marks[]" style="width: 75px;"/>	
                                        </td>
                                    </tr>										
                                    <?php
                                }
                            }
                        }
                        ?>						
                        <tr>
                            <td><a href="managemarks.php" style="font-size: 15px; font-weight: bold" > CANCEL </a></td>
                            <td><input type="submit" id="save" name="save" value="<?php echo $submit ?>"
                                       style="float: right; height: 30px; font-weight: bold; width: 75px;"></input></td>
                        </tr>
                    </table>
                </form>
                <?php
                if (isset($_REQUEST['save'])) {
                    if ($_REQUEST['save'] == "SAVE") {
                        date_default_timezone_set('Asia/Kolkata');
                        $sublec = $subjectlecid;
                        $regno = $_REQUEST['regno'];
                        $marks = $_REQUEST['marks'];
                        $iatype = $_REQUEST['iatype'];
                        $date = date("d.m.y");

                        for ($i = 0; $i < sizeof($regno); $i++) {
                            $query = "insert into marks (regno,subjectlectureid,iatype,marks,date) values ('$regno[$i]' , $sublec , $iatype ,$marks[$i],'$date')";
                            //echo $query;
                            $result = $conn->query($query);
                        }
                        if ($result == TRUE) {
                            ?>
                            <script type="text/javascript">
                                alert("Marks Details Has been Sucessfully Added");
                                window.location.href = "managemarks.php";
                            </script>
                            <?php
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Marks Details Has Not been Added");
                                window.location.href = "managemarks.php";
                            </script>
                            <?php
                        }
                    } else {
                        date_default_timezone_set('Asia/Kolkata');
                        $sublec = $subjectlecid;
                        $regno = $_REQUEST['regno'];
                        $mark = $_REQUEST['marks'];
                        $iatype = $_REQUEST['iatype'];
                        $marksid = $_REQUEST['marksId'];
                        $date = date("d.m.y");
                        for ($i = 0; $i < sizeof($regno); $i++) {
                            $query = "UPDATE marks SET marks = '$mark[$i]' WHERE marksid = $marksid[$i]";
                            //echo query;
                            $result = $conn->query($query);
                        }
                        if ($result === TRUE) {
                            ?>
                            <script type="text/javascript">
                                alert("Marks Details Has been Sucessfully Updated");
                                window.location.href = "managemarks.php";
                            </script>
                            <?php
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Marks Details Has Not been Updated");
                                window.location.href = "managemarks.php";
                            </script>
                            <?php
                        }
                    }
                }
                ?>
                <div class="clear"></div>
                <!--start footer from here-->
                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>