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
</head>

<body style="background-color: #f7f7f7;">

<!--Main Navigation-->
<header>


</header>
<!--Main Navigation-->

<main class="row uk-padding ">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <!-- Material form subscription -->
        <div class="card">

            <p style="font-size: 1.1rem" class="card-header info-color white-text text-center py-4">ورود به سامانه</p>

            <!--Card content-->
            <div class="card-body px-lg-5" style="" id="part1">

                <!-- Form -->
                <div class="text-center" style="color: #757575;">
                    <span class="uk-icon-button" uk-icon="icon: check; ratio: 3.4"></span>
                    <p  style="font-size: 1rem"> عملیات فعال سازی با موفیت انجام شد</p>
                    <p  style="font-size: .75rem"><?php if (isset($name)) echo $name;?> اکنون شما به سامانه وارد شدید</p>

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block z-depth-0 my-4 waves-effect" id="continue">ادامه</button>
                    <button class="btn btn-outline-info  btn-block z-depth-0 my-4 waves-effect" id="change" type="submit">تغییر کلمه عبور</button>

                </div>
                <!-- Form -->
            </div>
            <div class="card-body px-lg-5" style="display: none" id="part2">

                <p  style="font-size: 1rem">کلمه عبور جدید خود را وارد کنید:</p>
                <!-- Form -->
                <form class="text-center" style="color: #757575;" dir="rtl">

                    <div class="md-form">
                        <input type="password" id="pass1" name="pass1" class="form-control">
                        <label for="pass1">کلمه عبور</label>
                    </div>
                    <div class="md-form">
                        <input type="password" id="pass2" name="pass2" class="form-control">
                        <label for="pass2">تکرار کلمه عبور</label>
                    </div>
                    <p>
                    <div class="error-pass"></div>
                    </p>
                    <!-- Sign in button -->
                    <button id="reset" class="btn btn-info  btn-block z-depth-0 my-4 waves-effect" type="submit">اعمال تغییر </button>
                </form>
                <button class="btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" id="cancle">انصراف</button>

            </div>
        <!-- Material form subscription -->
        </div>
    </div>
    <div class="col-md-4"></div>
</main>

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

<script>

    $(document).ready(function() {

        $("#reset").on('click',function() {
            var	pass1 =$('input[name=pass1]').val();
            var	pass2 =$('input[name=pass2]').val();
            if(pass1 != '')
            {
                if(pass2 != '')
                {
                    if(pass1 == pass2)
                    {
                        $.ajax({
                            url: "<?php echo base_url();?>users/index.php/Login/reset",
                            type: "POST",
                            data: {"pass1" : pass1},
                            success: function (res) {
                                //alert(res);
                                var data = jQuery.parseJSON(res);
                                if(data.status == "error")
                                {
                                    $("#part2 .error-forgot").html(data.message);
                                }
                                if (data.status == "success")
                                {
                                    UIkit.modal.alert('<p class="uk-modal-body" style="text-align: right">تغببر کلمه عبور با موفقیت انجام شد</p>');
                                    window.location.href = data.redirect_url;
                                }
                            },
                            error: function (response) {

                                $("#part2 .error-pass").html("اتصال خود را به اینترنت چک کنید");
                            }
                        });
                    }
                    else
                    {
                        $("#part2 .error-pass").html("رمز عبور با تکرار آن مطابقت ندارد");
                    }
                }
                else
                {
                    $("#part2 .error-pass").html("تکرار کلمه عبور نمیتواند خالی باشد");
                }
            }
            else
            {
                $("#part2 .error-pass").html("کلمه عبور نمیتواند خالی باشد");
            }

            return false;
        });

        $("#change").on('click',function() {
            $("#part1").css("display","none");
            $("#part2").css("display","block");

        });

        $("#cancle").on('click',function() {
            window.location.href = "<?php echo base_url()?>users/login/redirect_dashboard";
        });
        $("#continue").on('click',function() {
            window.location.href = "<?php echo base_url()?>users/login/redirect_dashboard";
        });


        $("#part2 .form-control").change(function(){
            $("#part2 .error-pass").html("");
        });

    });

</script>
</body>
</html>
