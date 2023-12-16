<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/meetings-events.css">
    <link rel="stylesheet" href="../../assets/css/home.css" />
    <link rel="stylesheet" href="../../assets/css/header.css" />
    <link rel="stylesheet" href="../../assets/css/footer.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Meeting & Events</title>
</head>

<body>
    <div class="layout-container">
        <?php include("./components/header.php") ?>
        <div class="meetingevent-wrapper">
            <div class="meetingevent-title">
                <div class="col-3"></div>
                <div class="col-6">
                    <h1 style="color: #e8e8e8;text-align: center" class="vc_custom_heading text-shadow">The ideal venue<br>
                        for your meetings &amp; events</h1>
                    <a href="#content-1">READ DETAIL</a>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="meetingevent-content">
                <div class="meetingevent-content-2">
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
                                    <img src="../../assets/img/sgh-meeting-home-1-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                                </div>
                                <div class="column">
                                    <img src="../../assets/img/sgh-meeting-home-3-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                                </div>
                                <div class="column">
                                    <img src="../../assets/img/sgh-meeting-home-4-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                                </div>
                                <div class="column">
                                    <img src="../../assets/img/sgh-meeting-home-5-1.jpg" alt="" style="width:100%" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meetingevent-content-2-2">
                        <img src="../../assets/img/sgh-meeting-home-1-1.jpg" alt="" id="preimage" style="width:95%">
                        <img id="expandedImg" style="width:95% ">
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
                            mybtn.onclick = function() {
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
                                <img src="../../assets/img/apricot-1.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                                <img src="../../assets/img/apricot-2.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                                <img src="../../assets/img/apricot-4.jpg" style="width:100%">
                            </div>
                            <div class="mySlides-1">
                                <img src="../../assets/img/apricot-5.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                                <img src="../../assets/img/lotus-3.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-1">
                                <img src="../../assets/img/lotus-4.jpg" style="width:100%">
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
                                if (n > slides.length) {
                                    slideIndex = 1
                                }
                                if (n < 1) {
                                    slideIndex = slides.length
                                }
                                for (i = 0; i < slides.length; i++) {
                                    slides[i].style.display = "none";
                                }
                                slides[slideIndex - 1].style.display = "block";
                            }
                        </script>
                    </div>
                    <div class="meetingevent-content-row">
                        <div class="meetingevent-content-col-2">
                            <div class="mySlides-2">
                                <img src="../../assets/img/0001.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                                <img src="../../assets/img/0002.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                                <img src="../../assets/img/0003.jpg" style="width:100%">
                            </div>
                            <div class="mySlides-2">
                                <img src="../../assets/img/0004.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                                <img src="../../assets/img/0005.jpg" style="width:100%">
                            </div>

                            <div class="mySlides-2">
                                <img src="../../assets/img/0006.jpg" style="width:100%">
                            </div>
                            <div class="mySlides-2">
                                <img src="../../assets/img/0007.jpg" style="width:100%">
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
                            mybtn2.onclick = function() {
                                modal.style.display = "block";
                                modalImg.src = "../../assets/img/detail-2.png";
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
                                if (n > slides.length) {
                                    slide_Index = 1
                                }
                                if (n < 1) {
                                    slide_Index = slides.length
                                }
                                for (i = 0; i < slides.length; i++) {
                                    slides[i].style.display = "none";
                                }
                                slides[slide_Index - 1].style.display = "block";
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="meetingevent-inf" id="booking">
                <div class="col-3"></div>
                <div class="col-6">
                    <p id="title">BOOK NOW</p>
                    <p id="detail">Address: 41-47 Dong Du Street, District 1, Ho Chi Minh City, VietNam<br>Tel: (84-28) 38 299 734<br>Email: info@saigonhotel.com.vn</p>

                </div>
                <div class="col-3"></div>
            </div>
            <?php
                include "connect.php";

                $options = array();

                $sql = "SELECT DISTINCT roomName FROM rooms WHERE roomType = 'Event Meeting '";
                $result = $conn->query($sql);

                // Lặp qua kết quả và thêm giá trị vào mảng options
                if ($result !== false && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $options[] = $row["roomName"];
                    }
                }
            ?>
            <div class="meetingevent-box" >
                <div class="col-3"></div>
                <div class="col-6">
                    <form action="event-controller.php" method="POST">
                        <div class="row-0">
                            <input type="text" name="firstname" id="firstname" placeholder="First Name (required)" required>
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name (required)" required>
                        </div>
                        <div class="row-1">
                            <input type="text" name="phone" id="phone" placeholder="Phone (required)" required>
                            <input type="email" name="email" id="email" placeholder="Email (required)" required>
                        </div>
                        <div class="row-2">
                            <input type="text" name="eventdate" id="eventdate" placeholder="Event date">
                            <input type="number" name="numberofday" id="numberofday" placeholder="Number of Event Day" min="1">
                        </div>
                        <div class="row-2">
                            <input type="text" name="nameroom" id="nameroom" placeholder="Category of room">
                            <div id="dropdown" class="dropdown-content">
                                <?php foreach ($options as $option) { ?>
                                    <div class="option"><?php echo $option; ?></div>
                                <?php } ?>
                            </div>
                            <input type="number" name="numberofguest" id="numberofguest" placeholder="Number of Guest (required)" min="1" required>
                        </div>
                        <div class="row-3">
                            <textarea name="message" id="message" placeholder="Your Message"></textarea>
                        </div>
                        <div class="row-3">
                            <button class="btn-send" type="submit">SEND REQUEST</button>
                        </div>
                    </form>
                        <!-- Đoạn mã HTML và JavaScript -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                        var input = document.getElementById('nameroom');
                        var dropdown = document.getElementById('dropdown');

                        // Sự kiện click vào input
                        input.addEventListener('click', function (event) {
                            // Hiển thị hoặc ẩn dropdown
                            dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';

                            // Ngăn chặn sự kiện click từ việc lan truyền lên và đóng dropdown ngay lập tức
                            event.stopPropagation();
                        });

                        // Sự kiện chọn một option trong dropdown
                        dropdown.addEventListener('click', function (e) {
                            if (e.target.classList.contains('option')) {
                                input.value = e.target.textContent;
                                dropdown.style.display = 'none';
                            }
                        });

                        // Sự kiện click ngoại ô
                        document.addEventListener('click', function (event) {
                            // Ẩn dropdown nếu click ngoài vùng input
                            if (event.target !== input) {
                                dropdown.style.display = 'none';
                            }
                        });
                    });
                    </script>
                    <?php
                    // Đóng kết nối CSDL
                    $conn->close();
                    ?>
                    <script>
                        function validateForm() {
                            var isValid = true;

                            // Validation for each input field
                            isValid = validateField('firstname') && isValid;
                            isValid = validateField('lastname') && isValid;
                            isValid = validatePhone() && isValid;
                            isValid = validateField('email') && isValid;
                            isValid = validateField('numberofguest') && isValid;

                            return isValid;
                        }

                        function validateField(fieldName) {
                            var field = document.getElementById(fieldName);
                            var fieldValue = field.value.trim();
                            var errorElement = document.getElementById(fieldName + '-error');

                            // Example validation: Check if the field is not empty
                            if (fieldValue === '') {
                                errorElement.innerHTML = 'This field is required';
                                return false;
                            } else {
                                errorElement.innerHTML = ''; // Clear previous error message
                                return true;
                            }
                        }

                        function validatePhone() {
                            var phoneField = document.getElementById('phone');
                            var phoneValue = phoneField.value.trim();
                            var phoneErrorElement = document.getElementById('phone-error');

                            // Example validation: Check if the phone number is in a valid format
                            var phoneRegex = /^[0-9]{10}$/; // Assuming a 10-digit phone number
                            if (!phoneRegex.test(phoneValue)) {
                                phoneErrorElement.innerHTML = 'Invalid phone number format';
                                return false;
                            } else {
                                phoneErrorElement.innerHTML = ''; // Clear previous error message
                                return true;
                            }
                        }

                        // Add blur event listeners for each input field
                        document.getElementById('firstname').addEventListener('blur', function() {
                            validateField('firstname');
                        });

                        document.getElementById('lastname').addEventListener('blur', function() {
                            validateField('lastname');
                        });

                        document.getElementById('phone').addEventListener('blur', function() {
                            validatePhone();
                        });

                        document.getElementById('email').addEventListener('blur', function() {
                            validateField('email');
                        });

                        document.getElementById('numberofguest').addEventListener('blur', function() {
                            validateField('numberofguest');
                        });
                    </script>
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
        <?php include("./components/footer.php") ?>
    </div>
    <script src="../../assets/js/index.js">
    </script>
</body>

</html>