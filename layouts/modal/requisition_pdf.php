<?php
require_once('../class/main.php');
$obj = new Model;

//Show table data
//$view = $obj->show_data();

//Edit customer record
 if(isset($_GET['userId']) && !empty($_GET['userId'])) {
      $userId= $_GET['userId'];
      $data= $obj->print_requisition_data($userId);
  }

//$userid = $_GET['userid'];

?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Vehicle requisition</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				/*border: 1px solid #eee;*/
				/*box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);*/
				font-size: 13px;
				line-height: 22px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #000000;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
				float: right;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				/*background: #eee;*/
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.try td {
				/*background: #eee;*/
		/*		border-bottom: 1px solid #ddd;*/
				font-weight: bold;
				padding-top: 200px;
				vertical-align:top;

			}

			.invoice-box table tr.r td {
				/*background: #eee;*/
		/*		border-bottom: 1px solid #ddd;*/
				font-weight: bold;

				float: right;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			/*.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}*/

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.request{
	
				    /* border: teal 1px solid; */
				    position: absolute;
				    padding-top: 650px;
				    padding-bottom: 50px;
				    font-size: 13px;
				    line-height: normal;

			}

			.recommend{

				   /*  border: teal 1px solid; */
				    position: absolute;
				    padding-top: 650px;
				    padding-bottom: 50px;
				    padding-left: 180px;
				    font-size: 13px;
				    line-height: normal;
			}

			.approved{

				   /*  border: teal 1px solid; */
				    position: absolute;
				    padding-top: 650px;
				    padding-bottom: 50px;
				    padding-left: 500px;
				    font-size: 13px;
				    line-height: normal;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

			p.solid {border-style: solid;}
		</style>
	</head>

	<body>
		<div class="invoice-box">
	<!-- 	<div>
			<input id="printpagebutton" type="button" value="print" onclick="printpage()"/>
			</div> -->
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="../../dist/img/logo_swisscontact.svg" style="width: 100%; max-width: 200px"/>
								</td>

							<!-- 	<td>
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
								<center><h2><b>
							Vehicle Requisition Form
								</b></h2></center>

							<!-- 	<td>
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

			<!-- 	<tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr> -->

			<!-- 	<tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr> -->

				<!-- <tr class="heading">
					<td>Name of Driver</td>

					<td>Price</td>
				</tr> -->

				<tr class="item">
					<td>Name of Driver:</td>
					
					<td><?php echo $data['driver_name'] ?></td>
				
				</tr>

				<tr class="item">
					<td>Vehicle Number:</td>
					<td><?php echo $data['vehicle_num'] ?></td>
			
				</tr>

				<tr class="item">
					<td>Project:</td>

					<td><?php echo $data['project_name'] ?></td>
			
				</tr>


				<tr class="item">
					<td>Required Items:</td>

					<td><p><?php 
					$problem = str_replace(",","<br>",$data['remarks']);
					echo "<b>" .$problem . "<b>" ?></p></td>
				
				</tr>

				<!-- <tr class="total">
					<td></td>

					<td>Total: $385.00</td>
				</tr> -->


<div class="request">
	<h4>Requested By</h4>
	<p>Signature</p><br/>
	<p>Name: <?php echo $data['driver_name'] ?></p>
	<p>Designation: Driver</p>
	<p>Date:</p>
</div>

<div class="recommend">
	<h4>Recommended By</h4>
	<p>Signature</p><br/>
	<p>Name: <?php echo $data['r_name'] ?></p>
	<p>Designation: <?php echo $data['designation'] ?></p>
	<p>Date:</p>
</div>

<div class="approved">
	<h4>Approved By</h4>
	<p>Signature</p><br/>
	<p>Name: <?php echo $data['a_name'] ?></p>
	<p>Designation: <?php echo $data['a_designation'] ?></p>
	<p>Date:</p>
</div>



			</table>
		</div>

	</body>

<!-- 	<script type="text/javascript">
		  function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
	</script> -->

<script>
    (function(){
        window.print();
        setTimeout(function(){
            window.close()
        },500)
    })();
</script>
</html>
