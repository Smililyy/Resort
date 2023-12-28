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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


	<!-- End Of Boostrap  -->
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!--My custom css -->
	<link rel="stylesheet" href="../../../assets/css/ad-customer.css">
	<title>Manage</title>
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
					<i class='bx bxs-user'></i>
					<span class="text">Customer</span>
				</a>
			</li>
			<li class="menu-item" data-content="room">
				<a href="#">
					<i class='bx bxs-bed'></i>
					<span class="text">Room</span>
				</a>
			</li>
			<li class="menu-item" data-content="booking">
				<a href="#">
					<i class='bx bxs-calendar-check'></i>
					<span class="text">Booking</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
			<li class="menu-item" data-content="setting">
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
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
					<a href="#" class="btn-download" style="margin-bottom: 10px">
						<i class='bx bxs-cloud-download'></i>
						<span class="text">Download PDF</span>
					</a>
				</div>
				<div class="status-container" style="display: flex; align-items: center; width: 90%; height: 100px; margin-left: 10px;margin-top: 10px">
					<div id="totalBookings" style="width:40%;height:100%"></div>
					<div id="totalAmount"style="width:40%;height:100%"></div>
				</div>
				<div class="chart">
					<canvas id="myChart" width="400" height="400"></canvas>
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
				<div id = sort_customer_data>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th><a class="column_sortcustomer" id="customerFirstName" data-order="desc" href="#">First Name<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortcustomer" id="customerLastName" data-order="desc" href="#">Last Name<i class='bx bx-sort-alt-2'></i></a></th>
								<th>Date of Birth</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody id="customer_data">
						
						</tbody>

					</table>
					<p class="loading">Loading Data</p>
				</div>
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
				<div id="sort_room_data">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th><a class="column_sortroom" id="roomName" data-order="desc" href="#">Room Name<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortroom" id="roomType" data-order="desc" href="#">Room Type<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortroom" id="roomRate" data-order="desc" href="#">Room Rate<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortroom" id="roomStatus" data-order="desc" href="#">Room Status<i class='bx bx-sort-alt-2'></i></a></th>
							</tr>
						</thead>
						<tbody id="room_data">
							
						</tbody>
					</table>
				</div>
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
				<div id="sort_booking_data">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th><a class="column_sortbooking" id="roomID" data-order="desc" href="#">Room ID<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="checkinDate" data-order="desc" href="#">Check In Date<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="checkOutDate" data-order="desc" href="#">Check Out Date<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="totalamount" data-order="desc" href="#">Total Amount<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="paymentStatus" data-order="desc" href="#">Payment Status<i class='bx bx-sort-alt-2'></i></a></th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="booking_data">
							
						</tbody>
					</table>
				</div>
			</div>
			
			<div id="setting" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Settings</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Settings</a>
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
				<div class="card">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0">General settings</h5>
							<button type="button" class="btn btn-dark shadow-none btn-small" data-bs-toggle="modal" data-bs-target="#general-s">
								<i class="bi bi-pencil-square">Edit</i>
							</button>
						</div>
						<h6 class="card-subtitle mb-1 fw-bold">Card subtitle</h6>
						<p class="card-text" id="side_title"></p>
						<h6 class="card-subtitle mb-1 fw-bold">Card subtitle</h6>
						<p class="card-text" id="side_about">content</p>
					</div>
				</div>
				<div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<form>
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="mb-3">
										<label class="form-lable">Side Title</label>
										<input type="text" id="side_title_inp" name="side_title" class="form-control shadow-none">Side Title</input>
									</div>
									<div class="mb-3">
										<label class="form-lable">Address</label>
										<textarea name="side_about" id="side_about_inp" class="form-control shadow-none" rows="6"></textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" onclick="side_title.value = general_data.site_title, side_about.value = general_data.side_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
									<button type="button" onclick="upd_general(side_title.value, side_about.value)" class="btn custome-bg text-green shadow-none">SUBMIT</button>
								</div>
							</div>
						</form>
					</div>
				</div>
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
				<div class="modal-body add_customer">
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
						<input type="text" id="dob_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" id="email_input" class="form-control" required>
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
				<div class="modal-body add_room">
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
						<input type="text" id="roomstatus_input" class="form-control" required>
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
				<div class="modal-body add_booking">
					<div class="form-group">
						<label>Customer ID</label>
						<input type="text" id="customerID_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Room ID</label>
						<input type="text" id="roomid_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Check In Date</label>
						<input type="text" id="checkout_input" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Check Out Date</label>
						<input type="text" id="checkin_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Payment Status</label>
						<input type="text" id="paymentstatus_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Number of Guest</label>
						<input type="text" id="guests_input" class="form-control">
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
				<div class="modal-body edit_employee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Date of Birth</label>
						<input type="text" id="dob_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" id="phone_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address_input"></textarea>
					</div>
					<input type="hidden" id="customer_id">
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
					<h4 class="modal-title">Edit Room</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body edit_employee">
					<div class="form-group">
						<label>Room Name</label>
						<input type="text" id="roomname_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Room Type</label>
						<input type="text" id="roomtype_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Room Rate</label>
						<input type="number" id="rate_input" min="10" class="form-control">
					</div>
					<div class="form-group">
						<label>Room Status</label>
						<input type="text" id="roomstatus_input" class="form-control">
					</div>
					<input type="hidden" id="room_id">
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
				<div class="modal-body edit_employee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Room ID</label>
						<input type="text" id="roomid_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Check In Date</label>
						<input type="text" id="checkout_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Check Out Date</label>
						<input type="text" id="checkin_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Payment Status</label>
						<input type="text" id="paymentstatus_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Number of Guest</label>
						<input type="text" id="guests_input" class="form-control">
					</div>
					<div class="form-group">
						<label>Total Amount</label>
						<input type="text" id="total_input" class="form-control" readonly>
					</div>
					<input type="hidden" id="booking_id">
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
					<h4 class="modal-title">View Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body view_employee">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="firstname_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Date of Birth</label>
						<input type="text" id="dob_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" id="phone_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address_input" readonly></textarea>
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
						<input type="text" id="roomname_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Room Type</label>
						<input type="text" id="roomtype_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Room Rate</label>
						<input type="number" id="rate_input" min="10" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Room Status</label>
						<input type="email" id="roomstatus_input" class="form-control" readonly>
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
						<input type="text" id="firstname_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lastname_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Room ID</label>
						<input type="text" id="roomid_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Check In Date</label>
						<input type="text" id="checkout_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Check Out Date</label>
						<input type="text" id="checkin_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Payment Status</label>
						<input type="text" id="paymentstatus_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Number of Guest</label>
						<input type="text" id="guests_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Total Amount</label>
						<input type="text" id="total_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Message</label>
						<textarea class="form-control" id="message_input" readonly></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteCustomerModal" class="modal fade">
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
	<div id="deleteRoomModal" class="modal fade">
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
	<div id="deleteBookingModal" class="modal fade">
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
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Fetch data from the server-side script
        $.ajax({
            url: '../models/Dashboard.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Display the total number of bookings and total amount
                $('#totalBookings').text('Total Bookings: ' + data.totalBookings);
                $('#totalAmount').text('Total Amount: $' + data.totalAmount.toFixed(2));
            },
            error: function (error) {
                console.log('Error fetching data: ' + error);
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Fetch data from the server-side script
        $.ajax({
            url: '../models/DashboardChart.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Use Chart.js to create a line chart
                var months = data.map(item => item.month);
                var bookings = data.map(item => item.totalBookings);

                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Total Bookings per Month',
                            data: bookings,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            }
                        }
                    }
                });
            },
            error: function (error) {
                console.log('Error fetching data: ' + error);
            }
        });
    });
</script>

<?php
include '../controllers/DashboardController.php';


// Convert the data to JSON format
$data = [
    "bookings" => $bookingData,
    "customers" => $customerData,
    "rooms" => $roomData,
];

echo json_encode($data);
?>

	
    <script>
        // Use JavaScript to fetch data from the server and update the HTML
        fetch('../controllers/DashboardController.php')
            .then(response => response.json())
            .then(data => {
                // Handle booking data and update HTML
                document.getElementById('booking_data').innerHTML = formatBookingData(data.bookings);
                // Handle customer data and update HTML
                document.getElementById('customer_data').innerHTML = formatCustomerData(data.customers);
                // Handle room data and update HTML
                document.getElementById('room_data').innerHTML = formatRoomData(data.rooms);
            })
            .catch(error => console.error('Error fetching data:', error));

        // Function to format booking data as HTML
        function formatBookingData(data) {
            let output = '<h2>Booking Data</h2>';
            data.forEach(row => {
                output += '<div>';
                output += `<p><strong>Booking ID:</strong> ${row.bookingID}</p>`;
                output += `<p><strong>Customer ID:</strong> ${row.customerID}</p>`;
                output += `<p><strong>Room ID:</strong> ${row.roomID}</p>`;
                output += `<p><strong>Check-in Date:</strong> ${row.checkinDate}</p>`;
                output += `<p><strong>Check-out Date:</strong> ${row.checkOutDate}</p>`;
                output += `<p><strong>Total Amount:</strong> ${row.totalAmount}</p>`;
                output += `<p><strong>Payment Status:</strong> ${row.paymentStatus}</p>`;
                output += `<p><strong>Number of Customers:</strong> ${row.numberOfCustomer}</p>`;
                output += `<p><strong>Message:</strong> ${row.message}</p>`;
                // Add other fields as needed
                output += '</div>';
            });
            return output;
        }

        // Function to format customer data as HTML
        function formatCustomerData(data) {
            let output = '<h2>Customer Data</h2>';
            data.forEach(row => {
                output += '<div>';
                output += `<p><strong>Customer ID:</strong> ${row.customerID}</p>`;
                output += `<p><strong>First Name:</strong> ${row.customerFirstName}</p>`;
                output += `<p><strong>Last Name:</strong> ${row.customerLastName}</p>`;
                output += `<p><strong>Date of Birth:</strong> ${row.customerDob}</p>`;
                output += `<p><strong>Email:</strong> ${row.customerEmail}</p>`;
                output += `<p><strong>Phone Number:</strong> ${row.customerPhoneNumber}</p>`;
                output += `<p><strong>Address:</strong> ${row.customerAddress}</p>`;
                // Add other fields as needed
                output += '</div>';
            });
            return output;
        }

        // Function to format room data as HTML
        function formatRoomData(data) {
            let output = '<h2>Room Data</h2>';
            data.forEach(row => {
                output += '<div>';
                output += `<p><strong>Room ID:</strong> ${row.roomID}</p>`;
                output += `<p><strong>Room Name:</strong> ${row.roomName}</p>`;
                output += `<p><strong>Room Type:</strong> ${row.roomType}</p>`;
                output += `<p><strong>Room Rate:</strong> ${row.roomRate}</p>`;
                output += `<p><strong>Room Status:</strong> ${row.roomStatus}</p>`;
                // Add other fields as needed
                output += '</div>';
            });
            return output;
        }
    </script>

