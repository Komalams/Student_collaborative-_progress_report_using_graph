<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/subjects.css" rel="stylesheet" type="text/css">
        <script src="js/managesubjects.js" type="text/javascript"></script>
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
                if (isset($_REQUEST['edit_id']) == FALSE) {
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="subjectform" onsubmit="return validate();" method="post"> 
                        <table style="margin: auto;" cellspacing="40px;">
                            <tr>
                                <td colspan="2"><p
                                        style="font-size: 25px; font-weight: bold; color: blue; font-family:monospace ">Manage
                                        Subjects</p></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: 20px; color: red; font-family: monospace;">Select
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
                                <td style="font-weight: bold; font-size: 20px; color: red; font-family: monospace;">Subject
                                    Name</td>
                                <td><input type="text" id="subject" name="subject"
                                           style="width: 222px; height: 22px;"></input></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: center;"><input type="submit"
                                                                       id="submit" name="submit" value="SUBMIT"
                                                                       style = "height: 30px;width: 100px;  font-weight: bold;"></input></td>
                            </tr>
                        </table>
                    </form>  
                    <?php
                }

                if (isset($_POST['submit'])) {
                    $sub = $_REQUEST['subject'];
                    $semester = $_REQUEST['sem'];
                    $query = "select * from subject where subjectname = '$sub'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        ?>
                        <script type="text/javascript">
                            alert("Subject Already Exists");
                            window.location.href = "managesubjects.php";
                        </script>
                        <?php
                    } else {

                        $query = "insert into subject ( subjectname,semester) values ('$sub',$semester)";
                        //echo $query;
                        if ($conn->query($query) === TRUE) {
                            ?>
                            <script type="text/javascript">
                                alert("Subject Has Been Sucessfully Added");
                                window.location.href = "managesubjects.php";
                            </script>
                            <?php
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Subject Has Not been Added");
                                window.location.href = "managesubjects.php";
                            </script>
                            <?php
                        }
                    }
                }

                if (isset($_REQUEST['edit_id']) == TRUE) {
                    $subid = $_REQUEST['edit_id'];
                    $query = "select * from subject where subjectid = $subid";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $subjectname = $row['subjectname'];
                            $semname = $row['semester'];
                            ?>
                            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit = "return validateup();" method="post">
                                <table style = "margin: auto; margin-top: 30px;" cellspacing = "20px;">
                                    <tr>
                                        <td colspan = "2"><p
                                                style="font-size: 25px; font-weight: bold; color: blue; font-family:monospace ">Manage
                                                Subjects</p></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; font-size: 20px; color: red; font-family: monospace;">Semester</td>
                                        <td><select name = "sem_up" id = "sem_up" style = "height: 25px;"
                                                    onchange = "semchng()">
                                                <option value = "<?php echo $semname; ?>"><?php echo $semname; ?></option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; font-size: 20px; color: red; font-family: monospace;">Subject Name</td>
                                        <td><input type = "text" id = "subject_up" name = "subject_up"
                                                   style = "width: 222px; height: 22px;" value = "<?php echo $subjectname; ?>"></input></td>
                                    </tr>
                                    <tr>
                                        <td><input type = "hidden" id = "editid" name = "editid"
                                                   value = "<?php echo $subid; ?>"></input></td>

                                        <td style = "text-align: center;"><a href = "managesubjects.php"
                                                                             style = "font-weight: bold; font-size: 15px; margin-right: 50px;">CANCEL</a><input
                                                                             type = "submit" id = "update" name = "update" value = "UPDATE"
                                                                             style = "height: 30px;width: 100px;  font-weight: bold;"></input></td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                        }
                    }
                }

                if (isset($_POST['update'])) {
                    $subjectid = $_REQUEST['editid'];
                    $subjectname = $_REQUEST['subject_up'];
                    $query = "update subject set subjectname = '$subjectname' where subjectid = $subjectid";
                    if ($conn->query($query) === TRUE) {
                        ?>

                        <script type = "text/javascript">
                            alert("Subject Has Been Updated Successfully");
                            window.location.href = "managesubjects.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Subject Has Been Not Updated");
                            window.location.href = "managesubjects.php";
                        </script>
                        <?php
                    }
                }

                if (isset($_REQUEST['delete_id']) == TRUE) {
                    $id = $_REQUEST['delete_id'];
                    $query = "delete from subject where subjectid = $id";
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript" >
                            alert("Subject Has Been Sucessfully Deleted");
                            window.location.href = "managesubjects.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Subject Has Not been Deleted");
                            window.location.href = "managesubjects.php";
                        </script>
                        <?php
                    }
                }
                ?>

                <?php
                if (isset($_REQUEST['sem']) == TRUE) {
                    $semid = $_REQUEST['sem'];
                    $query = "select * from subject where semester = $semid";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        ?>
                        <table cellspacing="20px;" style="margin: auto;"
                               width="40%" >
                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: blue; font-family: monospace">
                                    SUBJECTS</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                $subname = $row['subjectname'];
                                $id = $row['subjectid'];
                                ?>
                                <tr>
                                    <td style="font-size: 18px; color: red;font-weight: bold;font-family: monospace"><?php echo $subname; ?></td>
                                    <td style="font-size: 15px;font-weight: bold; font-family: monospace"><a
                                            href="managesubjects.php?edit_id=<?php echo $id; ?>">Edit</a></td>
                                    <td style="font-size: 15px;font-weight: bold; font-family: monospace"><a
                                            href="managesubjects.php?delete_id=<?php echo $id; ?>">Delete</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php
                    } else {
                        ?>
                        <div style="font-weight: bold;font-size: 20px;color: red;margin-left: 300px;margin-top: 50px; font-family: monospace">NO SUBJECTS ADDED FOR THIS SEMESTER</div>
                        <?php
                    }
                } else {
                    ?>
                    <div style=" font-family: monospace; font-weight: bold; font-size: 25px; margin-left: 300px; margin-top: 40px; color: red "> SELECT SEMESTER TO ADD SUBJECTS </div>
                    <?php
                }
                ?>



                <div class="clear"></div>
                <!--start footer from here-->

                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>