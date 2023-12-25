<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/home.css" />
    <link rel="stylesheet" href="../../assets/css/header.css" />
    <link rel="stylesheet" href="../../assets/css/footer.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
    <link rel="stylesheet" href="../../assets/css/checkout.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Check Out</title>
</head>
<body>
    <div class="layout-container">
        <div>
            <img src="../../assets/img/checkout.png">
        </div>
        <div class="content">
            <div class="dateblock">
                <h1 style="color: whitesmoke;"><b>CI & CO Date</b></h1>
                <div class="date">
                <p style="margin: 20px; margin-top:30px;"><b>Check-in: </b>Tuesday, December 26, 2023 from 14:00</p>
                <p style="margin: 20px;"><b>Check-out: </b>Wednesday, December 27, 2023 until 12:00</p>
                </div>
            </div>
            <div class="checkoutinfo">
                <h1 style="color: whitesmoke;"><b>Booking Details</b></h1>
            </div>
            <form class="info">
                <div class="combobox">
                <label style="font-size: 15px;">Choose a room: </label>

                <select name="rooms" id="rooms">
                <option value="1">Superior</option>
                <option value="2">Deluxe</option>
                <option value="3">Senior Deluxe</option>
                <option value="4">Executive</option>
                <option value="5">Suite</option>
                <option value="6">Saigon Suite</option>

                </select>
                <br><br>
                <label style="font-size: 15px;">Number of guest: </label>
                <input type="number">
                </div>
            </form>
            <div class="checkoutinfo">
                <h1 style="color: whitesmoke;"><b>Customer Info</b></h1>
            </div>
            <form class="info">
                <div class="customer-inf">
                <label style="font-size: 15px;">First Name: </label>
                <input  type="text" id="firstname">
                <br><br>
                <label style="font-size: 15px;">Last Name: </label>
                <input type="text" id="lastname">
                <br><br>
                <label style="font-size: 15px;">Address: </label>
                <input type="text" id="address">
                <br><br>
                <label style="font-size: 15px;">Date of Birth: </label>
                <input type="date" id="birthday" name="birthday">
                </div>
            </form>
            <div>
                <button style="background-color: #a71218; margin-left: 40%; margin-right: 40%; margin-top: 30px;">SEND</button>
            </div>
        </div>
    </div>
</body>
</html>