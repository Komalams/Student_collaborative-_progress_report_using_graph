<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <script type="text/javascript" src="js/students.js"></script>
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
                                       style="width: 225px; height: 25px;" /></td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">STUDENT
                                NAME</td>
                            <td><input type="text" name="studentname" id="studentname"
                                       style="width: 225px; height: 25px;" /></td>
                        </tr>

                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">DATE OF BIRTH</td>
                            <td><input type="date" name="dob" id="dob"
                                       style="width: 225px; height: 25px;" /></td>

                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">PARENT NAME</td>
                            <td><input type="text" name="parentname" id="parentname"
                                       style="width: 225px; height: 25px;" /></td>

                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">PARENT EMAIL</td>
                            <td><input type="text" name="parentemail" id="parentemail"
                                       style="width: 225px; height: 25px;" /></td>

                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">SEM
                            </td>
                            <td><input type="text" name="sem" id="sem"
                                       style="width: 225px; height: 25px;" /></td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">STUDENT EMAIl
                            </td>
                            <td><input type="text" name="emailid" id="emailid"
                                       style="width: 225px; height: 25px;" /></td>
                        </tr>


                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">ADDRESS</td>
                            <td><textarea name="address" id="address" rows="4" cols="35"
                                          style=""></textarea></td>
                        </tr>

                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">MOBILE
                                NO</td>
                            <td><input type="text" name="mobileno" id="mobileno"
                                       style="width: 225px; height: 25px;" />
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit"
                                       style="height: 30px; width: 100px; font-weight: bold; float: right;"
                                       id="submit" name="submit" value="SUBMIT"></input></td>
                        </tr>
                    </table>
                </form>

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

                    $query = "INSERT INTO student ( regno , studentname , dob , parentname , parentemail , sem , studentemail , address , mobno ) values ('$regno','$studentname','$dob',' $parentname','$parentemail','$sem','$emailid','$address','$mobileno')";
                    //echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript">
                            alert("Student Details Has been Sucessfully Added");
                            window.location.href = "addstudents.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Student Details Has Not been Added");
                            window.location.href = "addstudents.php";
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