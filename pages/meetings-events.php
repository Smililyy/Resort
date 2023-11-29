<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/header.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="../css/meetings-events.css" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../js/index.js" />

  <title>MEETINGS AND EVENTS</title>
</head>

<body>
    <div class="layout-wrapper">
        <div class="layout-container">
            <?php include("header.php") ?>
        </div>
        
       
        <?php include("footer.php") ?>
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