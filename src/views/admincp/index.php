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
			<i class='bx bx-layer'></i>
			<span class="text">Resort Management</span>
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
			<li class="menu-item" data-content="booking">
				<a href="#">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Booking</span>
				</a>
			</li>
			<li class="menu-item" data-content="message">
				<a href="#">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Message</span>
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
						<h1>Customer</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Customer</a>
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
				<!-- Customer infomation -->
				<div class="customer-inf">
					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="table-responsive">
								<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<div class="dataTables_length" id="dataTable_length">
												<label>
													Show
													<select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control -sm">
														<option value="10">10</option>
														<option value="25">25</option>
														<option value="50">50</option>
														<option value="100">100</option>
													</select>
													entries
												</label>
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<div id="dataTable_filter" class="dataTables_filter">
												<label>
													Search:
													<input type="search" class="form-control form-control-sm" placeholder aria-controls="dataTable">
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th>id</th>
														<th>Name</th>
														<th>Email</th>
														<th>ID Number</th>
														<th>Phone </th>
														<th>Location</th>
														<th>DOB</th>
														<th>Verified</th>
														<th>Status</th>
														<th>Date</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>id</th>
														<th>Name</th>
														<th>Email</th>
														<th>ID Number</th>
														<th>Phone </th>
														<th>Location</th>
														<th>DOB</th>
														<th>Verified</th>
														<th>Status</th>
														<th>Date</th>
													</tr>
												</tfoot>
												<tbody>
													<tr>
														<td>1</td>
														<td>Tiger Nixon</td>
														<td>tigernixon@gmail.com</td>
														<td>1234567890</td>
														<td>129 900 902</td>
														<td>England</td>
														<td>1998/04/25</td>
														<td>none</td>
														<td>61</td>
														<td>2023/10/16</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-5">
											<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
										</div>
										<div class="col-sm-12 col-md-7">
											<div class="dataTables_paginate paging_simple_numbers" id="dataTabl e_paginate">
												<ul class="pagination">
													<li class="paginate_button page-item previous disabled" id="dat aTable_previous">
														<a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
													</li>
													<li class="paginate_button page-item active"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate button page-item"></li>
													<li class="paginate_button page-item next" id="dataTable_next">
														<a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="booking" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Booking</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Booking</a>
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
				<div class="booking-inf">
					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="table-responsive">
								<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<div class="dataTables_length" id="dataTable_length">
												<label>
													Show
													<select name="dataTable_length" aria-controls="dataTable" class="book-select book-select-sm form-control form-control -sm">
														<option value="10">10</option>
														<option value="25">25</option>
														<option value="50">50</option>
														<option value="100">100</option>
													</select>
													entries
												</label>
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<div id="dataTable_filter" class="dataTables_filter">
												<label>
													Search:
													<input type="search" class="form-control form-control-sm" placeholder aria-controls="dataTable">
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th><input type="checkbox"></th>
														<th>id</th>
														<th>Room</th>
														<th>Number of vacant</th>
														<th>Customer</th>
														<th>Status</th>
														<th>Start date</th>
														<th>End date</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th><input type="checkbox"></th>
														<th>id</th>
														<th>Room</th>
														<th>Number of vacant</th>
														<th>Customer</th>
														<th>Status</th>
														<th>Start date</th>
														<th>End date</th>
													</tr>
												</tfoot>
												<tbody>
													<tr>
														<td><input type="checkbox"></td>
														<td>1</td>
														<td>Executive</td>
														<td>1</td>
														<td>Tiger Nixon</td>
														<td>Purchased</td>
														<td>2023/10/16</td>
														<td>2023/10/20</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-5">
											<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
										</div>
										<div class="col-sm-12 col-md-7">
											<div class="dataTables_paginate paging_simple_numbers" id="dataTabl e_paginate">
												<ul class="pagination">
													<li class="paginate_button page-item previous disabled" id="dat aTable_previous">
														<a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
													</li>
													<li class="paginate_button page-item active"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate_button page-item"></li>
													<li class="paginate button page-item"></li>
													<li class="paginate_button page-item next" id="dataTable_next">
														<a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="message" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Message</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Message</a>
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
			<div id="employee" class="content-item">
				<div class="head-title">
					<div class="left">
						<h1>Employee</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Employee</a>
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