<!DOCTYPE html>
<html lang="fa" dir="rtl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>ورود کاربران</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Custom styles for this template -->

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url();?>includes/MDB/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url();?>includes/MDB/css/style.css" rel="stylesheet">



    <link href="<?php echo base_url();?>includes/custom/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/custom/css/main.structure.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/custom/css/provisional.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>includes/uikit/css/uikit-rtl.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>includes/custom/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>includes/material-uikit/css/material-kit.css">

    <link rel="stylesheet" href="<?php echo base_url();?>includes/custom/css/style.css">
</head>

<body>
<style>
    @-webkit-keyframes autofill {
        to {
            color: white;
            background: transparent;
        }
    }
    input:-webkit-autofill {
        -webkit-animation-name: autofill;
        -webkit-animation-fill-mode: both;
    }
    .wrapper {

        width:150px;
        height:300px;

    }

    .text-wrapper {
        position:absolute;
        bottom:0;
        left:0;
        width:100%;
        height:200px;
    }

    .navbar .form-inline > .form-group {
        margin: 0px;
    }
    .navbar .navbar-nav > li > a
    {
        padding-top: .3rem;
        padding-bottom:.3rem;
    }
    .cover-body-inner
    {
        z-index: 3;
    }

</style>

<!--Main Navigation-->
<header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse float-right" id="navbarSupportedContent-7" style="padding-right: 0px; right: 0px; margin-right: 0px; margin-left: auto;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>">
                            <i class="fa fa-home" >
                            </i> <span class="clearfix d-none d-sm-inline-block">صفحه اصلی</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fa fa-search-plus"></i>
                            </i> <span class="clearfix d-none d-sm-inline-block">جست و جوی پیشرفته</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link">
                            <i class="fa fa-sign-in"></i>
                            </i> <span class="clearfix d-none d-sm-inline-block">ورود<span class="sr-only">(current)</span></span>
                        </a>
                    </li>
                </ul>
                <form class="form-inline" style="margin: 0px; padding: 0px;">
                    <input class="form-control mr-sm-2" type="text" placeholder="جست و جو" aria-label="Search" style="background: none; transition:none;" id="topnav-search">
                </form>
            </div>
            <a class="navbar-brand" href="#"><strong>سامانه قوانین</strong></a>
        </div>
    </nav>

</header>
<!--Main Navigation-->
<!-- container -->
<div class="wrapper" dir="ltr">
    <div class="text-wrapper">
        <div class="cover-body">
            <div class="cover-body-inner">

                <div class="cover-description">


                    <form id="login-form" class="uk-form-stacked" dir="rtl" action="<?php echo base_url();?>users/login/auth" method="post" autocomplete="new-password">

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user" style="color: white;"></span>
                                <input autocomplete="new-password"  name="username" id="username" class="uk-input" value="" type="text" placeholder="نام کاربری" style="background: none; color: white;" >
                            </div>
                        </div>


                        <div class="uk-margin">
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: lock" style="color: white;"></span>
                                <input autocomplete="new-password"  name="password" id="password" class="uk-input " type="password" placeholder="رمز عبور" style="background: none; color: white;">
                            </div>
                        </div>
                        <label><input class="uk-checkbox w3-margin " name="remember" id="remember" value="1" checked type="checkbox">مرا بخاطر بسپار</label>
                        <button type="submit" name="submit" value="login" id="login" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">ورود</button>
                        <button  name="forgot" value="forgot" class="uk-button uk-button-default uk-width-1-1 " style="color: white;">رمز عبور را فراموش کردم</button>
                    </form>
                </div>
                <div class="cover-actions"> </div>
                <div id="login-errors" style="text-align: right; color: white;" dir="rtl"></div>
            </div>
        </div>
    </div>
    <div class="cover-img cover-img__b"></div>
    <div class="cover-img cover-img__a"></div>
</div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<!-- Holder.js for placeholder images -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="<?php echo base_url();?>includes/uikit/js/uikit.min.js"></script>
<script src="<?php echo base_url();?>includes/uikit/js/uikit-icons.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url();?>includes/MDB/js/mdb.min.js"></script>

<script src="<?php echo base_url();?>includes/material-uikit/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>includes/material-uikit/js/material.min.js"></script>
<script src="<?php echo base_url();?>includes/material-uikit/js/material-kit.js"></script>
<script src="<?php echo base_url();?>includes/material-uikit/js/nouislider.min.js"></script>


<script src="<?php echo base_url();?>includes/custom/js/NOSlideShow.js"></script>
<script>


    var mySlideShow = new SlideShow('projectSlides');
    mySlideShow.container.label = $(".cover-subtitle");
    mySlideShow.container.image = $(".cover-img.cover-img__a");
    mySlideShow.container.background = $(".cover-img.cover-img__b");

    // Set Slides.
    mySlideShow.setSlides([{image: '<?php echo base_url();?>includes/pic/bg01.jpg'},
        {image: '<?php echo base_url();?>includes/pic/bg02.jpg'},
        {image: '<?php echo base_url();?>includes/pic/bg03.jpg'},
        {image: '<?php echo base_url();?>includes/pic/bg04.jpg'}
    ]);

    // Display first slide.
    mySlideShow.displaySlide();

    // Loop slides.
    var showInterval = setInterval("mySlideShow.advanceSlide()", 3000);

    // Layout
    function adjustCoverImage() {
      var width = $(".cover").width();
      var height = width * 0.50;
      $(".cover").height(height+'px');
    }

    $(window).resize(function() {
      adjustCoverImage();
    });

    $(document).ready(function() {


        $("#login").on('click',function() {
            var dataString = $("#login-form").serialize();
            $.ajax({
                url: "<?php echo base_url();?>users/index.php/Login/auth",
                type: "POST",
                data: dataString,
                success: function (res) {
                    //alert(res);
                    var data = jQuery.parseJSON(res);
                    if(data.status == "error")
                    {
                        $("#login-errors").html(data.message);
                    }
                    if (data.status == "success")
                    {
                        window.location.href = data.redirect_url;
                    }

                },
                error: function (response) {
                    alert(response.status);
                }
            });
            return false;
        });
      adjustCoverImage();
      $(".uk-button").width( $(".uk-input").width() - 10);
      $(".uk-button").css("display", "block");
      $("label").css("display", "block");
      $("#show").prop('checked', false);
    });

    function pass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

</script>
</body>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</html>
