<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template 13</title>
        <meta name="description" content="A description of your website">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        <link href="css/viewstaff.css" rel="stylesheet" type="text/css">
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

                <table cellspacing="20" width="90%" style="margin-top: 40px;margin-left: 30px;">
                    <thead>
                        <tr>
                            <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">STAFFNAME</td>
                            <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">ADDRESS
                            </td>
                            <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">MOBILENO
                            </td>
                            <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">DESIGNATION</td>
                            <td style="color: #990000; font-size: 25px; font-weight: bold;font-family: monospace">EMAILID</td>
                        </tr>
                    </thead>
                    <?php
                    $query = "SELECT * FROM staffs";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['staffid'];
                            $staffname = $row['staffname'];
                            $address = $row['address'];
                            $mobileno = $row['mobno'];
                            $designation = $row['designation'];
                            $emailid = $row['email'];
                            ?>

                            <tr>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $staffname; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $address; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $mobileno; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $designation; ?></td>
                                <td style="color: green; font-size: 15px;font-weight: bold;"><?php echo $emailid; ?></td>
                                <td><a href="editstaffs.php?edit_id=<?php echo $id; ?>"
                                       style="color: #5E33FF; font-size: 15px;">Edit</a></td>
                                <td><a href="viewstaffs.php?delete_id=<?php echo $id; ?>"
                                       style="color: #5E33FF; font-size: 15px;">Delete</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <div style=" font-family: monospace; font-weight: bold; font-size: 25px; margin-left: 200px; margin-top: 40px; color: #990000 "> NO STAFFS ADDED </div>
                        <?php
                    }
                    ?>
                </table>
                <?php
                if (isset($_REQUEST['delete_id'])) {
                    $id = $_REQUEST['delete_id'];
                    $query = "delete from staffs where staffid = $id";
                    //echo $query;
                    if ($conn->query($query) === TRUE) {
                        ?>
                        <script type = "text/javascript">
                            alert("Staff Details Has been Sucessfully Deleted");
                            window.location.href = "viewstaffs.php";
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert("Staff Details Has Not been Deleted");
                            window.location.href = "viewstaffs.php";
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