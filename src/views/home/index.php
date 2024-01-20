<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../assets/css/header.css" />
    <link rel="stylesheet" href="../../../assets/css/footer.css" />
    <link rel="stylesheet" href="../../../assets/css/home.css" />
    <link rel="stylesheet" href="../../../assets/css/styles.css" />
    <link rel="stylesheet" href="../../../assets/css/meetings-events.css">
    <link rel="stylesheet" href="js/index.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>RESORT BOOKING PROJECT</title>
    <style>
        .custom-alert {
            z-index: 99999;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #E84C3D;
            text-align: center;
            padding: 150px;
            font-size: 50px;
            font: 20px Helvetica, sans-serif;
            color: #fff;
        }

        #img360 {
            border-radius: 100px;
            font: 20px Helvetica, sans-serif;
            color: #fff;
            margin-left: 0px;
            -webkit-animation: spin 4s linear infinite;
            -moz-animation: spin 4s linear infinite;
            animation: spin 4s linear infinite;
        }


        .close span {
            font-size: 24px;
            margin-left: 10px;
            line-height: 0;
        }
    </style>
</head>

<body>
    <div class="layout-wrapper" style="z-index: 1; position: relative;">
        <?php include("./homepage.php") ?>
        <?php include("../components/footer.php") ?>
    </div>

    <script>
        $(window).on("scroll", function() {
            if ($(window).scrollTop() > 50) {
                $(".header-wrapper").addClass("active");
            } else {
                $(".header-wrapper").removeClass("active");
            }
        });
    </script>

</body>

</html>