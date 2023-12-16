<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reservation.css">
    <link rel="stylesheet" href="../../assets/css/home.css" />
    <link rel="stylesheet" href="../../assets/css/header.css" />
    <link rel="stylesheet" href="../../assets/css/footer.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Reservation</title>
</head>

<body>
    <div class="layout-container">
        <?php include("./components/header.php") ?>
        <div class="wrapper">
            <div class="wpb_wrapper">
                <p>
                    <span class="content">
                        "86 well-furnished and spacious suites and rooms are designed with every convenience in mind to bring you the most comfort and relaxation during your stay at our Saigon Hotel. Through the careful combination of Vietnamese traditional and modern characteristics in design and decoration has provided the cozy and luxurious feeling as ever."
                    </span>
                </p>
                <p>
                    <span class="content">
                        "Offering hotel’s guests superior services and a broad range of amenities, Saigon Hotel is committed to ensuring that your stay is as comfortable as possible. Room service till 10.00 pm, free Wi-fi in all rooms, 24-hour security, taxi service, ticket service and airport transport service are just a few of the facilities that set Saigon Hotel apart from other hotels in the city."
                    </span>
                </p>
                <p>
                    <span class="content">
                        "Furthermore, all suites and rooms even provide such comforts as television LCD/plasma screen, internet access–wireless (complimentary), non-smoking rooms, air conditioning, etc. Besides, Fitness Center is also an ideal place to relax and unwind after a busy day."
                    </span>
                </p>
            </div>
            <div class="wrapper">
                <form>
                    <div class="searchpanel">
                        <input type="date" id="datepicker" value="<?php echo date('Y-m-d'); ?>">
                        <input type="date" id="datepicker" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="room-info">
                        <div class="room-img">
                            <img src="../../assets/img/superior.jpg" alt="Superior Room" width="240" height="180">
                        </div>
                        <div class="room-des">
                            <b style="color: red;">Superior Room</b>
                            <p class="details">The Superior rooms are 28sqm (301sqft) approximately in size with reasonably facilities arranged in the most compacted space, which is suitable to guests who require quiet sleeps after day of long-haul traveling or busy working.</p>
                        </div>
                        <ul class="ammenities">
                            <li class="details">Air conditioning</li>
                            <li class="details">Bathtub</li>
                            <li class="details">Hair Dryer</li>
                            <li class="details">WiFi Access</li>
                            <li class="details">Working Desk</li>
                        </ul>
                        <div class="bed-size">
                            <b>Bed size: </b>
                            <p>2 single beds, 1 queen bed</p>
                            <b>Room area: </b>
                            <p>28 m2</p>
                        </div>
                        <div>
                            <div style="display: inline-block" class="room-price">
                                ₫ 1.450.000 per night
                            </div>
                            <div style="display: inline-block" class=>
                                <select name="room-quantity" id="quantity">
                                    <option value="0" selected="selected">0 room</option>
                                    <option value="1">1 room</option>
                                    <option value="2">2 rooms</option>
                                    <option value="3">3 rooms</option>
                                    <option value="4">4 rooms</option>
                                    <option value="5">5 rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="room-info">
                        <div class="room-img">
                            <img src="../../assets/img/deluxe.jpg" alt="Deluxe Room" width="240" height="180">
                        </div>
                        <div class="room-des">
                            <b style="color: red;">Deluxe Room</b>
                            <p class="details">The ideal selection for business and leisure travelers as our Deluxe rooms offer a spacious 32sqm (344sqft) approximately, with variety of choices for those who prefer pleasant garden view or over looking city view rooms. Every room is mindfully decorated using wooden floor and excellent color mixture which aim to guest’s comfort and relaxation.</p>
                        </div>
                        <ul class="ammenities">
                            <li class="details">Air conditioning</li>
                            <li class="details">Bathtub</li>
                            <li class="details">Hair Dryer</li>
                            <li class="details">WiFi Access</li>
                            <li class="details">Working Desk</li>
                        </ul>
                        <div class="bed-size">
                            <b>Bed size: </b>
                            <p>2 single beds, 1 queen bed</p>
                            <b>Room area: </b>
                            <p>32 m2</p>
                        </div>
                        <div>
                            <div style="display: inline-block" class="room-price">
                                ₫ 1.600.000 per night
                            </div>
                            <div style="display: inline-block" class=>
                                <select name="room-quantity" id="quantity">
                                    <option value="0" selected="selected">0 room</option>
                                    <option value="1">1 room</option>
                                    <option value="2">2 rooms</option>
                                    <option value="3">3 rooms</option>
                                    <option value="4">4 rooms</option>
                                    <option value="5">5 rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="room-info">
                        <div class="room-img">
                            <img src="../../assets/img/executive.jpg" alt="Executive Room" width="240" height="180">
                        </div>
                        <div class="room-des">
                            <b style="color: red;">Executive Room</b>
                            <p class="details">Make your visit to Saigon a memorable one with true experience in our Executive rooms. These airy accommodations hold soft king beds with peculiar features of the classic interior design. Approximately 40sqm (430sqft) spaces are the ideal oasis amidst the hustle and bustle of the city..</p>
                        </div>
                        <ul class="ammenities">
                            <li class="details">Air conditioning</li>
                            <li class="details">Bathtub</li>
                            <li class="details">Hair Dryer</li>
                            <li class="details">WiFi Access</li>
                            <li class="details">Working Desk</li>
                        </ul>
                        <div class="bed-size">
                            <b>Bed size: </b>
                            <p>1 king bed</p>
                            <b>Room area: </b>
                            <p>40 m2</p>
                        </div>
                        <div>
                            <div style="display: inline-block" class="room-price">
                                ₫ 2.350.000 per night
                            </div>
                            <div style="display: inline-block" class=>
                                <select name="room-quantity" id="quantity">
                                    <option value="0" selected="selected">0 room</option>
                                    <option value="1">1 room</option>
                                    <option value="2">2 rooms</option>
                                    <option value="3">3 rooms</option>
                                    <option value="4">4 rooms</option>
                                    <option value="5">5 rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="room-info">
                        <div class="room-img">
                            <img src="../../assets/img/suite.jpg" alt="Suite Room" width="240" height="180">
                        </div>
                        <div class="room-des">
                            <b style="color: red;">Suite Room</b>
                            <p class="details">The only one room with outstanding design combines both functional and aesthetic elements creating an extra touch of elegance. This Suite room is approximately 44sqm (473sqft) featured a spacious king-size bed overlooking Dong Du street through a generous city view window. It delivers a superior experience with separate living room area, wooden floor and signature amenities make you feel falling in love right at the time stepping into the room..</p>
                        </div>
                        <ul class="ammenities">
                            <li class="details">Air conditioning</li>
                            <li class="details">Bathtub</li>
                            <li class="details">Hair Dryer</li>
                            <li class="details">WiFi Access</li>
                            <li class="details">Working Desk</li>
                        </ul>
                        <div class="bed-size">
                            <b>Bed size: </b>
                            <p>1 king bed</p>
                            <b>Room area: </b>
                            <p>44 m2</p>
                        </div>
                        <div>
                            <div style="display: inline-block" class="room-price">
                                ₫ 2.300.000 per night
                            </div>
                            <div style="display: inline-block" class=>
                                <select name="room-quantity" id="quantity">
                                    <option value="0" selected="selected">0 room</option>
                                    <option value="1">1 room</option>
                                    <option value="2">2 rooms</option>
                                    <option value="3">3 rooms</option>
                                    <option value="4">4 rooms</option>
                                    <option value="5">5 rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="room-info">
                        <div class="room-img">
                            <img src="../../assets/img/saigonsuite.jpg" alt="Saigon Suite Room" width="240" height="180">
                        </div>
                        <div class="room-des">
                            <b style="color: red;">Saigon Suite Room</b>
                            <p class="details">The most beautiful and luxurious suite room with a romantic view of Saigon River gently accommodates both business and leisure travelers’ need by a real homely feel. The room is approximately 50sqm (537sqft), featured with king-size and silky-soft bedding, wide airy window streaming in plenty of natural light, a spacious walk-in vanity and shower including bathroom amenities. The living room comes with wooden floor, comfortable sofa and large working desk best suit with guests who require some work during their trips..</p>
                        </div>
                        <ul class="ammenities">
                            <li class="details">Air conditioning</li>
                            <li class="details">Bathtub</li>
                            <li class="details">Hair Dryer</li>
                            <li class="details">WiFi Access</li>
                            <li class="details">Working Desk</li>
                        </ul>
                        <div class="bed-size">
                            <b>Bed size: </b>
                            <p>1 king bed</p>
                            <b>Room area: </b>
                            <p>50 m2</p>
                        </div>
                        <div>
                            <div style="display: inline-block" class="room-price">
                            ₫ 2.500.000 per night
                            </div>
                            <div style="display: inline-block" class=>
                               <select name="room-quantity" id="quantity">
                                 <option value="0" selected="selected">0 room</option>
                                 <option value="1">1 room</option>
                                 <option value="2">2 rooms</option>
                                 <option value="3">3 rooms</option>
                                 <option value="4">4 rooms</option>
                                 <option value="5">5 rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit">BOOK NOW</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include("./components/footer.php") ?>
    </div>
    <script src="../../assets/js/index.js"></script>
</body>
