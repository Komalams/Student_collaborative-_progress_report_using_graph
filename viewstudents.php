<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/viewstaff.css" rel="stylesheet" type="text/css">
        <script src="js/viewstudents.js"></script>
    </head>
    <body>
        <?php
        include './db.php';
        ?>
        <div id="wrapper"> 
            <div id="header">
                <div class="banner_img">

                </div>
            </div>
            <div class="navigation">
                <ul>
                     <li><a href="addstaffs.php" style="font-weight: bold;">ADD STAFFS</a></li>
                    <li><a href="viewstaffs.php" style="font-weight: bold;">VIEW STAFFS</a></li>
                    <li><a href="addstudents.php" style="font-weight: bold;">ADD STUDENTS</a></li>
                    <li><a href="viewstudents.php" style="font-weight: bold;">STUDENTS</a></li>
                    <li><a href="result.php" style="font-weight: bold;">RESULTS</a></li>
                    <li><a href="index.php" style="font-weight: bold;">LOGOUT</a></li>

                </ul>
            </div>
            <div class="right_side_bar"> 
            </div>    
            <div id="page_content">
                <?php
                include './db.php';
                ?>
                <table style="margin: auto; margin-top: 20px;" cellspacing="20">
                    <tr><td style="font-size: 20px; font-weight: bold; color: #990000; font-family: monospace">SELECT SEMETSER</td><td><select name="sem" id="sem" style="height: 25px;"
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
                            </select></td></tr>
                </table>


                <?php
                $query = "SELECT * FROM student where sem = $sem";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    ?>
                    <table cellspacing="10px" width="90%" style="margin-top: 20px;margin-left: 30px;">
                        <thead>
                            <tr>
                                <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">REG NO</td>
                                <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">STUDENTNAME</td>
                                <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">SEM
                                </td>
                                <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">MOBILENO
                                </td>
                                <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">ADDRESS</td>
                                <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">EMAILID</td>
                            </tr>
                        </thead>
                        <?php
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $regno = $row['regno'];
                            $studentname = $row['studentname'];
                            $sem = $row['sem'];
                            $mobileno = $row['mobno'];
                            $address = $row['address'];
                            $emailid = $row['studentemail'];
                            ?>

                            <tr>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $regno; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $studentname; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $sem; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $mobileno; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $address; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $emailid; ?></td>
                                <td><a href="editstudent.php?edit_id=<?php echo $regno; ?>"
                                       style="color: #5E33FF; font-size: 15px;">Edit</a></td>
                                <td><a href="viewstudents.php?delete_id=<?php echo $regno; ?>"
                                       style="color: #5E33FF; font-size: 15px;">Delete</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                            <div style=" font-family: monospace; font-weight: bold; font-size: 25px; margin-left: 200px; margin-top: 40px; color: #990000 "> SELECT SEMESTER TO VIEW STUDENT DETAILS </div>
                        <?php
                    }
                    ?>
                </table>
                <?php
                if (isset($_REQUEST['delete_id'])) {
                    $id = $_REQUEST['delete_id'];
                    $query = "delete from student where regno = '$id'";
                    echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript">
                            alert("Student Details Has been Sucessfully Deleted");
                            window.location.href = "viewstudents.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Details Has Not been Deleted");
                            window.location.href = "viewstudents.php";
                        </script>
                        <?php
                    }
                }
                ?>
                <div class="clear"></div>
                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>