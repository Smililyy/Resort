<?php
require('../../controllers/AdminController.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Start Of Boostrap  -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<!-- End Of Boostrap  -->
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!--My custom css -->
	<link rel="stylesheet" href="../../../assets/css/ad-customer.css">
	<title>Customer</title>
</head>

<body>
	<!-- Start sidebar -->
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<span><img src="https://saigonhotel.com.vn/wp-content/uploads/2021/10/saigonhotel-logo.svg" alt="" style="width: 250px; margin-top: 30px;"></span>
			<!-- <span class="text">Resort Management</span> -->
		</a>
		<ul class="side-menu top">
			<li class="menu-item active" data-content="dashboard">
				<a href="#">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="menu-item" data-content="customer">
				<a href="#">
					<i class='bx bxs-user-account'></i>
					<span class="text">Customer</span>
				</a>
			</li>
			<li class="menu-item" data-content="room">
				<a href="#">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Room</span>
				</a>
			</li>
			<li class="menu-item" data-content="booking">
				<a href="#">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Booking</span>
				</a>
			</li>
			<li class="menu-item" data-content="employee">
				<a href="#">
					<i class='bx bxs-group'></i>
					<span class="text">Employee</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../../controllers/LogoutController.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../../../assets/img/user.jpg" alt="avatar">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main class="tab-content">
			<div id="dashboard" class="content-item active">
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Dashboard</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="menu-item" href="#">Home</a>
							</li>
						</ul>
					</div>
					<a href="#" class="btn-download">
						<i class='bx bxs-cloud-download'></i>
						<span class="text">Download PDF</span>
					</a>
				</div>
			</div>
			<div id="customer" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Customer Management</h1>
					</div>
					<a href="#addCustomerModal" class="btn-download" data-toggle="modal">
						<i class="material-icons">&#xE147;</i>
						<span>Add New Customer</span>
					</a>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Date of Birth</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="customer_data">
						<!-- Data will be dynamically populated here -->
					</tbody>

					<script>
						// Use jQuery to fetch data from list.php
						$.get('http://localhost:3000/src/controllers/list.php', function(data, status) {
							// Log the received data to the console
							$('#customer_data').html(data);
						});
					</script>

					<!-- <p class="loading">Loading Data</p> -->
			</div>
			<div id="room" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Room Management</h1>
					</div>
					<a href="#addRoomModal" class="btn-download" data-toggle="modal">
						<i class="material-icons">&#xE147;</i>
						<span>Add New Room</span>
					</a>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Room Name</th>
							<th>Room Type</th>
							<th>Room Rate</th>
							<th>Room Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="employee_data">
					</tbody>
				</table>
			</div>
			<div id="booking" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Booking Management</h1>
					</div>
					<a href="#addBookingModal" class="btn-download" data-toggle="modal">
						<i class="material-icons">&#xE147;</i>
						<span>Add New Booking</span>
					</a>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Room ID</th>
							<th>Room Name</th>
							<th>Check In Date</th>
							<th>Check Out Date</th>
							<th>Payment Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="employee_data">
					</tbody>
				</table>
			</div>
			<div id="employee" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Service Management</h1>
					</div>
					<!-- <a href="#addEmployeeModal" class="btn-download" data-toggle="modal">
						<i class="material-icons">&#xE147;</i>
						<span>Add New Customer</span>
					</a> -->
				</div>
				<!-- <table class="table table-striped table-hover">
                    <thead>
                        <tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Date of Birth</th>
							<th>Address</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="employee_data">
                    </tbody>
                </table> -->

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<!-- ADD Modal HTML -->
	<div id="addCustomerModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body add_epmployee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Date of Birth</label>
						<input type="date" id="dob_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" id="phone_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address_input" required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add" onclick="addCustomer()">
				</div>
			</div>
		</div>
	</div>
	<div id="addRoomModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Room</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body add_epmployee">
					<div class="form-group">
						<label>Room Name</label>
						<input type="text" id="roomname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room Type</label>
						<input type="text" id="roomtype_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room Rate</label>
						<input type="number" id="rate_input" min="10" class="form-control">
					</div>
					<div class="form-group">
						<label>Room Status</label>
						<input type="email" id="roomstatus_input" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add" onclick="addRoom()">
				</div>
			</div>
		</div>
	</div>
	<div id="addBookingModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Booking</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body add_epmployee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room ID</label>
						<input type="text" id="roomid_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Check In Date</label>
						<input type="date" id="checkout_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Check Out Date</label>
						<input type="date" id="checkin_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Payment Status</label>
						<input type="text" id="paymentstatus_input" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add" onclick="addBooking()">
				</div>
			</div>
		</div>
	</div>
	<!-- End Add modal -->
	<!-- Edit Modal HTML -->
	<div id="editCustomerModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body edit_epmployee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Date of Birth</label>
						<input type="date" id="dob_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" id="phone_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address_input" required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" onclick="editCustomer()" value="Save">
				</div>
			</div>
		</div>
	</div>
	<div id="editRoomModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body edit_epmployee">
					<div class="form-group">
						<label>Room Name</label>
						<input type="text" id="roomname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room Type</label>
						<input type="text" id="roomtype_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room Rate</label>
						<input type="number" id="rate_input" min="10" class="form-control">
					</div>
					<div class="form-group">
						<label>Room Status</label>
						<input type="email" id="roomstatus_input" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" onclick="editRoom()" value="Save">
				</div>
			</div>
		</div>
	</div>
	<div id="editBookingModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Booking</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body edit_epmployee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room ID</label>
						<input type="text" id="roomid_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Check In Date</label>
						<input type="date" id="checkout_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Check Out Date</label>
						<input type="date" id="checkin_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Payment Status</label>
						<input type="text" id="paymentstatus_input" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" onclick="editBooking()" value="Save">
				</div>
			</div>
		</div>
	</div>
	<!-- End Edit Modal -->
	<!-- View Modal HTML -->
	<div id="viewCustomerModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">View Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="form-group">
					<label>First Name</label>
					<input type="text" id="firstname_input" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" id="lastname_input" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Date of Birth</label>
					<input type="date" id="dob_input" class="form-control">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" id="email_input" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Phone Number</label>
					<input type="text" id="phone_input" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" id="address_input" required></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
			</div>
		</div>
	</div>
	</div>
	<div id="viewRoomModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">View Room</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body view_employee">
					<div class="form-group">
						<label>Room Name</label>
						<input type="text" id="roomname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room Type</label>
						<input type="text" id="roomtype_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room Rate</label>
						<input type="number" id="rate_input" min="10" class="form-control">
					</div>
					<div class="form-group">
						<label>Room Status</label>
						<input type="email" id="roomstatus_input" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<div id="viewBookingModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">View Booking</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body view_employee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Room ID</label>
						<input type="text" id="roomid_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Check In Date</label>
						<input type="date" id="checkout_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Check Out Date</label>
						<input type="date" id="checkin_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Payment Status</label>
						<input type="text" id="paymentstatus_input" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<input type="hidden" id="delete_id">
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" onclick="deleteCustomer()" value="Delete">
				</div>
			</div>
		</div>
	</div>
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Room</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<input type="hidden" id="delete_id">
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" onclick="deleteRoom()" value="Delete">
				</div>
			</div>
		</div>
	</div>
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Booking</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<input type="hidden" id="delete_id">
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" onclick="deleteBooking()" value="Delete">
				</div>
			</div>
		</div>
	</div>
	<?php
	require('./inc/scripts.php');
	?>
	<script>
		// $(document).ready(function() {
		// 	$.get('http://localhost/hotel/src/controllers/list.php', function(data, status) {
		// 		// Log the received data to the console
		// 		$('#customer_data').html(data);
		// 	});

		// });

		let customer_data;

		function get_customer() {
			let ctm_id = document.getElementById("ctm_id");
			let ctm_first_name = document.getElementById("ctm_first_name");
			let ctm_last_name = document.getElementById("ctm_last_name");
			let ctm_dob = document.getElementById("ctm_dob");
			let ctm_email = document.getElementById("ctm_email");
			let ctm_phone_number = document.getElementById("ctm_phone_number");
			let ctm_address = document.getElementById("ctm_address");

			let xhr = new XMLHttpRequest();
			xhr.open("POST", "../../controllers/ajax/customer_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				// general_data = JSON.parse(this.responseText);
				console.log(this.responseText);
				// side_title.innerText = general_data.side_title;
				// side_about.innerText = general_data.side_about;

				// side_title_inp.value = general_data.side_title;
				// side_about_inp.value = general_data.side_about;
			}
			xhr.send('get_customer');
		}

		window.onload = function() {
			get_customer();
		}

		// function CustomerList() {

		// }



		// function addCustomer() {
		//     var customerFirstName = $('.add_epmployee #firstname_input').val();
		//     var customerLastName = $('.add_epmployee #lastname_input').val();
		//     var customerDob = $('.add_epmployee #dob_input').val();
		//     var customerAddress = $('.add_epmployee #email_input').val();
		//     var customerPhoneNumber = $('.add_epmployee #phone_input').val();
		//     var customerEmail = $('.add_epmployee #address_input').val();

		//     $.ajax({
		//         type: 'post',
		//         data: {
		//             customerFirstName: customerFirstName,
		//             customerLastName: customerLastName,
		//             customerDob: customerDob,
		//             customerAddress: customerAddress,
		//             customerPhoneNumber: customerPhoneNumber,
		//             customerEmail: customerEmail,
		//         },
		//         url: "http://localhost/hotel/src/controllers/employee-add.php",
		//         success: function (data) {
		//             var response = JSON.parse(data);
		//             $('#addEmployeeModal').modal('hide');
		//             employeeList();
		//             alert(response.message);
		//         }

		//     })
		// }

		// function editEmployee() {
		//     var name = $('.edit_employee #name_input').val();
		//     var email = $('.edit_employee #email_input').val();
		//     var phone = $('.edit_employee #phone_input').val();
		//     var address = $('.edit_employee #address_input').val();
		//     var employee_id = $('.edit_employee #employee_id').val();

		//     $.ajax({
		//         type: 'post',
		//         data: {
		//             name: name,
		//             email: email,
		//             phone: phone,
		//             address: address,
		//             employee_id: employee_id,
		//         },
		//         url: "employee-edit.php",
		//         success: function (data) {
		//             var response = JSON.parse(data);
		//             $('#editEmployeeModal').modal('hide');
		//             employeeList();
		//             alert(response.message);
		//         }

		//     })
		// }

		// function viewEmployee(id = 2) {
		//     $.ajax({
		//         type: 'get',
		//         data: {
		//             id: id,
		//         },
		//         url: "employee-view.php",
		//         success: function (data) {
		//             var response = JSON.parse(data);
		//             $('.edit_employee #name_input').val(response.name);
		//             $('.edit_employee #email_input').val(response.email);
		//             $('.edit_employee #phone_input').val(response.phone);
		//             $('.edit_employee #address_input').val(response.address);
		//             $('.edit_employee #employee_id').val(response.id);
		//             $('.view_employee #name_input').val(response.name);
		//             $('.view_employee #email_input').val(response.email);
		//             $('.view_employee #phone_input').val(response.phone);
		//             $('.view_employee #address_input').val(response.address);
		//         }
		//     })
		// }

		// function deleteEmployee() {
		//     var id = $('#delete_id').val();
		//     $('#deleteEmployeeModal').modal('hide');
		//     $.ajax({
		//         type: 'get',
		//         data: {
		//             id: id,
		//         },
		//         url: "employee-delete.php",
		//         success: function (data) {
		//             var response = JSON.parse(data);
		//             employeeList();
		//             alert(response.message);
		//         }
		//     })
		// }
	</script>
</body>

</html>