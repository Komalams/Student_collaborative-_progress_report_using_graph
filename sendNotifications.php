<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/subjects.css" rel="stylesheet" type="text/css">
        <script src="js/viewstaffprogress.js" type="text/javascript"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </head>
    <body>
        <div id="wrapper"> 
            <div id="header">
                <div class="banner_img">
                </div>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="managestaffmarks.php" style="font-weight: bold;"> MARKS</a></li>
                    <li><a href="viewstaffprogress.php" style="font-weight: bold;">VIEW PROGRESS</a></li>
                    <li><a href="index.php" style="font-weight: bold;">LOGOUT</a></li>
                </ul>
            </div>
            <div class="right_side_bar"> 
            </div>    
            <div id="page_content">
                <?php
                include './db.php';
                session_start();
                $staffid = $_SESSION['staffid'];
                ?>
                 <table style="margin: auto; margin-top: 30px; " cellspacing="20">
                    <tr>
                        <td style="font-size: 30px; font-family: monospace; font-weight: bold; color: #990000"> SELECT EXAM TYPE </td>
                        <td><select id="iatype" name="iatype"
                                    style="height: 25px; font-weight: bold; width: 100px;" onchange="iachange();">
                                <option value="">----- select------</option>
                                <?php
                                $selectedIA = 0;
                                if (isset($_REQUEST['iatype'])) {
                                    $selectedIA = $_REQUEST['iatype'];
                                }
                                for ($i = 1; $i <= 3; $i++) {
                                    if ($selectedIA == $i) {
                                        ?>
                                        <option value="<?php echo $i ?>" selected="selected"><?php echo $i ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td> </tr> 
                </table>
                <?php
                if (isset($_REQUEST['iatype'])) {
                    $subjlectid = 0;
                    $query = "SELECT * FROM marks INNER JOIN subjectlecture ON marks.subjectlectureid = subjectlecture.subjectlectureid INNER JOIN SUBJECT ON subjectlecture.subjectid = subject.subjectid  WHERE regno = '$regno' AND iatype = $selectedIA";
                    //echo $query;
                    $result = $conn->query($query);
                    $i = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $subject[$i] = $row['subjectname'];
                            $marks[$i] = $row['marks'];
                            $i++;
                            //echo $regno . $marks;
                        }
                    } else {
                        ?>
                        <div style="margin-left: 300px; margin-top: 150px; font-weight: bold; font-family: monospace; font-size: 20px; color: #990000"> NO MARKS HAS BEEN UPDATED FOR THIS SUBJECT </div>
                        <?php
                    }
                } else {
                    ?>
                    <div style="margin-left: 300px; margin-top: 150px; font-weight: bold; font-family: monospace; font-size: 20px; color: #990000"> SELECT SEMESTER TO VIEW DETAILS </div>
                    <?php
                }
                ?>
                <div id="chartContainer"
                     style="height: 370px; width: 80%; margin-left: 80px; margin-top: 50px;"></div>
                <div class="clear"></div>
                <!--start footer from here-->
                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>