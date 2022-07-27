<?php
include "../db/dbcon.php";
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Fuel Form</title>
<style type="text/css">
     .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
                float: right;
            }
</style>
            </head>
            <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="../dist/img/logo_swisscontact.svg" style="width: 100%; max-width: 200px" />
                                </td>

                            <!--    <td>
                                    Invoice #: 123<br />
                                    Created: January 1, 2015<br />
                                    Due: February 1, 2015
                                </td> -->
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <center><h4><b>
                                    Fuel Requisition Form
                                </b></h4></center>

                            <!--    <td>
                                    Acme Corp.<br />
                                    John Doe<br />
                                    john@example.com
                                </td> -->
                            </br>
                        </br>
                            </tr>
                        </table>
                    </td>
                </tr>

<?php

$userid = $_POST['userid'];

$sql = "SELECT * FROM fuel_forms 
    INNER JOIN vehicle_no ON fuel_forms.vehicle_id = vehicle_no.vehicle_id
    INNER JOIN drivers ON fuel_forms.driver_id = drivers.driver_id
    INNER JOIN projects ON fuel_forms.project_id = projects.project_id 
    INNER JOIN recommender ON fuel_forms.recommender_id = recommender.recommender_id 
    INNER JOIN approver ON fuel_forms.approver_id = approver.approver_id WHERE id = '$userid'";
$result = mysqli_query($link,$sql);

$response = "";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $car_no = $row['vehicle_num'];
    $dr_name= $row['driver_name'];
    $project = $row['project_name'];
    $cr = $row['current_reading'];
    $pr = $row['previous_reading'];
    $qty = $row['current_quantity'];
    $vendor = $row['fuel_vendor'];
    $pd = $row['last_date'];
    $pd = date( "d/M/Y", strtotime($pd));
    $ct = $row['cur_date'];
    $ct = date( "d/m/Y", strtotime($ct));
    $r_name = $row['r_name'];
    $a_name = $row['a_name'];
    $memo = $row['memo_no'];

    
    $response .= "<tr>";
    $response .= "<td>Name of Driver</td>";
    $response .= "<td>".$dr_name."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Vehicle No.</td>";
    $response .= "<td>".$car_no."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Project</td>";
    $response .= "<td>".$project."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Fuel Quantity (Liter)</td>";
    $response .= "<td>".$qty."L</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Previous Fuel Filling Meter Reading and Date</td>";
    $response .= "<td>".$pr." on ".$pd."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Current Fuel Filling Meter Reading and Date</td>";
    $response .= "<td>".$cr." on ".$ct."</td>";
    $response .= "</tr>";

    $response .= "<tr class=\"item\">";
    $response .= "<td>Memo Number</td>";
    $response .= "<td>".$memo."</td>";
    $response .= "</tr>";

    $response .= "<tr class=\"item\">";
    $response .= "<td>Fuel Vendor</td>";
    $response .= "<td>".$vendor."</td>";
    $response .= "</tr>";
    
    $response .= "<tr class=\"item last\">";
    $response .= "<td>Recommender</td>";
    $response .= "<td>".$r_name."</td>";
    $response .= "</tr>";

    $response .= "<tr class=\"item last\">";
    $response .= "<td>Approver</td>";
    $response .= "<td>".$a_name."</td>";
    $response .= "</tr>";

}
$response .= "</table>";

echo $response;
exit;