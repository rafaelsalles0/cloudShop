<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsivo.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>CloudShop</title>
</head>
<body>
    <div class="container index">
        <?php include("header.php"); ?>

        <section class="banner">
            <a href="index.php" id="banner-link"><img src="img/banner/1.png" alt="" id="banner"></a>
            <div class="buttons">
                <button id="banner-left"><i class="fa fa-angle-left"></i></button>
                <input type="radio" value="1" name="banner-radio" checked>
                <input type="radio" value="2" name="banner-radio">
                <input type="radio" value="3" name="banner-radio">
                <input type="radio" value="4" name="banner-radio">
                <input type="radio" value="5" name="banner-radio">
                <button id="banner-right"><i class="fa fa-angle-right"></i></button>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            var banner = $("#banner").attr("src");
            banner = parseInt(banner.substring(banner.length - 5, banner.length - 4));
            
            $("#banner-left").on("click", function() {
                if(banner <= 1){
                    banner = 5;
                }else{
                    banner = banner - 1;
                }

                $("input[value="+banner+"]").attr("checked", "false");

                var url = "img/banner/"+banner+".png";
                $("#banner").attr("src", url);
            });

            $("#banner-right").on("click", function() {
                if(banner >= 5){
                    banner = 1;
                }else{
                    banner = banner + 1;
                }

                $("input[value="+banner+"]").attr("checked", "false");

                var url = "img/banner/"+banner+".png";
                $("#banner").attr("src", url);
            });

            $("input[name='banner-radio']").on("click", function() {
                var banner = $(this).val();

                var url = "img/banner/"+banner+".png";
                $("#banner").attr("src", url);
            });
        });
    </script>
</body>
</html>