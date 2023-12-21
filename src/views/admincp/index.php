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
			<li class="menu-item" data-content="settings">
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
                    </tbody>
                </table>
                <p class="loading">Loading Data</p>
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
		let general_data;

		function get_general() {
			let side_title = document.getElementById("side_title");
			let side_about = document.getElementById("side_about");

			let side_title_inp = document.getElementById("side_title_inp");
			let side_about_inp = document.getElementById("side_about_inp");
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				general_data = JSON.parse(this.responseText);

				side_title.innerText = general_data.side_title;
				side_about.innerText = general_data.side_about;

				side_title_inp.value = general_data.side_title;
				side_about_inp.value = general_data.side_about;
			}
			xhr.send('get_general');
		}

		function upd_general(side_title_val, side_about_val) {
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				console.log(this.responseText);
				var myModal = document.getElementById('general-s');
				var modal = document.Modal.getInstance(myModal);
				modal.hide();
			}
			xhr.send('site_title = ' + side_title_val + '&site_about = ' + side_about_val + '&upd_general');
		}

		window.onload = function() {
			get_general();
		}
	</script>


</body>

</html>