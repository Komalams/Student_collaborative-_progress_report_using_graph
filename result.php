<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/viewstaff.css" rel="stylesheet" type="text/css">
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
                include './demo.php';
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();" method="post">
                    <table style="margin: auto; margin-top: 30px;" cellpadding="10" cellspacing="40">
                        <thead>
                            <tr>
                                <td style="font-size: 35px; font-weight: bold; color: blue;font-family: monospace;"
                                    colspan="2">ADD NOTIFICATIONS</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">DATE
                            </td>
                            <td><input type="date" name="date" id="date"
                                       style="width: 225px; height: 25px;" /></td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px; font-weight: bold; color: red;font-family: monospace">NOTIFICATION
                            </td>
                            <td><textarea name="notification" id="notification"
                                          rows="6" cols="35" ></textarea></td>
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
                   
                    $query = "SELECT parentemail , studentemail FROM student";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $studentemail = $row['studentemail'];
                    $parentemail = $row['parentemail'];
                    
                    $date = $_POST['date'];
                    $notification = $_POST['notification'];
                   
                    $query = "insert into notification (date , notification ) values ( '$date' , '$notification' )";
                    //echo $query;
                    if ($conn->query($query) === TRUE) {
                        $obj = new Demo();
                        $obj2 = new Demo();
                        
                        $obj->sendmail($notification , $studentemail);
                        $obj->sendmail($notification , $parentemail);
                        
                        ?>
                        <script type = "text/javascript">
                            alert("Notification Has been Sucessfully Posted");
                            window.location.href = "addstaffs.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Notification Details Has Not been Posted");
                            window.location.href = "addstaffs.php";
                        </script>
                        <?php
                    }
                }
                ?>
                <div class="clear"></div>

                <!--start footer from here-->
                
                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>