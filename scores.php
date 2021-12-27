<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper"> 
            <div id="header">
                <div class="banner_img">

                </div>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="#">LOGIN</a></li>
                    <li><a href="#">Higher</a></li>
                    <li><a href="#">Medical</a></li>
                    <li><a href="#">Pre University</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>

            <div class="right_side_bar"> 

                <div class="col_1">
                    <h1>Main Menu</h1>
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

            </div>    
            <div id="page_content">
                <div class="left_section">
                    <div class="common_content">
                        <marquee style="color: red; font-weight: bold; font-size: 20px; font-family: monospace">RESULTS HAS BEEN ANNOUNCED FOR BCA ALL SEMESTERS</marquee>
                        <h2 style="margin-top: 20px;">RESULTS</h2>
                        <body>
                        </body>
                        <hr>
                    </div>
                    <?php
                    include './db.php';

                    $maxmarks1 = 0;
                    $studentname1 = "";

                    $query = "SELECT DISTINCT(regno),studentname, address FROM student WHERE sem = 1";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $regno = $row['regno'];
                        $name = $row['studentname'];

                        $sql = "SELECT SUM(marks) as m FROM marks WHERE regno = '$regno' AND iatype = '3'";
                        $rs = $conn->query($sql);

                        if ($op = $rs->fetch_assoc()) {
                            $m = $op['m'];
                            if ($maxmarks1 < $m) {
                                $maxmarks1 = $m;
                                $studentname1 = $name;
                            }
                        }
                    }

                    //echo $studentname1 . " - " . $maxmarks1;


                    $maxmarks2 = 0;
                    $studentname2 = "";

                    $query = "SELECT DISTINCT(regno),studentname FROM student WHERE sem = 2";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $regno = $row['regno'];
                        $name = $row['studentname'];
                        $sql = "SELECT SUM(marks) as m FROM marks WHERE regno = '$regno' AND iatype = '3'";
                        $rs = $conn->query($sql);

                        if ($op = $rs->fetch_assoc()) {
                            $m = $op['m'];
                            if ($maxmarks2 < $m) {
                                $maxmarks2 = $m;
                                $studentname2 = $name;
                            }
                        }
                    }

                    //echo $studentname2 . " - " . $maxmarks2;


                    $maxmarks3 = 0;
                    $studentname3 = "";

                    $query = "SELECT DISTINCT(regno),studentname FROM student WHERE sem = 3";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $regno = $row['regno'];
                        $name = $row['studentname'];
                        $sql = "SELECT SUM(marks) as m FROM marks WHERE regno = '$regno' AND iatype = '3'";
                        $rs = $conn->query($sql);

                        if ($op = $rs->fetch_assoc()) {
                            $m = $op['m'];
                            if ($maxmarks3 < $m) {
                                $maxmarks3 = $m;
                                $studentname3 = $name;
                            }
                        }
                    }

                    //echo $studentname3 . " - " . $maxmarks3;


                    $maxmarks4 = 0;
                    $studentname4 = "";

                    $query = "SELECT DISTINCT(regno),studentname FROM student WHERE sem = 4";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $regno = $row['regno'];
                        $name = $row['studentname'];
                        $sql = "SELECT SUM(marks) as m FROM marks WHERE regno = '$regno' AND iatype = '4'";
                        $rs = $conn->query($sql);

                        if ($op = $rs->fetch_assoc()) {
                            $m = $op['m'];
                            if ($maxmarks4 < $m) {
                                $maxmarks4 = $m;
                                $studentname4 = $name;
                            }
                        }
                    }

                    //echo $studentname4 . " - " . $maxmarks4;


                    $maxmarks5 = 0;
                    $studentname5 = "";

                    $query = "SELECT DISTINCT(regno),studentname FROM student WHERE sem = 5";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $regno = $row['regno'];
                        $name = $row['studentname'];
                        $sql = "SELECT SUM(marks) as m FROM marks WHERE regno = '$regno' AND iatype = '5'";
                        $rs = $conn->query($sql);

                        if ($op = $rs->fetch_assoc()) {
                            $m = $op['m'];
                            if ($maxmarks5 < $m) {
                                $maxmarks5 = $m;
                                $studentname5 = $name;
                            }
                        }
                    }

                    //echo $studentname5 . " - " . $maxmarks5;

                    $maxmarks6 = 0;
                    $studentname6 = "";

                    $query = "SELECT DISTINCT(regno),studentname FROM student WHERE sem = 6";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $regno = $row['regno'];
                        $name = $row['studentname'];
                        $sql = "SELECT SUM(marks) as m FROM marks WHERE regno = '$regno' AND iatype = '3'";
                        $rs = $conn->query($sql);

                        if ($op = $rs->fetch_assoc()) {
                            $m = $op['m'];
                            if ($maxmarks6 < $m) {
                                $maxmarks6 = $m;
                                $studentname6 = $name;
                            }
                        }
                    }

                    //echo $studentname6 . " - " . $maxmarks6;
                    ?>
                    <div class="top_content border_none">
                        <table style="" cellspacing="20" cellpadding="30">

                            <tr>
                                <td style="font-size: 30px; font-weight: bold; color: blue;font-family: monospace;"
                                    colspan="2">SEMESTER 1</td>

                            </tr>
                            <tr>  <td style="font-size: 20px; font-weight: bold; color: red">
                                    STUDENT NAME
                                </td>
                                <td style="font-size: 20px; font-weight: bold; color: red">
                                    MARKS
                                </td>
                            </tr>
                            <tr> <td style="font-weight: bold; font-size: 15px; "><?php echo $studentname1; ?> </td> <td style="font-weight: bold; font-size: 15px;"> <?php echo $maxmarks1; ?> </td></tr> 
                            


                        </table>
                        <table cellspacig="20" style="margin-top: 50px;">
                              <tr>
                                <td style="font-size: 30px; font-weight: bold; color: blue;font-family: monospace;"
                                    colspan="2">SEMESTER 2</td>

                            </tr>
                            <tr>  <td style="font-size: 20px; font-weight: bold; color: red">
                                    STUDENT NAME
                                </td>
                                <td style="font-size: 20px; font-weight: bold; color: red">
                                    MARKS
                                </td>
                            </tr>
                            <tr> <td style="font-weight: bold; font-size: 15px; "><?php echo $studentname2; ?> </td> <td style="font-weight: bold; font-size: 15px;"> <?php echo $maxmarks2; ?> </td></tr> 
                            

                        </table>

                        <table cellspacig="20"  style="margin-top: 50px;">
                             <tr>
                                <td style="font-size: 30px; font-weight: bold; color: blue;font-family: monospace;"
                                    colspan="2">SEMESTER 3</td>

                            </tr>
                            <tr>  <td style="font-size: 20px; font-weight: bold; color: red">
                                    STUDENT NAME
                                </td>
                                <td style="font-size: 20px; font-weight: bold; color: red">
                                    MARKS
                                </td>
                            </tr>
                            <tr> <td style="font-weight: bold; font-size: 15px; "><?php echo $studentname3; ?> </td> <td style="font-weight: bold; font-size: 15px;"> <?php echo $maxmarks3; ?> </td></tr> 
                            

                        </table>

                        <table cellspacig="20"  style="margin-top: 50px;">
                              <tr>
                                <td style="font-size: 30px; font-weight: bold; color: blue;font-family: monospace;"
                                    colspan="2">SEMESTER 4</td>

                            </tr>
                            <tr>  <td style="font-size: 20px; font-weight: bold; color: red">
                                    STUDENT NAME
                                </td>
                                <td style="font-size: 20px; font-weight: bold; color: red">
                                    MARKS
                                </td>
                            </tr>
                            <tr> <td style="font-weight: bold; font-size: 15px; "><?php echo $studentname4; ?> </td> <td style="font-weight: bold; font-size: 15px;"> <?php echo $maxmarks4; ?> </td></tr> 
                            

                        </table>

                        <table cellspacig="20"  style="margin-top: 50px;">
                              <tr>
                                <td style="font-size: 30px; font-weight: bold; color: blue;font-family: monospace;"
                                    colspan="2">SEMESTER 5</td>

                            </tr>
                            <tr>  <td style="font-size: 20px; font-weight: bold; color: red">
                                    STUDENT NAME
                                </td>
                                <td style="font-size: 20px; font-weight: bold; color: red">
                                    MARKS
                                </td>
                            </tr>
                            <tr> <td style="font-weight: bold; font-size: 15px; "><?php echo $studentname5; ?> </td> <td style="font-weight: bold; font-size: 15px;"> <?php echo $maxmarks5; ?> </td></tr> 
                            

                        </table>

                        <table cellspacig="20"  style="margin-top: 50px;">
                               <tr>
                                <td style="font-size: 30px; font-weight: bold; color: blue;font-family: monospace;"
                                    colspan="2">SEMESTER 6</td>

                            </tr>
                            <tr>  <td style="font-size: 20px; font-weight: bold; color: red">
                                    STUDENT NAME
                                </td>
                                <td style="font-size: 20px; font-weight: bold; color: red">
                                    MARKS
                                </td>
                            </tr>
                            <tr> <td style="font-weight: bold; font-size: 15px; "><?php echo $studentname6; ?> </td> <td style="font-weight: bold; font-size: 15px;"> <?php echo $maxmarks6; ?> </td></tr> 
                            

                        </table>
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