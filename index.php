<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/login.js"></script>
    </head>
    <body>
        <?php
        session_start();
        ob_start();
        ?>
        <div id="wrapper"> 
            <div id="header">
                <div class="banner_img">
                </div>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Technical</a></li>
                    <li><a href="#">Higher / Primary</a></li>
                    <li><a href="#">Medical</a></li>
                    <li><a href="#">Pre University</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>

            <div class="right_side_bar"> 

                <div class="col_1">
                    <h1>Student Support</h1>
                    <div class="box">
                        <ul>
                            <li><a href="#"></a></li>
                            <li><a href="#">Placements</a></li>
                            <li><a href="#">Facilities</a></li>
                            <li><a href="#">Student Support Cells</a></li>
                            <li><a href="#">Scholarships</a></li>
                            <li><a href="#">Mentorship</a></li>
                            <li><a href="#">ParentCouncil</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Associations</a></li>
                            <li><a href="#">Student Union</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col_1">
                    <h1>Contact</h1>
                    <div class="box">
                        <p style="font-weight: bold;">JSS WOMENS COLLEGE , SARASWATHIPURAM , MYSORE </p>
                    </div>
                </div>
                <?php
                include './db.php';
                ?>
            </div>    
            <div id="page_content">
                <div class="left_section">
                    <div class="common_content">
                        <h2>Introduction</h2>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate()" method="post">
                            <table cellpadding="5px" style="margin: auto;margin-top: 50px;" cellspacing="15px">
                                <thead>                                                                                      
                                    <tr>
                                        <td colspan="2"
                                            style="font-weight: bold; font-size: 25px; color: #990000; font-family: monospace;">
                                            LOGIN</td>

                                    </tr>
                                </thead>
                                <tr>
                                    <td style="font-size: 20px; font-weight: bold; color: #556801; font-family: monospace;">USERNAME</td>
                                    <td><input type="text" id="username" name="username"
                                               style="height: 18px;" /></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px; font-weight: bold; color: #556801;  font-family: monospace;">PASSWORD</td>
                                    <td><input type="password" id="password" name="password"
                                               style="height: 18px;" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td style="float: right;"><input type="submit" id="submit"
                                                                     name="submit" value="SUBMIT"
                                                                     style="height: 30px; background: #990000; color: #ffffff; width: 75px; " /></td>
                                </tr>
                            </table>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            if ($username == "admin" && $password = "admin") {
                                header('Location: addstaffs.php');
                            } else {
                                $query = "select * from staffs where email = '$username' and password = '$password'";
                                //echo $query;
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $designation = $row['designation'];
                                        //echo $designation;
                                        $staffid = $row['staffid'];
                                    }
                                }
                                if ($designation == 'HOD') {
                                    header('Location: managesubjects.php');
                                    $_SESSION['staffid'] = $staffid;
                                } else if ($designation == 'LECTURE') {
                                    header('Location: managestaffmarks.php');
                                    $_SESSION['staffid'] = $staffid;
                                } else {
                                    $query = "SELECT * FROM student WHERE studentemail = '$username'  AND regno = '$password'";
                                    //echo $query;
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $regno = $row['regno'];
                                        }
                                        $_SESSION['regno'] = $regno;
                                        header('Location: viewstudentreport.php');
                                    }
                                    ?>
                                    <script type="text/javascript">
                                        alert("Invalid UserName and Password");
                                    </script>
                                    <?php
                                }
                            }
                        }
                        ?>      
                        <hr>
                    </div>

                    <div class="top_content border_none">
                        <div class="column_one">
                            <h2 style="font-weight: bold;">JSS COLLEGE</h2>
                            <p>J.S.S Composite P.U. College for Women's was started during theyear 2003 at yelandur, Chamarajanagar District. Yelandur is a place for well known Scholars, Nature Lovers, artists. The place has many temples & buildings of Dewan's time. Even though it has a historical background, progress in educational field is slow. Thus by recognizing the inportance of education at yelandur, JSS Mahavidyapeetha has started J.S.S Composite P.U. College for Women during the year 2003. The college is situated at the center place of taluk & nearer ti the bus stand.</p>
                            <br>
                            <p><a href="#" class="btn">More</a></p></div>
                        <div class="column_two">
                            <h2 style="font-weight: bold;"> STUDENTS</h2>
                            <p>The Students Cultural union Carryout number of activities throughout the year which takes care of full involvement & participation of all the students. National festivals and days of national importance are observed and special lectures by the resource persons were arranged on these days. Students participated in J.S.S inter college cultural and sports competitions held at suttur every year which was organized by J.S.S Mahavidhya peetha. The Institution has released its first college magazine 'PRANATI' during the year 20008.</p>
                            <br>
                            <p><a href="#" class="btn">More</a></p>
                        </div>
                    </div>
                </div>


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