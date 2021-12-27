<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/addstaff.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/staffs.js"></script>
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
                                    colspan="2">ADD STAFFS</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">STAFF
                                NAME</td>
                            <td><input type="text" name="staffname" id="staffname"
                                       style="width: 225px; height: 25px;" /></td>
                        </tr>

                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">PASSWORD</td>
                            <td><input type="password" name="password" id="password"
                                       style="width: 225px; height: 25px;" /></td>

                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">AGE</td>
                            <td><input type="text" name="age" id="age"
                                       style="width: 225px; height: 25px;" /></td>

                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">ADDRESS</td>
                            <td><textarea name="address" id="address" rows="4" cols="33"
                                          style=""></textarea></td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">DESIGNATION</td>
                            <td><select id="designation" name="designation" style="width: 150px; height: 30px;">
                                    <option value="">--- SELECT ---</option>
                                    <option value="HOD">HOD</option>
                                    <option value="LECTURE">LECTURE</option>

                                </select></td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">MOBILE
                                NO</td>
                            <td><input type="text" name="mobileno" id="mobileno"
                                       style="width: 225px; height: 25px;" />
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">EMAIl
                                ID</td>
                            <td><input type="text" name="emailid" id="emailid"
                                       style="width: 225px; height: 25px;" /></td>
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
                    $staffname = $_POST['staffname'];
                    $password = $_POST['password'];
                    $age = $_POST['age'];
                    $address = $_POST['address'];
                    $mobileno = $_POST['mobileno'];
                    $emailid = $_POST['emailid'];
                    $designation = $_POST['designation'];

                    $query = "insert into staffs ( staffname,password,age,address,designation , email , mobno) values ('$staffname','$password','$age','$address','$designation','$emailid' , '$mobileno')";
                    echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript">
                            alert("Staff Details Has been Sucessfully Added");
                            window.location.href = "addstaffs.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Details Has Not been Added");
                            window.location.href = "addstaffs.php";
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