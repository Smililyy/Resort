<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Data</title>
  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Include any necessary CSS stylesheets here -->
  <link rel="stylesheet" href="ad-customer.css">
</head>

<body>

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

</body>

</html>