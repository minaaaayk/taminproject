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

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700" rel="stylesheet">

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
    <link rel="stylesheet" href="<?php echo base_url();?>includes/custom/css/dashboard_style.css">
</head>

<body class="fixed-sn light-blue-skin">
<style>

</style>
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
                <ul class="collapsible collapsible-accordion" >
                    <li class="nav-item-cool" style="">
                        <a class="collapsible-header waves-effect arrow-r" style="text-align: right;"> افزودن...</a>
                        <div class="collapsible-body" >
                            <ul style="width: 100%; text-align: right; !important;">
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

        <div style="margin: 250px auto;" id="main2">
            <div class="row">
                <div class="col-12">
                    <button class="uk-button uk-button-default infobtn uk-margin uk-position-center" data-toggle="modal" data-target="#calmodal">نشان دادن اصلاعات</button>
                </div>
            </div>

            <div class="progress infoprogress" style="display: none;">
                <div class="progress-bar progress-bar-info " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>

            <div id="page">

            </div>

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
<script src="<?php echo base_url();?>includes/datepicker/datepicker.js"></script>


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

        $('#myfile').on('change',function () {
            $('.myprogress').css('width', '0');
            $('.msg').text('');
            var filename = $('#filename').val();
            var myfile = $('#myfile').val();
            if (filename == '' || myfile == '') {
                alert('Please enter file name and select file');
                return;
            }
            var formData = new FormData();
            var uploadURI = "<?php echo base_url();?>index.php/upload/do_upload2";
            formData.append('myfile', $('#myfile')[0].files[0]);
            formData.append('filename', filename);
            $('#btn').attr('disabled', 'disabled');
            $('.msg').text('Uploading in progress...');
            $.ajax({
                url: uploadURI,
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                // this part is progress bar
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            /*$('.myprogress').text(percentComplete + '%');*/
                            $('.myprogress').css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                    var duce = jQuery.parseJSON(data);
                    $('.msg').text("");
                    if(duce.status > 0)
                    {
                        $('#FN').text(duce.filename);
                    }
                    else
                    {
                        $('.msg').text(duce.errors);
                    }

                    $('#btn').removeAttr('disabled');
                }
            });
        });

        $(".infobtn").on('click',function() {
            $('.infoprogress .progress-bar').css('width', '0');
            $('.infoprogress').css('display', 'block');
            $.ajax({
                url: "<?php echo base_url();?>users/index.php/general/pageload/ajaxtest",
                type: "GET",
                // this part is progress bar
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputasble) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            /*$('.myprogress').text(percentComplete + '%');*/
                            $('.infoprogress .progress-bar').css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function (data) {
                    $('.infoprogress').css('display', 'none');
                    $("#page").html(data);

                },
                error: function () {
                    $('.infoprogress').css('display', 'none');
                }
            });
        });


        var datephp = '<?php echo date("Y-m-d", time());?>';
        $(".calender").datepicker({
            altField : "#calenderSelector",
            altSecondaryField : "#calenderSecondarySelector",
            format : "long",
            date   : datephp,
        });


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


        $("#myform .form-group").hover(function () {
            $('.btn-uikit').addClass('color-btn');
            $('.btn-uikit').css('border', '1px solid white');
            $('.btn-uikit').css('background-color', '#cf4858');

        });
        $("#myform .form-group").on("mouseleave", function () {

            $('.btn-uikit').css('background', 'none');
            $('.btn-uikit').removeClass('color-btn');
            $('.btn-uikit').css('border', '1px solid rgba(106,109,107,0.42)');

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
        getDate();
        $('.dateform').removeClass("is-empty");
        $(".datelable").addClass("active");

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

    $("#okcal").on('click',function() {
        getDate();
    });

    $(".dateinput").on( "focus",function() {

        $('.calbtn').removeClass("uk-button-default");
        $(".calbtn").addClass("uk-button-danger");
    });
    $(".dateinput").on( "focusout",function() {
        $('.calbtn').removeClass("uk-button-danger");
        $(".calbtn").addClass("uk-button-default");
    });
    function getDate() {
        var input_date = $('#calenderSecondarySelector').val();
        var post_data = {
            'current_date': input_date,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/general/convert_to_jalali/",
            data: post_data,
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $('#tasvib-date').attr('value',data);
                }
            }
        });
    }

    $(".collapsible-header").on('click',function () {
        $(this).next().slideToggle( "slow" );;
    });

</script>
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


</body>
<script type="text/javascript">


</script>
</html>