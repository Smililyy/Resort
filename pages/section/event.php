<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/meetings-events.css">
    <link rel="stylesheet" href="../../css/home.css">
</head>

<body>
    <div class="container">
        <div class="meetingevent-content-2" style="padding-top: 50px;">
            <div class="meetingevent-content-2-1">
                <div class="row-1">
                    <div class="event-des-wrapper" style="padding: 30px;">
                        <h3 style="color: #a71218;text-align: center" class="vc_custom_heading vc_custom_1571647579230">MEETINGS &amp; EVENTS</h3>
                        <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                        <p style="text-align: center" class="event-description">
                            Saigon Hotel is the perfect place for your next meetings, events or any type of celebration. The 2 meeting room and ballroom on the 10th floor are well equipped with the all new state of the art meeting rooms make your organization as convenient as ever.<br>
                            For all meeting rooms details, please contact our Event Sales Team on (+84) 28 3829 9734 ext 189 or email: eventsm@saigonhotel.com.vn</p>
                        <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                                <p style="text-align: center;"><strong><a href="http://localhost:3000/pages/meetings-events.php" style="padding: 0px"><span style="color: #a71218">READ DETAIL</span></a></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-2">
                    <div class="col-12-2">
                        <div class="column">
                            <img src="../img/sgh-meeting-home-1-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                        </div>
                        <div class="column">
                            <img src="../img/sgh-meeting-home-3-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                        </div>
                        <div class="column">
                            <img src="../img/sgh-meeting-home-4-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                        </div>
                        <div class="column">
                            <img src="../img/sgh-meeting-home-5-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                        </div>
                        <!-- <div class="column">
                                            <img src="../img/sgh-meeting-home-6-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                                        </div>
                                        <div class="column">
                                            <img src="../img/sgh-meeting-home-7-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                                        </div> -->
                    </div>
                </div>
            </div>
            <div class="meetingevent-content-2-2" style="display: block;">
                <img src="" alt="" id="preimage" style="width:95%">
                <img id="expandedImg" style="width:95%; position: relative; top: 10px " src="http://localhost:3000/img/sgh-meeting-home-1-1.jpg">
                <div id="imgtext"></div>
            </div>
            <script>
                function myFunction(imgs) {
                    var preimage = document.getElementById("preimage");
                    var expandImg = document.getElementById("expandedImg");
                    var imgText = document.getElementById("imgtext");
                    preimage.src = "";
                    expandImg.src = imgs.src;
                    imgText.innerHTML = imgs.alt;
                    expandImg.parentElement.style.display = "block";

                }
            </script>
        </div>
    </div>
</body>


</html>