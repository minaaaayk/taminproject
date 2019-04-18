<!DOCTYPE html>
<html lang="fa" dir="rtl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Custom styles for this template -->

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url();?>includes/MDB/css/mdb.css" rel="stylesheet">

    <link href="<?php echo base_url();?>includes/MDB/css/compiled.min.css" rel="stylesheet">
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

<body class="fixed-sn light-blue-skin">
<style>

    html, body
    {
        background-color: white;
    }
    .navbar .form-inline > .form-group {
        margin: 0px;
    }
    .navbar .navbar-nav > li > a > span
    {
        padding-left: .4rem;
        padding-right: .4rem;
    }
    .navbar
    {
        -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);

    }
    input[type=text]:focus:not([readonly]),
    input[type=password]:focus:not([readonly]),
    input[type=email]:focus:not([readonly]),
    input[type=url]:focus:not([readonly]),
    input[type=time]:focus:not([readonly]),
    input[type=date]:focus:not([readonly]),
    input[type=datetime-local]:focus:not([readonly]),
    input[type=tel]:focus:not([readonly]),
    input[type=number]:focus:not([readonly]),
    input[type=search-md]:focus:not([readonly]),
    input[type=search]:focus:not([readonly]),
    textarea.md-textarea:focus:not([readonly]) {
        border-bottom: 0px !important;
        text-decoration:none;
        box-shadow: 0 1px 0 0; }
    .form-group.is-focused .form-control {
        outline: none !important;
        background-image: linear-gradient(#1cbbe4, #1cbae3), linear-gradient(#D2D2D2, #D2D2D2) !important;
        background-size: 100% 2px, 100% 1px;
        box-shadow: none;
        transition-duration: 0.3s;
    }
    .form-group.is-focused label
    {
        color: #206d81;
    }

    a:hover
    {
        background: none !important;
    }

    #search-sidenav
    {
        color: white;
        padding: 0px;
        background-image:none;
        border-bottom: 1px solid white;
    }

    #search-sidenav::-webkit-input-placeholder {
        color: white !important;
    }

    #search-sidenav:-moz-placeholder { /* Firefox 18- */
        color: white !important;
    }

    #search-sidenav::-moz-placeholder {  /* Firefox 19+ */
        color: white !important;
    }

    #search-sidenav:-ms-input-placeholder {
        color: white !important;
    }
    .form-group.is-focused #search-sidenav::-webkit-input-placeholder {
        color: rgba(225,241,255,0.7) !important;
    }

    .form-group.is-focused #search-sidenav:-moz-placeholder { /* Firefox 18- */
        color: rgba(225,241,255,0.7) !important;
    }

    .form-group.is-focused #search-sidenav::-moz-placeholder {  /* Firefox 19+ */
        color: rgba(225,241,255,0.7) !important;
    }

    .form-group.is-focused #search-sidenav:-ms-input-placeholder {
        color: rgba(225,241,255,0.7) !important;
    }
    .form-group.is-focused #search-sidenav
    {
        background:none !important;
        border-bottom:1px solid rgba(110,206,255,0.7) !important;
    }

    .cool-link {
        color: #fff;
        text-decoration: none;
    }

    .cool-link::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: #fff;
        transition: width .3s;
    }

    .cool-link:hover::after {
        width: 100%;
        transition: width .3s;
    }

</style>

<!--Main Navigation-->
<!--<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark unique-color scrolling-navbar" style="background-color: #206d81;padding: .5rem 1rem; box-shadow: none; border-radius: 0px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right; padding-right: 0px; right: 0px; margin-right: 0px;">
            <ul class="navbar-nav"  style="padding-right: 0px; right: 0px; margin-right: 0px; margin-left: auto; float: right;">
                <li class="nav-item active">
                    <a class="nav-link" href="#">خانه <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">لینک ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">پروفایل</a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand" href="#"><strong>سامانه قوانین</strong></a>
    </nav>
</header>-->
<!--Main Navigation-->
<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav  fixed mdb-sidenav" style="left: auto; right: 0px;display: none; background-color:rgb(10, 164, 43);">
        <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;" id="slidenav">
            <!-- Logo -->
            <div class="toppadding">
            </div>
            <!--Search Form-->
            <li>
                <form class="form-inline" role="search" style="border-top: none; margin: 0px;">
                    <div class="" style="margin: 0px; padding: 0px;">
                            <input class="form-control mr-sm-2" type="text" placeholder="جست و جو" aria-label="search" style=";" id="search-sidenav">
                    </div>
                </form>
            </li>
            <!--/.Search Form-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li class="nav-item-cool">
                        <a class="collapsible-header waves-effect arrow-r" style="text-align: right;"> افزودن...</a>
                        <div class="collapsible-body" >
                            <ul style="width: 100%; text-align: right;">
                                <li>
                                    <a href="#" class="waves-effect">قانون جدید</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">آیین نامه جدید</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">اصلاحیه جدید</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">بخشنامه جدید</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item-cool">
                        <a class="collapsible-header waves-effect arrow-r" style="text-align: right;"> مشاهده ی ...</a>
                        <div class="collapsible-body">
                            <ul style="width: 100%; text-align: right;">
                                <li>
                                    <a href="#" class="waves-effect">قوانین</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">آیین نامه ها</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">اصلاحیه ها</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">بخشنامه ها</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item-cool">
                        <a class="arrow-r" style="text-align: right;"> دریاقت صورت جلسه</a>
                    </li>
                    <li class="nav-item-cool">
                        <a class="arrow-r" style="text-align: right;">آخرین تغییرات</a>
                    </li>
                    <li class="nav-item-cool">
                        <a class="arrow-r" style="text-align: right;">خروج</a>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav " style="z-index: 2000; border-radius: 0px; background-color: #206d81;">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse" style="color: white;"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto" style="margin-top: 0px;">
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-home"></i> <span class="clearfix d-none d-sm-inline-block">صفحه اصلی</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">ارتباط با ما</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">پروفایل</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <div class="breadcrumb-dn mr-auto">
            <p>سامانه تنقیح قوانین</p>
        </div>
    </nav>
    <!-- /.Navbar -->
</header>
<!--/.Double navigation-->

<!-- container -->
<!--<div style="height: 2000px;" dir="ltr">
</div>-->
<!--Main Layout-->
<main>
    <div class="container-fluid mt-5" id="main-content">
        <h2 style="text-align: right;">اضافه کردن قانون جدید</h2>
        <br>
        <div class="md-form form-group" >
            <i class="fa fa-envelope prefix"></i>
            <input type="email" id="form91" class="form-control">
            <label for="form91" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">ایمیل</label>
        </div>
        <div style="height: 2000px"></div>
    </div>
</main>
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

<!--
@media (max-width: 575px) /*xs*/
@media (min-width: 576px) and (max-width: 767px) /*sm*/
@media (min-width: 768px) and (max-width: 991px) /*md*/
@media (min-width: 992px) and (max-width: 1199px) /*lg*/
@media (min-width: 1200px) /*xl*/
-->

<script>

    $('document').ready(function () {
        $('.nav-item-cool').addClass('cool-link');
        $('.collapsible-body a').css('background','none');
        $('.uk-button-text').css("text-decoration-color", "white");
        $('.uk-button-text').css("color", "white");
        $('.form-group.is-focused label').css("color","#206d81");
        $( window ).resize(function() {
            var w = $('body').width();
            console.log("w = ", w);
            $('.side-nav.fixed').css("transform","translateX(0%)");
            if(w<1420)
            {
                $('.toppadding').css("height","85px");
                $(".side-nav.fixed").hide();
                $("#main-content").css("padding-right","50px");

                if(w<575)
                {
                    $('.toppadding').css("height","45px");
                }
                else
                {
                    if(w < 767)
                    {
                        $('.toppadding').css("height","55px");
                    }
                }
            }
            else
            {
                $(".side-nav.fixed").show();
                $('.toppadding').css("height","90px");
                $("#main-content").css("padding-right","250px");
            }
        });


    });
    $( window ).on( "load", function()
    {
        var w = $('body').width();
        console.log("w = ", w);
        $('.side-nav.fixed').css("transform","translateX(0%)");
        if(w<1420)
        {
            $(".side-nav.fixed").hide();
            $('.toppadding').css("height","85px");
            $("#main-content").css("padding-right","50px");
            if(w<575)
            {
                $('.toppadding').css("height","45px");
            }
            else
            {
                if(w < 767)
                {
                    $('.toppadding').css("height","55px");
                }
            }
        }
        else
        {
            $(".side-nav.fixed").show();
            $('.toppadding').css("height","90px");
            $("#main-content").css("padding-right","250px");
        }

    });
    // SideNav Initialization
    $(".button-collapse").on('click',function() {
        /*$(".side-nav.fixed").toggle("slide", {direction: "right" }, 1000);*/

        if ($(".side-nav.fixed").css('display') == 'none') {
            $(".side-nav.fixed").animate({width: 'show'});
        } else {
            $(".side-nav.fixed").animate({width: 'hide'});
        }
    });
    $(".collapsible-header").on('click',function () {
       $(this).next().slideToggle( "slow" );;
    });

</script>
</body>
<script type="text/javascript">


</script>
</html>