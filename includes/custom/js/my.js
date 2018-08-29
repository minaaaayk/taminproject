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
        var uploadURI = uploadURL;
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
        var dataString = $("#add-law-form").serialize();
        $.ajax({
            url: addLawURL,
            type: 'POST',
            data:dataString,
            success: function (res) {
                var data = jQuery.parseJSON(res);
                //UIkit.modal.alert(res);
                //alert(data.post);

                if(data.ok == 0)
                {
                    UIkit.modal.alert("درست نیست!");
                    $("#title-error").html(data.title);
                    if (data.title == "") {
                        $("#title").removeClass("input-error");
                        $("#title-error").removeClass("msg");
                    } else {
                        $("#title").addClass("input-error");
                        $("#title-error").addClass("msg");
                    }
                    //-----------------------------------
                    $("#path-error").html(data.path);
                    if (data.path == "") {
                        $("#path-error").removeClass("msg");
                    } else {
                        $("#path-error").addClass("msg");
                    }
                    //-----------------------------------
                    $("#tasvib-date-error").html(data.tasvib_date);
                    if (data.tasvib_date == "") {
                        $("#tasvib-date").removeClass("input-error");
                        $("#tasvib-date-error").removeClass("msg");
                    } else {
                        $("#tasvib-date").addClass("input-error");
                        $("#tasvib-date-error").addClass("msg");
                    }
                    //-----------------------------------
                    $("#eblagh-date-error").html(data.eblagh_date);
                    if (data.eblagh_date == "") {
                        $("#eblagh-date").removeClass("input-error");
                        $("#eblagh-date-error").removeClass("msg");
                    } else {
                        $("#eblagh-date").addClass("input-error");
                        $("#eblagh-date-error").addClass("msg");
                    }
                    //-----------------------------------
                    $("#enteshar-date-error").html(data.enteshar_date);
                    if (data.enteshar_date == "") {
                        $("#enteshar-date").removeClass("input-error");
                        $("#enteshar-date-error").removeClass("msg");
                    } else {
                        $("#enteshar-date").addClass("input-error");
                        $("#enteshar-date-error").addClass("msg");
                    }
                    //-----------------------------------
                    $("#emza-date-error").html(data.emza_date);
                    if (data.emza_date == "") {
                        $("#emza-date").removeClass("input-error");
                        $("#emza-date-error").removeClass("msg");
                    } else {
                        $("#emza-date").addClass("input-error");
                        $("#emza-date-error").addClass("msg");
                    }
                    //-----------------------------------
                    $("#tasvib-date-error").html(data.taeid_date);
                    if (data.taeid_date == "") {
                        $("#taeid-date").removeClass("input-error");
                        $("#taeid-date-error").removeClass("msg");
                    } else {
                        $("#taeid-date").addClass("input-error");
                        $("#taeid-date-error").addClass("msg");
                    }
                    //-----------------------------------
                    $("#eblagh-num-error").html(data.eblagh_num);
                    if (data.eblagh_num == "") {
                        $("#eblagh-num").removeClass("input-error");
                        $("#eblagh-num-error").removeClass("msg");
                    } else {
                        $("#eblagh-num").addClass("input-error");
                        $("#eblagh-num-error").addClass("msg");
                    }
                    //-----------------------------------
                }
                else
                {
                    UIkit.modal.alert("درسته!");
                }

            },
            error: function (response) {
                alert(response.status);
                console.log(response);
            }
        });
        return false;
    });


    $(".dateinput").change(function(){
        var id = "#" + $(this).attr('id');
        //------------------------????????????????????????-------------------
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
            url: pageLoadURL,
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

    $("#add-user-btn").on('click',function() {
        var dataString = $("#add-user").serialize();
        //alert(dataString);
        $.ajax({
            url: addUserURL,
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
    var datephp = datefooter;
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
                $("#main-content").css("padding-right","10px");
            }
            else
            {
                if(w < 767)
                {
                    $('.toppadding').css("height","55px");
                    $("#main-content").css("padding-right","30px");
                }
            }
        }
        else
        {
            $(".side-nav.fixed").show();
            $('.toppadding').css("height","90px");
            $("#main-content").css("padding-right","150px");
        }

        if(w< 566)
        {
            $("#law-sh").removeClass("uk-card");
            $("#law-sh").removeClass("uk-card-default");
        }
        else
        {
            $("#law-sh").addClass("uk-card");
            $("#law-sh").addClass("uk-card-default");
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


    cutttable(40);




});
//---end-ready-----------------------------------------------------------------------

function cutttable(num) {
    $( ".art-tbl" ).each(function() {
        var str = $(this).html();
        var res = str.substr(0, num);
        $(this).html(res + "...");
    });

}
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
        if (id == "#eblagh-date")
        {
            $( "#eblagh" ).slideUp( "slow");
        }
    } else {
        if (id == "#eblagh-date")
        {
            $( "#eblagh" ).slideDown( "slow" );
        }

        var input_date = dateJS;
        var post_data = {
            'current_date': input_date
        };

        $.ajax({
            type: "POST",
            url: dateConvertURL,
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
    if(Val_date == "")
    {
        error = "تاریخ معتبر نمی باشد";
    }
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
    var uploadURI = uploadURL;
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
    $('.dateform').removeClass("is-empty");
    $('.dateform input:not(#tasvib-date)').prop('disabled', true);
    $(".datelable").addClass("active");

    getDate();
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
            $("#main-content").css("padding-right","10px");
        }
        else
        {
            if(w < 767)
            {
                $('.toppadding').css("height","55px");
                $("#main-content").css("padding-right","30px");
            }
        }
    }
    else
    {
        $(".side-nav.fixed").show();
        $('.toppadding').css("height","90px");
        $("#main-content").css("padding-right","150px",'important');
        $("#main-content").css("padding-left","0px",'important');
        $("#main-content").css("margin-left","90px",'important');

    }
    if(w< 566)
    {
        $("#law-sh").removeClass("uk-card");
        $("#law-sh").removeClass("uk-card-default");
    }


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
    var input_date =dateJS;
    var post_data = {
        'current_date': input_date
    };

    $.ajax({
        type: "POST",
        url: dateConvertURL,
        data: post_data,
        success: function (res) {
            // return success
            if(res.length>0)
            {
                var data = jQuery.parseJSON(res);
                $('.date-shamsi:enabled').attr('value',data.date);
            }
        }
    });
}

$(".collapsible-header").on('click',function () {
    $(this).next().slideToggle( "slow" );
});
//--------------------------------------show law---------------------------------------
var sendRequest = function(){
    var searchKey = $('#searchKey').val();
    var limitRows = $('#limitRows').val();
    window.location.href = showAllLawURL + '?query='+searchKey+'&limitRows='+limitRows+'&orderField='+curOrderField+'&orderDirection='+curOrderDirection;
}


var getNamedParameter = function (key) {
    if (key == undefined) return false;

    var url = window.location.href;
    //console.log(url);
    var path_arr = url.split('?');
    if (path_arr.length === 1) {
        return null;
    }
    path_arr = path_arr[1].split('&');
    path_arr = remove_value(path_arr, "");
    var value = undefined;
    for (var i = 0; i < path_arr.length; i++) {
        var keyValue = path_arr[i].split('=');
        if (keyValue[0] == key) {
            value = keyValue[1];
            break;
        }
    }

    return value;
};


var remove_value = function (value, remove) {
    if (value.indexOf(remove) > -1) {
        value.splice(value.indexOf(remove), 1);
        remove_value(value, remove);
    }
    return value;
};


var curOrderField, curOrderDirection;
$('[data-action="sort"]').on('click', function(e){
    curOrderField = $(this).data('title');
    curOrderDirection = $(this).data('direction');
    sendRequest();
});


$('#searchKey').val(decodeURIComponent(getNamedParameter('query')||""));
$('#limitRows option[value="'+getNamedParameter('limitRows')+'"]').attr('selected', true);

var curOrderField = getNamedParameter('orderField')||"";
var curOrderDirection = getNamedParameter('orderDirection')||"";
var currentSort = $('[data-action="sort"][data-title="'+getNamedParameter('orderField')+'"]');
if(curOrderDirection=="ASC"){
    currentSort.attr('data-direction', "DESC").find('span.iconTBL').attr('uk-icon', "triangle-up");
}else{
    currentSort.attr('data-direction', "ASC").find('span.iconTBL').attr('uk-icon', "triangle-down");
}