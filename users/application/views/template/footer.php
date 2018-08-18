
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url();?>includes/bootstrap4.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="<?php echo base_url();?>includes/bootstrap4.1/assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url();?>includes/bootstrap4.1/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>includes/bootstrap4.1/assets/js/vendor/holder.min.js"></script>

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
            var uploadURI = "<?php echo base_url();?>users/upload/do_upload2";
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

        $("#add-law-btn").on( "click",function (e)
        {
            e.preventDefault();
            alert("hi");
            var dataString = $("#add-law-form").serialize();
            $.ajax({
                url: "<?php echo base_url();?>users/Employee/add_law_validate",
                type: 'POST',
                data:dataString,
                success: function (res) {
                    alert(res);
                },
                error: function (response) {
                    alert(response.status);
                    console.log(response);
                }
            });
            return false;
        });


        $("form .form-control").change(function(){
           $(this).removeClass("input-error");
           var id = $(this).attr('id');
           var errorId = "#" + id + "-error";
           $(errorId).html("");
           if(id == "passconf")
           {
               checkPasswordMatch();
           }
            if(id == "username")
            {
                $("#usererror").html("");
            }
            if(id == "email")
            {
                $("#mailerror").html("");
            }
        });

        $(".infobtn").on('click',function() {
            $('.infoprogress .progress-bar').css('width', '0');
            $('.prog').css('display', 'block');
            $.ajax({
                url: "<?php echo base_url();?>users/general/pageload/ajaxtest",
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
                    $('.prog').css('display', 'none');
                    $("#page").html(data);

                },
                error: function () {
                    $('.prog').css('display', 'none');
                }
            });
        });

        $("#add-some input:radio").on('click',function()
        {
            var url ="";
            if ($(this).val() == '1')
            {
                url = "add_law"
            }
            else
            {
                if ($(this).val() == '2')
                {
                    url = "add_bylaw"
                }
                else
                {
                    url = "add_correctness"
                }
            }
            $.ajax({
                url: url,
                type: "GET",
                // this part is progress bar
                success: function (res)
                {
                    var data = jQuery.parseJSON(res);
                    $("#add-l").html(data.theHTMLResponse);
                    getDate();
                    $('.dateform').removeClass("is-empty");
                    $(".datelable").addClass("active");

                    setTimeout(function(){
                        $( "#add-law-form input:checkbox" ).each(function() {
                            //console.log(this.checked);
                            if(this.checked == true)
                            {
                                var id = $(this).val();
                                //console.log(id);
                                var id = "#" + id;
                                $(id).attr('value',"");
                                $(id).prop('disabled', true);
                            }
                        });
                    }, 500);


                },
                error: function (e) {
                    alert(e.status);
                }
            });
        });

        $("#add-user-btn").on('click',function() {
            var dataString = $("#add-user").serialize();
            //alert(dataString);
            $.ajax({
                url: "<?php echo base_url();?>users/Admin/add_user_validate",
                type: "POST",
                data:dataString,
                success: function (res)
                {
                    //alert(res);
                    var data = jQuery.parseJSON(res);

                    if(data.status == "error")
                    {
                        if(data.ustatus == 1)
                        {
                            $("#usererror").html(data.r_username);
                            $("#passconf").addClass("input-error");
                        }
                        else {
                            $("#username").removeClass("input-error");
                        }
                        if(data.mstatus == 1) {
                            $("#mailerror").html(data.r_email);
                            $("#email").addClass("input-error");
                        }
                        else {
                            $("#email").removeClass("input-error");
                        }
                        if(data.vstatus == 1)
                        {
                            $("#fname-error").html(data.fname);
                            if(data.fname == "") {
                                $("#fname").removeClass("input-error");
                            } else {
                                $("#fname").addClass("input-error");
                            }
                            //-----------------------------------
                            $("#lname-error").html(data.lname);
                            if(data.lname == "") {
                                $("#lname").removeClass("input-error");
                            } else {
                                $("#lname").addClass("input-error");
                            }
                            //-----------------------------------
                            $("#email-error").html(data.emaill);
                            if((data.emaill == "") && (data.mstatus != 1)) {
                                $("#email").removeClass("input-error");
                            } else {
                                $("#email").addClass("input-error");
                            }
                            //-----------------------------------
                            $("#username-error").html(data.username);
                            if((data.username == "") && (data.ustatus != 1)) {
                                $("#username").removeClass("input-error");
                            } else {
                                $("#username").addClass("input-error");
                            }
                            //-----------------------------------
                            $("#password-error").html(data.password);
                            if(data.password == "") {
                                $("#password").removeClass("input-error");
                            } else {
                                $("#password").addClass("input-error");
                            }
                            //-----------------------------------
                            $("#passconf-error").html(data.passconf);
                            if(data.passconf == "") {
                                $("#passconf").removeClass("input-error");
                            } else {
                                $("#passconf").addClass("input-error");
                            }
                            //-----------------------------------
                            $("#type-error").html(data.type);
                            if(data.type == "") {
                                $("#type").removeClass("input-error");
                            } else {
                                $("#type").addClass("input-error");
                            }
                        }
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



        $("input:radio").attr("checked", false);

        $('#add-user input:radio').click(function()
        {
            if($("#type-error").text() != "")
            {

            }
            if ($(this).val() === '1')
            {
                if($('#admin').css('display') == 'none')
                {
                    $('#admin').css('display', 'block');
                }
                $('#employee').css('display', 'none');
                $('#expert').css('display', 'none');

            }
            else
            {
                if ($(this).val() === '2')
                {
                    $('#admin').css('display', 'none');
                    if($('#employee').css('display') == 'none')
                    {
                        $('#employee').css('display', 'block');
                    }
                    $('#expert').css('display', 'none');
                }
                else
                {
                    $('#admin').css('display', 'none');
                    $('#employee').css('display', 'none');
                    if($('#expert').css('display') == 'none')
                    {
                        $('#expert').css('display', 'block');
                    }
                }
            }
        });
        var datephp = '<?php echo date("Y-m-d", time());?>';
        $(".calender").datepicker({
            altField : "#calenderSelector",
            altSecondaryField : "#calenderSecondarySelector",
            format : "long",
            date   : datephp
        });



        $('.nav-item-cool').addClass('cool-link');
        $('.collapsible-body a').css('background','none');
        $('.uk-button-text').css("text-decoration-color", "white");
        $('.uk-button-text').css("color", "white");
        $('.form-group.is-focused label').css("color","#206d81");
        $( window ).resize(function() {
            var w = $('body').width();
            //console.log("w = ", w);
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
                $("#main-content").css("padding-right","220px");
            }

        });


        $("#myform").find(".form-group").hover(function () {
            $('.btn-uikit').addClass('color-btn');
            $('.btn-uikit').css('border', '1px solid white');
            $('.btn-uikit').css('background-color', '#cf4858');
        });
        $("#myform").find(".form-group").on("mouseleave", function () {
            $('.btn-uikit').css('background', 'none');
            $('.btn-uikit').removeClass('color-btn');
            $('.btn-uikit').css('border', '1px solid rgba(106,109,107,0.42)');

        });

        $("#add-user #passconf").keyup(checkPasswordMatch);


        $( ".art-tbl" ).each(function() {
            var str = $(this).html();
            var res = str.substr(0, 20);
            $(this).html(res + "...");
        });





    });
    //---end-ready-----------------------------------------------------------------------

    function changeCheckBox(elm)
    {
        var id = $(elm).val();
        var id = "#" + id;
        if (elm.checked) {
            $(id).attr('value',"");
            $(id).prop('disabled', true);

            var errorId = id + "-error";
            $(errorId).text("");
            $(id).removeClass("input-error");
        } else {
            var input_date = '<?php echo date("Y-m-d", time());?>';
            var post_data = {
                'current_date': input_date
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>users/general/convert_to_jalali/",
                data: post_data,
                success: function (res) {
                    // return success
                    if(res.length>0)
                    {
                        var data = jQuery.parseJSON(res);
                        $(id).prop('disabled', false);
                        $(id).attr('value',data.date);
                        CheckDate(id);
                    }
                }
            });
        }
    }
    function CheckDate(elm) {
        var id = $(elm).attr('id');
        var id = "#" + id ;
        var errorId = id + "-error";
        var error = "";
        var dateformat = /^(\d{4})\/(0?[1-9]|1[012])\/(0?[1-9]|[12][0-9]|3[01])$/;
        var Val_date=$(elm).val();
        if(Val_date.match(dateformat)){
            var seperator1 = Val_date.split('/');
            var seperator2 = Val_date.split('-');

            if (seperator1.length>1) {
                var splitdate = Val_date.split('/');
            }
            else if (seperator2.length>1) {
                var splitdate = Val_date.split('-');
            }
            var yy = parseInt(splitdate[0]);
            var mm  = parseInt(splitdate[1]);
            var dd = parseInt(splitdate[2]);
            console.log("day : " + dd);
            console.log("month : " + mm);
            console.log("year : " + yy);
            var ListofDays = [31,31,31,31,31,31,30,30,30,30,30,29];
            if (mm==1 || mm>2) {
                if (dd>ListofDays[mm-1]) {
                    console.log(1);
                    error = "تاریخ معتبر نمی باشد";
                }
            }
            if (mm==12) {
                var lyear = false;
                if (yy%4==3) {
                    lyear = true;
                }
                if ((lyear==false) && (dd>29)) {
                    console.log(2);
                    error = "تاریخ معتبر نمی باشد";
                }
            }
        }
        else
        {
            console.log(3);
            error = "تاریخ معتبر نمی باشد";
        }
        $(errorId).text(error);
        if(error == "") {
            $(id).removeClass("input-error");
        } else {
            $(id).addClass("input-error");
        }
    }
    function somsom(elm){

        $('.myprogress').css('display', 'block');
        $('.myprogress').css('width', '0');
        $('.msg').text('');
        var myfile = $(elm).val();
        var formData = new FormData();
        var uploadURI = "<?php echo base_url();?>users/upload/do_upload2";
        formData.append('myfile', $(elm)[0].files[0]);
        //$('#btn').attr('disabled', 'disabled');
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
                console.log(duce);
                $('.msg').text("");
                if(duce.status > 0)
                {
                    // $('#FN').text(duce.filename);
                    $('.file-name-law').val(duce.filename);
                    $('.file-path').val(duce.path);
                    $(".file-name-law").removeClass("input-error");
                }
                else
                {
                    $('.msg').text(duce.errors);
                    $(".file-name-law").addClass("input-error");
                }

                //$('#btn').removeAttr('disabled');
            }
        });
        $('.myprogress').css('display', 'none');
    };
    function checkPasswordMatch() {
        var password = $("#add-user #password").val();
        var confirmPassword = $("#add-user #passconf").val();

        if (password != confirmPassword) {
            $("#add-user #passconf-error").html("با کلمه عبور یکسان نیست");
            $("#add-user #passconf").addClass("input-error");
        } else{
            $("#add-user #passconf-error").html("");
            $("#add-user #passconf").removeClass("input-error");
        }
    }

    $( window ).on( "load", function()
    {
        var w = $('body').width();
        //console.log("w = ", w);
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
            $("#main-content").css("padding-right","220px",'important');
        }

        getDate();
        $('.dateform').removeClass("is-empty");
        $(".datelable").addClass("active");


        if(($('#add-user input:radio').is(':checked')))
        {
            if (($('#add-user input:radio').val() == '1'))
            {
                if ($('#admin').css('display') == 'none') {
                    $('#admin').css('display', 'block');
                }
                $('#employee').css('display', 'none');
                $('#expert').css('display', 'none');

            }
            else
            {
                if ($('#add-user input:radio').val() == '2')
                {
                    if ($('#employee').css('display') == 'none') {
                        $('#employee').css('display', 'block');
                    }
                    $('#admin').css('display', 'none');
                    $('#expert').css('display', 'none');

                }
                else
                {
                    if ($('#add-user input:radio').val() == '3')
                    {
                        if ($('#expert').css('display') == 'none') {
                            $('#expert').css('display', 'block');
                        }
                        $('#admin').css('display', 'none');
                        $('#employee').css('display', 'none');

                    }
                }
            }
        }
        else
        {
            $('#admin').css('display', 'none');
            $('#employee').css('display', 'none');
            $('#expert').css('display', 'none');
        }


    });
    //--- end  page load -----------------------
    // SideNav Initialization

    function add_Law(event){
        alert("hi");
        var dataString = $("#add-law-form").serialize();
        $.ajax({
            url: "<?php echo base_url();?>users/Employee/add_law_validate",
            type: 'POST',
            data:dataString,
            //async: true,
            cache: false,
            success: function (res) {
                alert(res);
                var data = jQuery.parseJSON(res);
                /*if(data.ok == 0) {
                    $("#title-error").html(data.title);
                    if(data.title == "") {
                        $("#title").removeClass("input-error");
                    } else {
                        $("#title").addClass("input-error");
                    }
                    //-----------------------------------
                    $("#path-error").html(data.path);
                    if(data.path == "") {
                        $(".file-name-law").removeClass("input-error");
                    } else {
                        $(".file-name-law").addClass("input-error");
                    }
                }
                else {
                    alert(data.post);
                    // window.location.href = data.redirect_url;
                }*/
            },
            error: function (response) {
                alert(response.status);
                console.log(response);
            }
        });
        return false;
    }

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
       // $(".calicon").css('color', 'rgba(148,151,149,0.7)');

    });
    /*$("select").on( "focus",function() {

        $('').removeClass("uk-button-default");
        $("").addClass("uk-button-danger");
    });
    $("select").on( "focusout",function() {
        $('').removeClass("uk-button-danger");
        $("").addClass("uk-button-default");
    });*/
    function getDate() {
        var input_date = '<?php echo date("Y-m-d", time());?>';
        var post_data = {
            'current_date': input_date
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>users/general/convert_to_jalali/",
            data: post_data,
            success: function (res) {
                // return success
                if(res.length>0)
                {
                    var data = jQuery.parseJSON(res);
                    $('.date-shamsi').attr('value',data.date);
                }
            }
        });
    }

    $(".collapsible-header").on('click',function () {
        $(this).next().slideToggle( "slow" );
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