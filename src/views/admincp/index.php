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
	<script src="https://unpkg.com/phosphor-icons"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../../../assets/js/auth.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<!-- End Of Boostrap  -->
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!--My custom css -->
	<link rel="stylesheet" href="../../../assets/css/ad-customer.css">
	<title>Admin control panel</title>
	<style>
		.custom-alert {
			position: fixed;
			top: 80px;
			right: 25px;
			z-index: 1009;
			width: 17%;
			padding-right: 10px;
		}

		.close {
			background: transparent;
			border: none;
			width: -37%;
			line-height: 0;
		}

		.close span {
			font-size: 24px;
			margin-left: 10px;
			line-height: 0;
		}

		.modal-lg {
			max-width: 800px !important;
		}
	</style>
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
			<li class="menu-item" data-content="invoice">
				<a href="#">
					<i class='bx bxs-receipt'></i>
					<span class="text">Invoice</span>
				</a>
			</li>
			<li class="menu-item" data-content="message">
				<a href="#">
					<i class='bx bxs-chat'></i>
					<span class="text">Message</span>
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
					<a href="#" class="btn-download">
						<i class='bx bxs-cloud-download'></i>
						<span class="text">Download PDF</span>
					</a>
				</div>
				<div class="main__body">
					<ul class="main__body__box-info">
						<li>
							<i class='bx bxs-wallet'></i>
							<h5>$823</h5>
							<p>Revenue</p>
						</li>
						<li>
							<i class='bx bxs-calendar-check'></i>
							<h5>23</h5>
							<p>Booking</p>
						</li>
						<li>
							<i class="ph-users-fill"></i>
							<h5>55</h5>
							<p>Customers</p>
						</li>
					</ul>
					<div class="main__body__data">
						<div class="sales-summary">
							<div class="sales-summary__top">
								<h4>Revenue Summary</h4>
								<div class="sales-summary__menu">
									<i class="ph-dots-three-outline-vertical-fill"></i>
									<ul class="menu">
										<li>
											<a href="#">Edit</a>
										</li>
										<li>
											<a href="#">Remove</a>
										</li>
									</ul>
								</div>
							</div>
							<ul class="sales-summary__info">
								<li>
									<p>Avg. Room</p>
									<h5>$76</h5>
								</li>
								<li>
									<p>Avg.Meeting&Event </p>
									<h5>$76</h5>
								</li>
								<li>
									<p>Avg. Revenue</p>
									<h5>$76</h5>
								</li>
								<li>
									<p>Avg. customer</p>
									<h5>$76</h5>
								</li>
							</ul>
							<div id="chart"></div>
						</div>
					</div>
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
				<div id=sort_customer_data>
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
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="customer_data">
							<!-- Data will be dynamically populated here -->
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
								<th>Action</th>
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
								<th><a class="column_sortbooking" id="roomName" data-order="desc" href="#">Room Name<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="checkinDate" data-order="desc" href="#">Check In Date<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="checkOutDate" data-order="desc" href="#">Check Out Date<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="paymentStatus" data-order="desc" href="#">Payment Status<i class='bx bx-sort-alt-2'></i></a></th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="booking_data">
						</tbody>
					</table>
				</div>
			</div>
			<div id="invoice" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Invoice</h1>
					</div>
					<a href="#addInvoiceModal" class="btn-download" data-toggle="modal">
						<i class='bx bxs-cloud-download'></i>
						<span class="text">Print Invoice</span>
					</a>
					<!-- <a href="#addEmployeeModal" class="btn-download" data-toggle="modal">
						<i class="material-icons">&#xE147;</i>
						<span>Add New Customer</span>
					</a> -->
				</div>
				<div id="sort_invoice_data">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Check</th>
								<th>ID</th>
								<th><a class="column_sortbooking" id="bookingID" data-order="desc" href="#">Booking ID<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="paymentDate" data-order="desc" href="#">Payment Date<i class='bx bx-sort-alt-2'></i></a></th>
								<th><a class="column_sortbooking" id="ammount" data-order="desc" href="#">Ammount<i class='bx bx-sort-alt-2'></i></a></th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="invoice_data">
						</tbody>
					</table>
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
			<div id="message" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Message Management</h1>
					</div>
					<!-- <a href="#addBookingModal" class="btn-download" data-toggle="modal">
						<i class="material-icons">&#xE147;</i>
						<span>Add New Booking</span>
					</a> -->
				</div>
				<div id="sort_message_data">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Sender</th>
								<th>Subject</th>
								<th>Content</th>
								<th>Timestamp</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="message_data">
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

				<!-- General settings section -->
				<div class="card border-0 shadow-sm mb-4">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0 fw-bold">General settings</h5>
							<button type="button" class="btn btn-dark shadow-none btn-small" data-bs-toggle="modal" data-bs-target="#general-s">
								<i class="bi bi-pencil-square">Edit</i>
							</button>
						</div>
						<h6 class="card-subtitle mb-1 fw-bold">Form submit Title</h6>
						<p class="card-text" id="side_title"></p>
						<h6 class="card-subtitle mb-1 fw-bold">Form Submit Content</h6>
						<p class="card-text" id="side_about">content</p>
					</div>
				</div>

				<!-- General settings modal -->
				<div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<form id="general_s_form">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="staticBackdropLabel">General Settings</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="mb-3">
										<label class="form-lable fw-bold">Submit Title</label>
										<input name="side_title" type="text" id="side_title_inp" class="form-control shadow-none" require></input>
									</div>
									<div class="mb-3">
										<label class="form-lable fw-bold">Content</label>
										<textarea name="side_about" id="side_about_inp" class="form-control shadow-none" rows="6" require></textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" onclick="side_title.value = general_data.side_title, side_about.value = general_data.side_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
									<button type="submit" class="btn custome-bg text-green shadow-none" data-bs-dismiss="modal">SUBMIT</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- Shutdown section -->
				<div class="card border-0 shadow-sm mb-4">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0 fw-bold">Shutdown Website</h5>
							<div class="form-check form-switch">
								<form>
									<input onchange="upd_shutdown(this.value)" class="form-check-input" role="switch" type="checkbox" id="shutdown-toogle">
								</form>

							</div>
						</div>
						<p class="card-text">
							No customer will be allowed to make bookings for all website services, when shutdown mode ís turned on.
						</p>
					</div>
				</div>

				<!-- Contact details section -->
				<div class="card border-0 shadow mb-4">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0 fw-bold">Contacts Settings</h5>
							<button type="button" class="btn btn-dark shadow-none btn-small" data-bs-toggle="modal" data-bs-target="#contacts-s">
								<i class="bi bi-pencil-square">Edit</i>
							</button>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-4">
									<h6 class="card-subtitle mb-1 fw-bold">Address</h6>
									<p class="card-text" id="address"></p>
								</div>
								<div class="mb-4">
									<h6 class="card-subtitle mb-1 fw-bold">Website</h6>
									<p class="card-text" id="website"></p>
								</div>
								<div class="mb-4">
									<h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
									<p class="card-text mb-1">
										<i class="bi bi-telephone-fill"></i>
										<span id="pn1"></span>
									</p>
									<p class="card-text">
										<i class="bi bi-telephone-fill"></i>
										<span id="pn2"></span>
									</p>
								</div>
								<div class="mb-4">
									<h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
									<p class="card-text" id="email"> </p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-4">
									<h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
									<p class="card-text mb-1">
										<img data-lazyloaded="1" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/facebook.png" class="alignnone wp-image-3205 size-full litespeed-loaded" data-src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/facebook.png" alt="" width="27" height="27" data-was-processed="true">
										<span id="fb"></span>
									</p>
									<p class="card-text">
										<img data-lazyloaded="1" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/tripadvisor-ico.png" class="alignnone wp-image-3204 size-full litespeed-loaded" data-src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/tripadvisor-ico.png" alt="" width="30" height="30" data-was-processed="true">
										<span id="tpv"></span>
									</p>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- Contact details modal -->
				<div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<form id="contacts_s_form">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-lable fw-bold">Address</label>
													<input name="address" type="text" id="address_inp" class="form-control shadow-none" require></input>
												</div>
												<div class="mb-3">
													<label class="form-lable fw-bold">Website Link</label>
													<input name="website" type="text" id="website_inp" class="form-control shadow-none" require></input>
												</div>
												<div class="mb-3">
													<label class="form-lable fw-bold">Phone Numbers (with contry code)</label>
													<div class="input-group mb-3">
														<span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
														<input type="text" name="pn1" id="pn1_inp" class="form-control shadow-none" require>
													</div>
													<div class="input-group mb-3">
														<span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
														<input type="text" name="pn2" id="pn2_inp" class="form-control shadow-none" require>
													</div>
												</div>
												<div class="mb-3">
													<label class="form-lable fw-bold">Email</label>
													<input name="email" type="text" id="email_inp" class="form-control shadow-none" require></input>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-lable fw-bold">Social Links</label>
													<div class="input-group mb-3">
														<span class="input-group-text">
															<img data-lazyloaded="1" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/facebook.png" class="alignnone wp-image-3205 size-full litespeed-loaded" data-src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/facebook.png" alt="" width="27" height="27" data-was-processed="true">
														</span>
														<input type="text" name="fb" id="fb_inp" class="form-control shadow-none" require>
													</div>
													<div class="input-group mb-3">
														<span class="input-group-text">
															<img data-lazyloaded="1" src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/tripadvisor-ico.png" class="alignnone wp-image-3204 size-full litespeed-loaded" data-src="https://saigonhotel.com.vn/wp-content/uploads/2019/05/tripadvisor-ico.png" alt="" width="30" height="30" data-was-processed="true">
														</span>
														<input type="text" name="tpv" id="tpv_inp" class="form-control shadow-none" require>
													</div>
												</div>
											</div>
										</div>
									</div>


								</div>
								<div class="modal-footer">
									<button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
									<button type="submit" class="btn custome-bg text-green shadow-none" data-bs-dismiss="modal">SUBMIT</button>
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
	<div id="sendModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Send message</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body add_room">
					<div class="form-group">
						<label>Recipient</label>
						<input type="text" id="sender_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Subject</label>
						<input type="text" id="subject_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Content</label>
						<textarea class="form-control" id="content_input" readonly></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add" onclick="sendMessage()">
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
	<div id="viewMessageModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">View Message</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body view_employee">
					<div class="form-group">
						<label>Timestamp</label>
						<input type="date" id="timestamp_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Sender</label>
						<input type="text" id="sender_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Subject</label>
						<input type="text" id="subject_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Content</label>
						<textarea class="form-control" id="content_input" readonly></textarea>
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
	<div id="viewInvoiceModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">View Invoice</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body view_employee">
					<div class="form-group">
						<label>ID</label>
						<input type="text" id="invoiceid_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Booking ID</label>
						<input type="text" id="bookingid_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Payment Date</label>
						<input type="text" id="paymentdate_input" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Ammount</label>
						<input type="email" id="ammount_input" class="form-control" readonly>
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

	<!-- PRINT INVOICE MODAL HTML -->
	<div id="viewInvoice" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Invoice</h2>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<div class="invoice-title">
								<h3 class="pull-right">Order # 12345</h3>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-6">
									<address>
										<strong>Billed To:</strong><br>
										John Smith<br>
										1234 Main<br>
										Apt. 4B<br>
										Springfield, ST 54321
									</address>
								</div>
								<div class="col-xs-6 text-right">
									<address>
										<strong>Shipped To:</strong><br>
										Jane Smith<br>
										1234 Main<br>
										Apt. 4B<br>
										Springfield, ST 54321
									</address>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 text-right">
									<address>
										<strong>Order Date:</strong><br>
										March 7, 2014<br><br>
									</address>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><strong>Order summary</strong></h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-condensed">
											<thead>
												<tr>
													<td><strong>Item</strong></td>
													<td class="text-center"><strong>Price</strong></td>
													<td class="text-center"><strong>Quantity</strong></td>
													<td class="text-right"><strong>Totals</strong></td>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Superior</td>
													<td class="text-center">$10.99</td>
													<td class="text-center">1</td>
													<td class="text-right">$10.99</td>
												</tr>
												<tr>
													<td>Deluxe</td>
													<td class="text-center">$20.00</td>
													<td class="text-center">3</td>
													<td class="text-right">$60.00</td>
												</tr>
												<tr>
													<td>Saigon Suite</td>
													<td class="text-center">$600.00</td>
													<td class="text-center">1</td>
													<td class="text-right">$600.00</td>
												</tr>
												<tr>
													<td class="no-line"></td>
													<td class="no-line"></td>
													<td class="no-line text-center"><strong>Total</strong></td>
													<td class="no-line text-right">$685.99</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" onclick="Print()" value="Print">
				</div>
			</div>
		</div>
	</div>

	<!-- PRINT INVOICE MODAL END -->
	<!-- HANDLE LISTDATA -->
	<script>
		var $j = jQuery.noConflict();

		function fetchData(action, targetId) {
			$j.get('http://localhost/hotel/src/models/Admin.php?action=' + action, function(data, status) {
				$j(targetId).html(data);
				$j('.loading').hide();
			});
		}

		// Call the function for each data source

		fetchData('listcustomer', '#customer_data');
		fetchData('listbooking', '#booking_data');
		fetchData('listroom', '#room_data');
		fetchData('listmessage', '#message_data');
		fetchData('listinvoice', '#invoice_data');
	</script>
	<!-- END HANDLE LISTDATA -->
	<script>
		var $jq = jQuery.noConflict();

		function viewCustomer(id) {
			$jq('.edit_employee #customer_id').val(id);

			$jq.get('http://localhost/hotel/src/models/Admin.php', {
				action: 'viewCustomer',
				idcustomer: id
			}, function(data, status) {
				// Parse the JSON data received from the server
				var customerData = JSON.parse(data);
				// Update modal content with customer data
				$jq('.edit_employee #firstname_input').val(customerData.customerFirstName);
				$jq('.edit_employee #lastname_input').val(customerData.customerLastName);
				$jq('.edit_employee #dob_input').val(customerData.customerDob);
				$jq('.edit_employee #email_input').val(customerData.customerEmail);
				$jq('.edit_employee #phone_input').val(customerData.customerPhoneNumber);
				$jq('.edit_employee #address_input').val(customerData.customerAddress);
				$jq('.view_employee #firstname_input').val(customerData.customerFirstName);
				$jq('.view_employee #lastname_input').val(customerData.customerLastName);
				$jq('.view_employee #dob_input').val(customerData.customerDob);
				$jq('.view_employee #email_input').val(customerData.customerEmail);
				$jq('.view_employee #phone_input').val(customerData.customerPhoneNumber);
				$jq('.view_employee #address_input').val(customerData.customerAddress);

			});
		}

		function viewRoom(id) {
			$jq('.edit_employee #room_id').val(id);

			$jq.get('http://localhost/hotel/src/models/Admin.php', {
				action: 'viewRoom',
				idroom: id
			}, function(data, status) {
				// Parse the JSON data received from the server
				var roomData = JSON.parse(data);

				// Update modal content with room data
				$jq('.edit_employee #roomname_input').val(roomData.roomName);
				$jq('.edit_employee #roomtype_input').val(roomData.roomType);
				$jq('.edit_employee #rate_input').val(roomData.roomRate);
				$jq('.edit_employee #roomstatus_input').val(roomData.roomStatus);
				$jq('.view_employee #roomname_input').val(roomData.roomName);
				$jq('.view_employee #roomtype_input').val(roomData.roomType);
				$jq('.view_employee #rate_input').val(roomData.roomRate);
				$jq('.view_employee #roomstatus_input').val(roomData.roomStatus);
			});
		}

		function viewBooking(id) {
			$jq('.edit_employee #booking_id').val(id);
			$jq.get('http://localhost/hotel/src/models/Admin.php', {
				action: 'viewBooking',
				idbooking: id
			}, function(data, status) {
				// Parse the JSON data received from the server
				var bookingData = JSON.parse(data);

				// Update modal content with booking data
				$jq('.edit_employee #firstname_input').val(bookingData.customerFirstName);
				$jq('.edit_employee #lastname_input').val(bookingData.customerLastName);
				$jq('.edit_employee #roomid_input').val(bookingData.roomID);
				$jq('.edit_employee #checkout_input').val(bookingData.checkOutDate);
				$jq('.edit_employee #checkin_input').val(bookingData.checkinDate);
				$jq('.edit_employee #paymentstatus_input').val(bookingData.paymentStatus);
				$jq('.edit_employee #guests_input').val(bookingData.numberOfCustomer);
				$jq('.edit_employee #message_input').val(bookingData.message);
				$jq('.edit_employee #total_input').val(bookingData.totalAmount);
				$jq('.view_employee #firstname_input').val(bookingData.customerFirstName);
				$jq('.view_employee #lastname_input').val(bookingData.customerLastName);
				$jq('.view_employee #roomid_input').val(bookingData.roomID);
				$jq('.view_employee #checkout_input').val(bookingData.checkOutDate);
				$jq('.view_employee #checkin_input').val(bookingData.checkinDate);
				$jq('.view_employee #paymentstatus_input').val(bookingData.paymentStatus);
				$jq('.view_employee #guests_input').val(bookingData.numberOfCustomer);
				$jq('.view_employee #message_input').val(bookingData.message);
				$jq('.view_employee #total_input').val(bookingData.totalAmount);
			});
		}

		function prepareAction(ID) {
			$jq('#delete_id').val(ID);
		}

		function deleteCustomer() {
			var customerID = $jq('#delete_id').val();

			$jq.get('http://localhost/hotel/src/models/Admin.php', {
				action: 'deleteCustomer',
				idcustomer: customerID
			}, function(data, status) {
				$jq('#deleteCustomerModal').modal('hide');
				fetchData('listcustomer', '#customer_data');
			});
		}

		function deleteBooking() {
			var bookingID = $jq('#delete_id').val();


			$jq.get('http://localhost/hotel/src/models/Admin.php', {
				action: 'deleteBooking',
				idbooking: bookingID
			}, function(data, status) {
				// Handle the response if needed
				fetchData('listbooking', '#booking_data');
				$jq('#deleteBookingModal').modal('hide');

			});
		}

		function deleteRoom() {
			var roomID = $jq('#delete_id').val();

			$jq.get('http://localhost/hotel/src/models/Admin.php', {
				action: 'deleteRoom',
				idroom: roomID
			}, function(data, status) {
				// Handle the response if needed
				fetchData('listroom', '#room_data');
				$jq('#deleteRoomModal').modal('hide');
			});
		}

		function editCustomer() {
			var customerid = $jq('.edit_employee #customer_id').val();
			var firstname = $jq('.edit_employee #firstname_input').val();
			var lastname = $jq('.edit_employee #lastname_input').val();
			var dob = $jq('.edit_employee #dob_input').val();
			var email = $jq('.edit_employee #email_input').val();
			var phone = $jq('.edit_employee #phone_input').val();
			var address = $jq('.edit_employee #address_input').val();
			// Create parameters string
			var parameters = "customerid=" + customerid +
				"&firstname=" + firstname +
				"&lastname=" + lastname +
				"&dob=" + dob +
				"&email=" + email +
				"&phone=" + phone +
				"&address=" + address;

			// http://localhost/hotel/src/models/Admin.php?action=editBooking&bookingid=14&roomid=8&
			// checkoutdate=2023/1/1&checkindate=2023/2/2&paymentstatus=paid&guests&message=hello
			// Use parameters in a GET request
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'editCustomer'
			}, function(data, status) {
				// Handle the response if needed
				fetchData('listcustomer', '#customer_data');
				$jq('#editCustomerModal').modal('hide');
			});

		}

		function editRoom() {
			var roomid = $jq('.edit_employee #room_id').val();
			var roomname = $jq('.edit_employee #roomname_input').val();
			var roomtype = $jq('.edit_employee #roomtype_input').val();
			var roomrate = $jq('.edit_employee #rate_input').val();
			var roomstatus = $jq('.edit_employee #roomstatus_input').val();
			// Create parameters string
			var parameters = "roomid=" + roomid +
				"&roomname=" + roomname +
				"&roomtype=" + roomtype +
				"&roomrate=" + roomrate +
				"&roomstatus=" + roomstatus;

			// http://localhost/hotel/src/models/Admin.php?action=editBooking&bookingid=14&roomid=8&
			// checkoutdate=2023/1/1&checkindate=2023/2/2&paymentstatus=paid&guests&message=hello
			// Use parameters in a GET request
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'editRoom'
			}, function(data, status) {
				// Handle the response if needed
				fetchData('listroom', '#room_data');
				$jq('#editRoomModal').modal('hide');
			});

		}

		function editBooking() {
			var bookingid = $jq('.edit_employee #booking_id').val();
			var roomid = $jq('.edit_employee #roomid_input').val();
			var checkoutdate = $jq('.edit_employee #checkout_input').val();
			var checkindate = $jq('.edit_employee #checkin_input').val();
			var paymentstatus = $jq('.edit_employee #paymentstatus_input').val();
			var guests = $jq('.edit_employee #guests_input').val();
			var message = $jq('.edit_employee #message_input').val();
			// Create parameters string
			var parameters = "bookingid=" + bookingid +
				"&roomid=" + roomid +
				"&checkoutdate=" + checkoutdate +
				"&checkindate=" + checkindate +
				"&paymentstatus=" + paymentstatus +
				"&guests=" + guests +
				"&message=" + message;

			// http://localhost/hotel/src/models/Admin.php?action=editBooking&bookingid=14&roomid=8&
			// checkoutdate=2023/1/1&checkindate=2023/2/2&paymentstatus=paid&guests&message=hello
			// Use parameters in a GET request
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'editBooking'
			}, function(data, status) {
				// Handle the response if needed
				fetchData('listbooking', '#booking_data');
				$jq('#editBookingModal').modal('hide');
			});

		}
		// Add new data
		function addCustomer() {
			// Collect data from the form
			var firstName = $jq('.add_customer #firstname_input').val();
			var lastName = $jq('.add_customer #lastname_input').val();
			var dob = $jq('.add_customer #dob_input').val();
			var email = $jq('.add_customer #email_input').val();
			var phoneNumber = $jq('.add_customer #phone_input').val();
			var address = $jq('.add_customer #address_input').val();

			// Simple client-side validation
			if (!firstName || !lastName || !email || !phoneNumber || !address) {
				alert('Please fill in all required fields.');
				return;
			}

			// Create a URL-encoded string
			var parameters = "firstName=" + firstName +
				"&lastName=" + lastName +
				"&dob=" + dob +
				"&email=" + email +
				"&phoneNumber=" + phoneNumber +
				"&address=" + address;
			// alert('http://localhost/hotel/src/models/Admin.php?action=addCustomer?'+ parameters);
			// debugger;
			// Perform any additional client-side logic if needed

			// Add logic to send the data to the server via AJAX
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'addCustomer'
			}, function(data, status) {
				// Handle the response from the server if needed
				$jq('#addCustomerModal').modal('hide');
				// Update and perform additional actions
				fetchData('listcustomer', '#customer_data');
			})
		}

		function addRoom() {
			// Collect data from the form
			var roomname = $jq('.add_room #roomname_input').val();
			var roomtype = $jq('.add_room #roomtype_input').val();
			var roomrate = $jq('.add_room #rate_input').val();
			var roomstatus = $jq('.add_room #roomstatus_input').val();

			// Create a URL-encoded string
			var parameters = "roomname=" + roomname +
				"&roomtype=" + roomtype +
				"&roomrate=" + roomrate +
				"&roomstatus=" + roomstatus;

			// Perform any additional client-side logic if needed

			// Add logic to send the data to the server via AJAX
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'addRoom'
			}, function(data, status) {
				// Handle the response from the server if needed
				$jq('#addRoomModal').modal('hide');
				// Update and perform additional actions
				fetchData('listroom', '#room_data');
			})
		}

		function addBooking() {
			var customerID = $jq('.add_booking #customerID_input').val();
			var roomid = $jq('.add_booking #roomid_input').val();
			var checkoutdate = $jq('.add_booking #checkout_input').val();
			var checkindate = $jq('.add_booking #checkin_input').val();
			var paymentstatus = $jq('.add_booking #paymentstatus_input').val();
			var guests = $jq('.add_booking #guests_input').val();

			// Create a URL-encoded string
			var parameters = "customerID=" + customerID +
				"&roomid=" + roomid +
				"&checkoutdate=" + checkoutdate +
				"&checkindate=" + checkindate +
				"&paymentstatus=" + paymentstatus +
				"&guests=" + guests;

			// // Debugging: Alert parameters and stop code execution
			// alert(parameters);
			// debugger;

			// Add logic to send the data to the server via AJAX
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'addBooking'
			}, function(data, status) {
				// Handle the response from the server if needed
				$jq('#addBookingModal').modal('hide');
				// Update and perform additional actions
				fetchData('listbooking', '#booking_data');
			})
		}
		// Sorting
		$jq(document).on('click', '.column_sortcustomer', function() {
			var column_name = $jq(this).attr("id");
			var order = $jq(this).data("order");
			var parameters = "column_name=" + column_name + "&order=" + order;
			var arrow = '';

			// if (order == 'desc') {
			// 	arrow = '<i class="bx bx-arrow-down"></i>';
			// } else {
			// 	arrow = '<i class="bx bx-arrow-up"></i>';
			// }


			// http://localhost/hotel/src/models/Admin.php?column_name=customerFirstName&order=desc&action=sort
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'sortcustomer'
			}, function(data, status) {
				$jq('#sort_customer_data').html(data);
				// $jq('.column_sortcustomer i').html(arrow);
			});
		});
		$jq(document).on('click', '.column_sortroom', function() {
			var column_name = $jq(this).attr("id");
			var order = $jq(this).data("order");
			var parameters = "column_name=" + column_name + "&order=" + order;
			var arrow = '';

			// if (order == 'desc') {
			// 	arrow = '<i class="bx bx-arrow-down"></i>';
			// } else {
			// 	arrow = '<i class="bx bx-arrow-up"></i>';
			// }


			// http://localhost/hotel/src/models/Admin.php?column_name=customerFirstName&order=desc&action=sort
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'sortroom'
			}, function(data, status) {
				$jq('#sort_room_data').html(data);
				// $jq('.column_sortcustomer i').html(arrow);
			});
		});
		$jq(document).on('click', '.column_sortbooking', function() {
			var column_name = $jq(this).attr("id");
			var order = $jq(this).data("order");
			var parameters = "column_name=" + column_name + "&order=" + order;
			var arrow = '';

			// if (order == 'desc') {
			// 	arrow = '<i class="bx bx-arrow-down"></i>';
			// } else {
			// 	arrow = '<i class="bx bx-arrow-up"></i>';
			// }


			// http://localhost/hotel/src/models/Admin.php?column_name=customerFirstName&order=desc&action=sort
			$jq.get('http://localhost/hotel/src/models/Admin.php?' + parameters, {
				action: 'sortbooking'
			}, function(data, status) {
				$jq('#sort_booking_data').html(data);
				// $jq('.column_sortcustomer i').html(arrow);
			});
		});
	</script>

	<!-- HANDLE SETTINGS -->
	<script>
		function alert(type, msg) {
			let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
			let element = document.createElement('div');
			element.innerHTML = `
                <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
                    <strong> ${msg}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
			document.body.append(element);
		}

		let general_data, contacts_data;
		let general_s_form = document.getElementById("general_s_form");
		let side_title_inp = document.getElementById("side_title_inp");
		let side_about_inp = document.getElementById("side_about_inp");
		let contacts_s_form = document.getElementById("contacts_s_form");

		function get_general() {
			let side_title = document.getElementById("side_title");
			let side_about = document.getElementById("side_about");

			let shudown_toggle = document.getElementById("shutdown-toogle");

			let xhr = new XMLHttpRequest();
			xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				general_data = JSON.parse(this.responseText);
				side_title.innerText = general_data.side_title;
				side_about.innerText = general_data.side_about;
				side_title_inp.value = general_data.side_title;
				side_about_inp.value = general_data.side_about;
				if (general_data.shutdown == 0) {
					shudown_toggle.checked = false;
					shudown_toggle.value = 0;
				} else {
					shudown_toggle.checked = true;
					shudown_toggle.value = 1;
				}
			}
			xhr.send('get_general');
		}

		general_s_form.addEventListener('submit', function(e) {
			e.preventDefault();
			upd_general(side_title_inp.value, side_about_inp.value);

		})

		function upd_general(side_title_val, side_about_val) {
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				var myModal = document.getElementById('general-s');
				var modal = bootstrap.Modal.getInstance(myModal);
				modal.hide();
				if (this.responseText == 1) {
					alert('success', "Changes saved!");
					get_general();
				} else {
					alert('error', "No Changes made!");
				}
			}
			xhr.send('side_title=' + side_title_val + '&side_about=' + side_about_val + '&upd_general');
		}

		function upd_shutdown(val) {
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				console.log(this.responseText);
				if (this.responseText == 1 && general_data.shutdown == 0) {
					alert('success', "Site has been shutdown!");
				} else {
					alert('success', "Shutdown made off!");
				}
				get_general();

			}
			xhr.send('&upd_shutdown=' + val);
		}

		function get_contacts() {
			let contacts_p_id = ['address', 'website', 'pn1', 'pn2', 'email', 'fb', 'tpv'];
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				contacts_data = JSON.parse(this.responseText);
				contacts_data = Object.values(contacts_data);
				for (let i = 0; i < contacts_p_id.length; i++) {
					document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
				}
				contacts_inp(contacts_data);
			}
			xhr.send('get_contacts');
		}

		function contacts_inp(data) {
			let contacts_inp_id = ['address_inp', 'website_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'tpv_inp'];
			for (let i = 0; i < contacts_inp_id.length; i++) {
				document.getElementById(contacts_inp_id[i]).value = data[i + 1];

			}
		}

		function upd_contacts() {
			let xhr = new XMLHttpRequest();
			let index = ['address', 'website', 'pn1', 'pn2', 'email', 'fb', 'tpv'];
			let contacts_inp_id = ['address_inp', 'website_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'tpv_inp'];

			let data_str = "";
			for (let i = 0; i < index.length; i++) {
				data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
			}

			data_str += "upd_contacts";
			xhr.open("POST", "../../controllers/ajax/settings_crud.php", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				console.log(this.responseText);
				var myModal = document.getElementById('contacts-s');
				var modal = bootstrap.Modal.getInstance(myModal);
				modal.hide();
				if (this.responseText == 1) {
					alert('success', "Changes saved!");
					get_contacts();
				} else {
					alert('error', "No Changes made!");
				}
			}
			xhr.send(data_str);

		}

		contacts_s_form.addEventListener('submit', function(e) {
			e.preventDefault();
			upd_contacts();
		})

		window.onload = function() {
			get_general();
			get_contacts();
		}
	</script>
	<?php
	require('./inc/scripts.php');
	?>
</body>

</html>