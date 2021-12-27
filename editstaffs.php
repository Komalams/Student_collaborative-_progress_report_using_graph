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
                    $query = "SELECT * FROM staffs where staffid = $id";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            $staffname = $row['staffname'];
                            $password = $row['password'];
                            $age = $row['age'];
                            $address = $row['address'];
                            $mobileno = $row['mobno'];
                            $designation = $row['designation'];
                            $emailid = $row['email'];
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
                                                   style="width: 225px; height: 25px;" value="<?php echo $staffname; ?>"/></td>
                                    </tr>

                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">PASSWORD</td>
                                        <td><input type="text" name="password" id="password"
                                                   style="width: 225px; height: 25px;" value="<?php echo $password; ?>" /></td>

                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">AGE</td>
                                        <td><input type="text" name="age" id="age" value="<?php echo $age; ?>"
                                                   style="width: 225px; height: 25px;" /></td>

                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">ADDRESS</td>
                                        <td><textarea name="address" id="address" rows="4" cols="34"
                                                      style=""><?php echo $address; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">MOBILE
                                            NO</td>
                                        <td><input type="text" name="mobileno" id="mobileno"
                                                   style="width: 225px; height: 25px;"  value="<?php echo $mobileno; ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">EMAIl
                                            ID</td>
                                        <td><input type="text" name="emailid" id="emailid"
                                                   style="width: 225px; height: 25px;" value="<?php echo $emailid; ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td style="font-size: 15px; font-weight: bold; color: red;height: 25px;">DESIGNATION</td>
                                        <td><select id="designation" name="designation">
                                                <option value="">--- SELECT ---</option>
                                                <option value="HOD">HOD</option>
                                                <option value="LECTURE">LECTURE</option>
                                                <option value="LAB INCHARGE">LAB INCHARGE</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" id="staff_id" name="staff_id" value="<?php echo $id; ?>"></td>
                                        <td><a href="addstaffs.php">CANCEL</a><input type="submit"
                                                                                    style="height: 30px; width: 100px; font-weight: bold; float: right;"
                                                                                    id="update" name="update" value="UPDATE"></input></td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                        }
                    }
                }
                ?>
                <?php
                if (isset($_POST['update'])) {
                    $upid = $_POST['staff_id'];
                    $staffname = $_POST['staffname'];
                    $age = $_POST['age'];
                    $password = $_POST['password'];
                    $address = $_POST['address'];
                    $mobileno = $_POST['mobileno'];
                    $emailid = $_POST['emailid'];
                    $designation = $_POST['designation'];

                    $query = "update staffs set staffname = '$staffname',password = '$password', age = '$age' , designation = '$designation',address = '$address', mobno = '$mobileno', email = '$emailid' where staffid = $upid";
                    //echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript">
                            alert("Staff Details Has been Sucessfully UPDATED");
                            window.location.href = "viewstaffs.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Details Has Not been UPDATED");
                            window.location.href = "viewstaffs.php";
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