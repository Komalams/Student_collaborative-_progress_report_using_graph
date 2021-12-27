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
                    <tr><td style="font-size: 30px; font-family: monospace; font-weight: bold; color: #990000"> SELECT SEMESTER </td><td><select name="sem" id="sem" style="height: 30px; width: 100px;"
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
                if (isset($_REQUEST['sem'])) {
                    $subjlectid = 0;
                    $query = "SELECT subjectlectureid , subjectname FROM subjectlecture INNER JOIN SUBJECT ON subject.subjectid = subjectlecture.subjectid WHERE staffid = $staffid AND semester = '$sem'";
                    $result = $conn->query($query);
                    if ($row = $result->fetch_assoc()) {
                        $subjlectid = $row['subjectlectureid'];
                        $subjectname = $row['subjectname'];
                        //echo $subjlectid . "- " .  $subjectname . "<br>"; 
                    }
                    $query = "SELECT regno , marks FROM marks WHERE subjectlectureid = $subjlectid and iatype = $selectedIA";
                    //echo $query;
                    $result = $conn->query($query);
                    $i = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $regno[$i] = $row['regno'];
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
                <script type="text/javascript">
                    window.onload = function () {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            theme: "light1", // "light2", "dark1", "dark2"
                            animationEnabled: false, // change to true		
                            title: {
                                text: "STUDENTS PROGRESS"
                            },
                            data: [
                                {
                                    // Change type to "bar", "area", "spline", "pie",etc.
                                    type: "column",
                                    dataPoints: [
<?php
for ($i = 0; $i < sizeof($regno); $i++) {
    ?>
                                            {label: "<?php echo $regno[$i] ?>", y: <?php echo $marks[$i] ?>},
    <?php
}
?>

                                    ]
                                }
                            ]
                        });
                        chart.render();

                    }
                </script>
                <div id="chartContainer"
                     style="height: 370px; width: 80%; margin-left: 80px; margin-top: 50px;"></div>
                <div class="clear"></div>
                <!--start footer from here-->
                <!--/. end footer from here--> 
            </div>
        </div>
    </body></html>