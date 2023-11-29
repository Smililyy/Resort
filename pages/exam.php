<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/meetings-events.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <div class="meetingevent-wrapper">
            <div class="meetingevent-title">
                <div class="col-3"></div>
                <div class="col-6">
                    <p>THE IDEAL VENUE<br>FOR YOUR MEETINGS & EVENTS</p>  
                    <br><br>
                    <a href="#content-1">READ DETAIL</a> 
                </div>
                <div class="col-3"></div>
            </div> 
            <div class="meetingevent-content">
                <div class="meetingevent-content-2" >
                    <div class="meetingevent-content-2-1">
                        <div class="row-1">
                            <div class="col-12-1">
                                <p id="title">MEETINGS & EVENTS</p>
                                <p id="detail">Saigon Hotel is the perfect place for your next meetings, events or any type of celebration. The two meeting room and ballroom on 10th floor are well equipped with all new state of art that make your organization as convenient as ever.</p><br>
                                <p id="detail">For all meeting room details, please contact our Event Sales Team on (+84) 28 3829 9734 ext 189 or email: eventsm@saigonhotel.com.vn</p><br><br>
                                <a href="#booking">BOOK NOW</a><br><br><br>
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
                    <div class="meetingevent-content-2-2">
                        <img src="../img/sgh-meeting-home-1-1.jpg" alt="" id="preimage"  style="width:95%">
                        <img id="expandedImg" style="width:95% " >
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
                <div class="meetingevent-content-1" id="content-1">
                    <div class="meetingevent-content-row">
                        <div class="meetingevent-content-col-1">
                            <p id="title">APRICOT MEETING ROOM</p>
                            <p id="detail">Ideal for an executive meeting for 12, professional conference or company training up to 120. We assure that every detail of your requirements are fully carried out to perfection with our dedicated staff.</p>
                            <br><a href="#" id="myBtn">READ DETAIL</a>
                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                            </div>   
                        </div>
                        <script>
                                // Get the modal
                                var modal = document.getElementById("myModal");

                                // Get the button and insert it inside the modal - use its "alt" text as a caption
                                var mybtn = document.getElementById("myBtn");
                                var modalImg = document.getElementById("img01");
                                mybtn.onclick = function(){
                                    modal.style.display = "block";
                                    modalImg.src = "../img/detail-1.png";
                                }

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function() { 
                                    modal.style.display = "none";
                                }
                            </script>
                        <div class="meetingevent-content-col-2">
                            <div class="mySlides-1">
                            <img src="../img/apricot-1.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                            <img src="../img/apricot-2.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                            <img src="../img/apricot-4.jpg" style="width:100%">
                            </div>
                            <div class="mySlides-1">
                            <img src="../img/apricot-5.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                            <img src="../img/lotus-3.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                            <img src="../img/lotus-4.jpg" style="width:100%">
                            </div>
                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                        </div>
                        <script>
                        let slideIndex = 1;
                            showSlides(slideIndex);

                        function plusSlides(n) {
                            showSlides(slideIndex += n);
                        }

                        function currentSlide(n) {
                            showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                            let i;
                            let slides = document.getElementsByClassName("mySlides-1");
                            if (n > slides.length) {slideIndex = 1}    
                            if (n < 1) {slideIndex = slides.length}
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";  
                            }
                            slides[slideIndex-1].style.display = "block";  
                        }
                        </script>
                    </div>
                    <div class="meetingevent-content-row">
                        <div class="meetingevent-content-col-2">
                            <div class="mySlides-2">
                            <img src="../img/0001.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                            <img src="../img/0002.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                            <img src="../img/0003.jpg" style="width:100%">
                            </div>
                            <div class="mySlides-2">
                            <img src="../img/0004.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                            <img src="../img/0005.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                            <img src="../img/0006.jpg" style="width:100%">
                            </div>
                            <div class="mySlides-2">
                            <img src="../img/0007.jpg" style="width:100%">
                            </div>
                            <a class="prev" onclick="plus_Slides(-1)">❮</a>
                            <a class="next" onclick="plus_Slides(1)">❯</a>
                        </div>
                        <div class="meetingevent-content-col-1">
                            <p id="title">LOTUS BALLROOM</p>
                            <p id="detail">A perfect place for your meetings, seminars, new product launches, large group trainings, professional conferences or even gala dinners and weddings accommodating up to 200. We assure that every detail of your requirements are fully carried out to perfection and our dedicated chefs are proud to serve your guests great tasty dishes from Vietnamese, Asian and Western cuisines.</p>
                            <br><a href="#" id="myBtn2">READ DETAIL</a>
                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                            </div>
                        </div> 
                        <script>
                                // Get the modal
                                var modal = document.getElementById("myModal");

                                // Get the button and insert it inside the modal - use its "alt" text as a caption
                                var mybtn2 = document.getElementById("myBtn2");
                                var modalImg = document.getElementById("img01");
                                mybtn2.onclick = function(){
                                    modal.style.display = "block";
                                    modalImg.src = "../img/detail-2.png";
                                }

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function() { 
                                    modal.style.display = "none";
                                }
                            </script> 
                        <script>
                        let slide_Index = 1;
                            show_Slides(slide_Index);

                        function plus_Slides(n) {
                            show_Slides(slide_Index += n);
                        }

                        function current_Slide(n) {
                            show_Slides(slide_Index = n);
                        }

                        function show_Slides(n) {
                            let i;
                            let slides = document.getElementsByClassName("mySlides-2");
                            if (n > slides.length) {slide_Index = 1}    
                            if (n < 1) {slide_Index = slides.length}
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";  
                            }
                            slides[slide_Index-1].style.display = "block";  
                        }
                        </script>
                    </div>
                </div>
            </div> 
            <div class="meetingevent-inf">
                <div class="col-3"></div>
                <div class="col-6">
                    <p id="title">BOOK NOW</p>  
                    <p id="detail">Address: 41-47 Dong Du Street, District 1, Ho Chi Minh City, VietNam<br>Tel: (84-28) 38 299 734<br>Email: info@saigonhotel.com.vn</p>

                </div>
                <div class="col-3"></div>
            </div>
            <div class="meetingevent-box" id="booking">
                <div class="col-3"></div>
                <div class="col-6">
                    <form action="" method="post">
                        <div class="row-0">
                            <input type="text" name="firstname" id="firstname"  placeholder="First Name (required)">
                            <input type="text" name="lastname" id="lastname"  placeholder="Last Name (required)">
                        </div>
                        <div class="row-1">
                            <input type="text" name="phone" id="phone"  placeholder="Phone (required)">
                            <input type="email" name="email" id="email"  placeholder="Email (required)">    
                        </div>
                        <div class="row-2">
                            <input type="text" name="eventdate" id="eventdate"  placeholder="Event date">
                            <input type="number" name="numberofguest" id="numberofguest"  placeholder="Number of Guest (required)" min="1">
                        </div>  
                        <div class="row-3">
                            <textarea name="" id="" placeholder="Your Message"></textarea>
                        </div>
                        <div class="row-3">
                            <a href="" id="btn-send">SEND REQUEST</a>
                        </div>
                    </form>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <script>
                        // Initialize the date picker
                        $(function() {
                            $("#eventdate").datepicker({
                                minDate: 0 
                            });
                        });
                    </script>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</body>
</html>