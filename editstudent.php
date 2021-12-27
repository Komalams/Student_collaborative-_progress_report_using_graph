<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/addstaff.css" rel="stylesheet" type="text/css">
    </head>
    <body>

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
                <?php
                if (isset($_REQUEST['edit_id'])) {
                    $id = $_REQUEST['edit_id'];
                    $query = "SELECT * FROM student where regno = '$id'";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $regno = $row['regno'];
                            $studentname = $row['studentname'];
                            $dob = $row['dob'];
                            $parentname = $row['parentname'];
                            $parentemail = $row['parentemail'];
                            $sem = $row['sem'];
                            $studentemail = $row['studentemail'];
                            $address = $row['address'];
                            $mobno = $row['mobno'];
                        }
                    }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();" method="post">
                        <table style="margin: auto; margin-top: 30px;" cellpadding="10" cellspacing="20">
                            <thead>
                                <tr>
                                    <td style="font-size: 35px; font-weight: bold; color: blue;font-family: monospace;"
                                        colspan="2">ADD STUDENTS</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">REGNO
                                </td>
                                <td><input type="text" name="regno" id="regno"
                                           style="width: 225px; height: 25px;" value="<?php echo $regno; ?>" /></td>
                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">STUDENT
                                    NAME</td>
                                <td><input type="text" name="studentname" id="studentname"
                                           style="width: 225px; height: 25px;" value="<?php echo $studentname; ?>" /></td>
                            </tr>

                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">DATE OF BIRTH</td>
                                <td><input type="date" name="dob" id="dob"
                                           style="width: 225px; height: 25px;" value="<?php echo $dob; ?>" /></td>

                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">PARENT NAME</td>
                                <td><input type="text" name="parentname" id="parentname"
                                           style="width: 225px; height: 25px;" value="<?php echo $parentname; ?>" /></td>

                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">PARENT EMAIL</td>
                                <td><input type="text" name="parentemail" id="parentemail"
                                           style="width: 225px; height: 25px;" value="<?php echo $parentemail; ?>" /></td>

                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">SEM
                                </td>
                                <td><input type="text" name="sem" id="sem"
                                           style="width: 225px; height: 25px;" value="<?php echo $sem; ?>" /></td>
                            </tr>
                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">STUDENT EMAIl
                                </td>
                                <td><input type="text" name="emailid" id="emailid"
                                           style="width: 225px; height: 25px;" value="<?php echo $studentemail; ?>" /></td>
                            </tr>


                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">ADDRESS</td>
                                <td><textarea name="address" id="address" rows="4" cols="35"
                                              style=""><?php echo $address; ?></textarea></td>
                            </tr>

                            <tr>
                                <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">MOBILE
                                    NO</td>
                                <td><input type="text" name="mobileno" id="mobileno"
                                           style="width: 225px; height: 25px;" value="<?php echo $mobno; ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><a href="addstudents.php">CANCEL</a><input type="submit"
                                           style="height: 30px; width: 100px; font-weight: bold; float: right;"
                                           id="submit" name="submit" value="SUBMIT"></input></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
                ?>
                <?php
                if (isset($_POST['submit'])) {
                    $regno = $_POST['regno'];
                    $studentname = $_POST['studentname'];
                    $dob = $_POST['dob'];
                    $parentname = $_POST['parentname'];
                    $parentemail = $_POST['parentemail'];
                    $sem = $_POST['sem'];
                    $emailid = $_POST['emailid'];
                    $address = $_POST['address'];
                    $mobileno = $_POST['mobileno'];

                    $query = "update student set studentname = '$studentname' , dob = '$dob'  , parentname = '$parentname' , parentemail = '$parentemail' , sem = '$sem' , studentemail = '$emailid' , address = '$address' , mobno = '$mobileno' where regno = '$regno'";

                    //echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript">
                            alert("Staff Details Has been Sucessfully Updated");
                            window.location.href = "viewstudents.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Details Has Not been Updated");
                            window.location.href = "viewstudents.php";
                        </script>
                        <?php
                    }
                }
                ?>
                <div class="clear"></div>

                <!--start footer from here-->
                <div id="footer">Copyright &copy; 2014. Design by <a href="http://www.htmltemplates.net" target="_blank">html templates</a><br>

                    <!--DO NOT remove footer link-->
                    <!--Template designed by--><a href="http://www.htmltemplates.net"><img src="images/footer.gif" class="copyright" alt="htmltemplates.net"></a>
                </div>
                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>