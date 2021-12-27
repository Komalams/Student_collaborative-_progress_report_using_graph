<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/subjects.css" rel="stylesheet" type="text/css">
        <script src="js/sublec.js" type="text/javascript"></script>
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
                ?>
                <?php
                if (isset($_REQUEST['edit_id']) == null) {
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="subjectform" onsubmit="return validate();" method="post">
                        <table style="margin: auto; margin-top: 30px;" cellspacing="40px;">
                            <tr>
                                <td colspan="2"><p
                                        style="font-size: 30px; font-weight: bold; color: blue; font-family: monospace">Manage
                                        Subject - Lecturer</p></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: 20px; color: red; font-family: monospace">Select
                                    Semester</td>
                                <td><select name="sem" id="sem" style="height: 25px;"
                                            onchange="semchng()">
                                        <option value="">-Select-</option>
                                        <?php
                                        $sem = 0;
                                        if (isset($_REQUEST['sem']) == TRUE) {
                                            $sem = $_REQUEST['sem'];
                                        }
                                        for ($i = 1; $i <= 6; $i++) {
                                            if ($i == $sem) {
                                                echo "Inside";
                                                ?>
                                                <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>

                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: 20px; color: red; font-family: monospace">Subject
                                    Name</td>
                                <td><select id="subjectId" name="subjectId"
                                            style="width: 150px; height: 25px;" onchange="onSubChange()">
                                        <option value="" style="font-weight: bold;">----------Select---------</option>
                                        <?php
                                        $subid = 0;
                                        if (isset($_REQUEST['subid']) == TRUE) {
                                            $subid = $_REQUEST['subid'];
                                        }
                                        $query = "select * from subject where semester = $sem";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['subjectid'] == $subid) {
                                                    ?>
                                                    <option value="<?php echo $row['subjectid']; ?>" selected = "selected" style="font-weight: bold;"><?php echo $row['subjectname']; ?></option>                        
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $row['subjectid']; ?>" style="font-weight: bold;"><?php echo $row['subjectname'] ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: 20px; color: red; font-family: monospace">Select
                                    Lecture</td>
                                <td><select id="staffId" name="staffId"
                                            style="width: 150px;
                                            height: 25px;
                                            ">
                                        <option value="">-----------Select---------</option>
                                        <?php
                                        $query = "select * from staffs WHERE designation != 'LAB INCHARGE'";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['staffid']; ?>"><?php echo $row['staffname']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" id="submit" name="submit"  value="SUBMIT" style="height: 30px; font-weight: bold; width: 100px;"></input></td>                       
                            </tr>
                        </table>
                    </form>
                    <?php
                } else {
                    $id = $_REQUEST['edit_id'];
                    $query = "SELECT * FROM subjectlecture INNER JOIN staffs ON staffs.staffid = subjectlecture.staffid INNER JOIN SUBJECT ON subject.subjectid = subjectlecture.subjectid WHERE subjectlectureid = $id";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $sid = $row['semester'];
                            $subname = $row['subjectname'];
                            $staffId = $row['staffid'];
                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id = "subjectform" onsubmit = "return validateup();" method="post">
                                <table style = "margin: auto; margin-top: 30px;" cellspacing = "40px;">
                                    <tr>
                                        <td colspan = "2"><p
                                                style="font-size: 30px; font-weight: bold; color: blue; font-family: monospace"
                                                >Manage
                                                Subject - Lecturer</p></td>
                                    </tr>
                                    <tr>
                                        <td style = "font-weight: bold;
                                            font-size: 20px;
                                            color: red; font-family: monospace
                                            ">Select
                                            Semester</td>
                                        <td><select name = "sem_up" id = "sem_up" style = "height: 25px;"onchange = "semchng()">
                                                <option value = "<?php echo $sid; ?>"><?php echo $sid; ?></option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td style = "font-weight: bold;
                                            font-size: 20px;
                                            color: red; font-family: monospace
                                            ">Subject
                                            Name</td>
                                        <td><select id = "subjectId_up" name = "subjectId_up"
                                                    style = "width: 150px;
                                                    height: 25px;
                                                    " onchange = "onSubChange()">
                                                <option value = "<?php echo $row['subjectid']; ?>"
                                                        style = "font-weight: bold;
                                                        "><?php echo $row['subjectname'] ?></option>

                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td style = "font-weight: bold;
                                            font-size: 20px;
                                            color: red; font-family: monospace
                                            ">Select
                                            Lecture</td>
                                        <td><select id = "staffId_up" name = "staffId_up"
                                                    style = "width: 150px;
                                                    height: 25px;
                                                    ">
                                                <option value = ""> -----------Select---------</option>
                                                <?php
                                                $query = "select * from staffs WHERE designation != 'LAB INCHARGE'";
                                                $result = $conn->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($staffId == $row['staffid']) {
                                                            ?>
                                                            <option value = "<?php echo $row['staffid']; ?>"
                                                                    selected = "selected"><?php echo $row['staffname']; ?></option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                            <option value = "<?php echo $row['staffid']; ?>"><?php echo $row['staffname']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td><input type = "hidden" id = "editid" name = "editid"
                                                   value = "<?php echo $id; ?>"></input></td>
                                        <td><a href="managesublect.php">CANCEL</a><input type = "submit" id = "update" name = "update"
                                                                                         value = "UPDATE" style="height: 30px; font-weight: bold; width: 100px; margin-left: 20px;"></input></td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                        }
                    }
                }
                ?>
                <?php
                if (isset($_REQUEST['submit']) == TRUE) {
                    $staff_id = $_POST['staffId'];
                    $subject_id = $_POST['subjectId'];
                    $query = "SELECT * FROM subjectlecture WHERE subjectid = $subject_id AND staffid = $staff_id";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        ?>
                        <script type="text/javascript">
                            alert("Subject assigned already exists with same staff");
                            window.location.href = "managesublect.php";
                        </script>
                        <?php
                    } else {
                        $query = "insert into subjectlecture (subjectid,staffid) values ($subject_id, $staff_id)";
                        //echo $query;

                        if ($conn->query($query) === TRUE) {
                            ?>
                            <script type = "text/javascript">
                                alert("Staff Assigned for Subject Successfully");
                                window.location.href = "managesublect.php";
                            </script>
                            <?php
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Staff Not Assigned for Subject");
                                window.location.href = "managesublect.php";
                            </script>
                            <?php
                        }
                    }
                }
                if (isset($_REQUEST['update']) == TRUE) {
                    $staff_id = $_REQUEST['staffId_up'];
                    $subject_id = $_REQUEST['subjectId_up'];
                    $editid = $_REQUEST['editid'];
                    $query = "update subjectlecture set staffid = $staff_id where subjectlectureid = $editid";
                    //echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript">
                            alert("Staff Updated for Subject Successfully");
                            window.location.href = "managesublect.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Not Updated for Subject");
                            window.location.href = "managesublect.php";
                        </script>
                        <?php
                    }
                }
                if (isset($_REQUEST['delete_id']) == TRUE) {
                    $delid = $_REQUEST['delete_id'];
                    $query = "delete from subjectlecture where subjectlectureid = $delid";
                    // echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Deleted for Subject Successfully");
                            window.location.href = "managesublect.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Not Deleted for Subject");
                            window.location.href = "managesublect.php";
                        </script>
                        <?php
                    }
                }
                ?>
                <?php
                if (isset($_REQUEST['subid']) == TRUE) {
                    ?>

                    <?php
                    $subjtid = $_REQUEST['subid'];
                    $query = "SELECT * FROM subjectlecture INNER JOIN staffs ON staffs.staffid = subjectlecture.staffid WHERE subjectid = $subjtid";
                    //echo $query;
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        ?>
                        <table cellspacing="10px;
                               " style="margin: auto;
                               margin-top: 20px;
                               ">
                            <tr>
                                <td style="font-size: 30px;
                                    font-weight: bold;
                                    color: blue;font-family:  monospace
                                    ">
                                    STAFF NAME ASSIGNED</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                $staffname = $row['staffname'];
                                $sublec = $row['subjectlectureid'];
                                ?>
                                <tr>
                                    <td style="font-size: 20px;
                                        color: red;font-weight: bold; font-family: monospace
                                        "><?php echo $staffname ?></td>
                                    <td style="font-size: 15px; font-family: monospace
                                        "><a
                                            href="managesublect.php?edit_id=<?php echo $sublec; ?>">Edit</a></td>
                                    <td style="font-size: 15px;font-family: monospace
                                        "><a
                                            href="managesublect.php?delete_id=<?php echo $sublec; ?>">Delete</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>      
                        <?php
                    } else {
                        ?>
                        <div style="font-weight: bold;font-size: 20px;color:green;margin-left: 300px;margin-top: 50px; font-family: monospace">NO STAFF ASSIGNED FOR THIS SEMESTER</div> 
                        <?php
                    }
                } else {
                    ?>
                    <div style=" font-family: monospace; font-weight: bold; font-size: 25px; margin-left: 250px; margin-top: 40px; color: red "> SELECT SEMESTER AND SUBJECT TO ASSIGN STAFF </div>      
                    <?php
                }
                ?>



                <div class="clear"></div>
                <!--start footer from here-->

                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>