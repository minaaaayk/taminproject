<div id="add-some" class="uk-card uk-card-default uk-card-body">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-9">
            <h3 style="text-align: right;">افزودن </h3>
        </div>
        <div class="col-md-1">
        </div>
    </div>


    <div class="uk-position-relative uk-margin-medium" dir="rtl" style="text-align: right;">

        <ul uk-tab="" class="uk-tab">
            <li aria-expanded="false" class=""><a href="#">قانون</a></li>
            <li aria-expanded="false" class=""><a href="#"> آیین نامه</a></li>
            <li aria-expanded="false" class=""><a href="#"> بخش نامه</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
            <!-----------------------1----------------------------------->
            <li class="">
                <div dir="rtl">

                    <div class="row  justify-content-md-center">
                        <div class="col-md-10 offset-lg-2">
                            <form class="md-form law-input-file">
                                <div class="filelaw row  justify-content-md-center">
                                    <div class="col-md-3" style="padding-bottom: 0px !important; margin-bottom: 0px !important; bottom: 0px !important;padding-bottom: 0px !important;left:0px; padding-left: 0px; float: left;">
                                        <div class="btn btn-primary btn-sm float-right waves-effect waves-light" style="display: inline-block; left:0px !important; float: left !important; margin-right: auto !important;">
                                            <span>انتخاب فایل</span>
                                            <input type="file" class="file-law" onchange='somsom(this)'/>
                                        </div>
                                    </div>

                                    <div class="col-md-9" style="">
                                        <div class="md-form form-group input-form file-path-wrapper" style="display: inline; width: 100%">
                                            <input class="form-control file-name-law" id="" style=" margin: 0px !important; bottom: 0px !important;padding-bottom: 0px !important;" type="text" placeholder="فایل خود را آپلود نمایید">
                                        </div>
                                        <div class="msg"></div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="row  justify-content-md-center">
                        <div class="col-md-9 error" id="path-error">
                        </div>
                    </div>


                    <div class="row prog" style="display: none;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group col-xl-12">
                                <div class="">
                                    <progress  id="js-progressbar" class="uk-progress"  value="" max="100"></progress>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>

                <form id="add-law-form" method="post" dir="rtl">
                    <!--<form action="" method="post" dir="rtl" id="add-law-form" onsubmit="add_Law(this)" method="post">-->

                    <div class="row  justify-content-md-center">
                        <div class="col-md-9">
                            <div class="md-form form-group input-form">
                                <i class="fa fa-pencil-square-o prefix"></i>
                                <input type="text" id="title" name="title" class="form-control">
                                <label for="title" data-error="wrong" data-success="right" dir="rtl">عنوان</label>
                            </div>

                        </div>
                    </div>
                    <div class="row  justify-content-md-center">
                        <div class="col-md-9 error" id="title-error">
                        </div>
                    </div>

                    <input class="file-path" name="path" type="hidden">


                    <div class="row  justify-content-md-center uk-margin-top">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="md-form form-group input-form dateform">
                                        <i class="fa fa-calendar calicon"></i>
                                        <input type="text" class="form-control dateinput date-shamsi" id="tasvib-date" name="tasvib-date" onchange="CheckDate(this)">
                                        <label for="tasvib-date" class="datelable" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">تاریخ تصویب</label>
                                    </div>
                                </div>
                                <!--<div class="col-xl-5 col-lg-4 col-md-3 col-sm-4 col-10 cal-btn-column">
                                    <div class="uk-button uk-button-default calbtn" data-toggle="modal" data-target="#calmodal">انتخاب از تقویم</div>
                                </div> -->
                                <div class="col-xl-5 col-lg-4 col-md-3 col-sm-4 col-10">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  justify-content-md-center">
                        <div class="col-md-9 error" id="tasvib-date-error">
                        </div>
                    </div>

                    <div class="row  justify-content-md-center uk-margin-top">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="md-form form-group input-form dateform">
                                        <i class="fa fa-calendar calicon"></i>
                                        <input type="text" class="form-control dateinput date-shamsi" id="eblagh-date" name="eblagh-date" onchange="CheckDate(this)">
                                        <label for="eblagh-date" class="datelable" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">تاریخ ابلاغ</label>
                                    </div>
                                </div>
                                <div class="col-xl-3  ml-xl-2 col-lg-4 col-md-3 col-sm-4 col-10 div-chk-law">
                                    <label class="chk-law"><input class="uk-checkbox" type="checkbox" name="check1[]" value="eblagh-date" onchange='changeCheckBox(this)' checked> خالی بماند</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  justify-content-md-center">
                        <div class="col-md-9 error" id="eblagh-date-error">
                        </div>
                    </div>

                    <div id="eblagh" style="display: none;">
                        <div class="row  justify-content-md-center">
                            <div class="col-md-9">
                                <div class="md-form form-group input-form">
                                    <i class="fa fa-pencil-square-o prefix"></i>
                                    <input type="text" id="eblagh-num" name="eblagh-num" class="form-control">
                                    <label for="eblagh-num" data-error="wrong" data-success="right" dir="rtl">شماره ابلاغ</label>
                                </div>

                            </div>
                        </div>
                        <div class="row  justify-content-md-center">
                            <div class="col-md-9 error" id="eblagh-num-error">
                            </div>
                        </div>
                    </div>

                    <div class="row  justify-content-md-center uk-margin-top">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="md-form form-group input-form dateform">
                                        <i class="fa fa-calendar calicon"></i>
                                        <input type="text" class="form-control dateinput date-shamsi" id="enteshar-date" name="enteshar-date" onchange="CheckDate(this)">
                                        <label for="enteshar-date" class="datelable" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">تاریخ انتشار</label>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-4 col-md-3 col-sm-4 col-10 div-chk-law">
                                    <label class="chk-law"><input class="uk-checkbox" type="checkbox" name="check1[]" value="enteshar-date" checked onchange='changeCheckBox(this)'> خالی بماند</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  justify-content-md-center">
                        <div class="col-md-9 error" id="enteshar-date-error">
                        </div>
                    </div>

                    <div class="row  justify-content-md-center uk-margin-top">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="md-form form-group input-form dateform">
                                        <i class="fa fa-calendar calicon"></i>
                                        <input type="text" class="form-control dateinput date-shamsi" id="emza-date" name="emza-date"  onchange="CheckDate(this)">
                                        <label for="emza-date" class="datelable" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">تاریخ امضا</label>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-4 col-md-3 col-sm-4 col-10 div-chk-law">
                                    <label class="chk-law"><input class="uk-checkbox" type="checkbox" name="check1[]" value="emza-date" checked onchange='changeCheckBox(this)'> خالی بماند</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  justify-content-md-center">
                        <div class="col-md-9 error" id="emza-date-error">
                        </div>
                    </div>

                    <div class="row  justify-content-md-center">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="md-form form-group input-form dateform">
                                        <i class="fa fa-calendar calicon"></i>
                                        <input type="text" class="form-control dateinput date-shamsi" id="taeid-date" name="taeid-date"  onchange="CheckDate(this)">
                                        <label for="taeid-date" class="datelable" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">تاریخ تایید</label>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-4 col-md-3 col-sm-4 col-10 div-chk-law">
                                    <label class="chk-law"><input class="uk-checkbox" type="checkbox" name="check1[]" value="taeid-date" checked onchange='changeCheckBox(this)'> خالی بماند</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  justify-content-md-center">
                        <div class="col-md-9 error" id="taeid-date-error">
                        </div>
                    </div>

                    <div class="row  justify-content-md-center">
                        <div class="col-md-9">

                            <div class="md-form form-group input-form row">
                                <div class="col-md-3">
                                    <label for="type" data-error="wrong" data-success="right" style="" dir="rtl">نوع قانون</label>
                                </div>
                                <div class="col-md-9">

                                    <select id="type" name="type" class="form-control" style="display:block!important;">
                                        <option value="1">اساسی</option>
                                        <option value="2">ولائي</option>
                                        <option value="3">حكومتي</option>
                                        <option value="4">عادي – حكومتي</option>
                                        <option value="5">عادی</option>
                                        <option value="6">اساسنامه قانوني</option>
                                        <option value="7">آيين نامه قانوني</option>
                                        <option value="8">احکام و نظام نامه ها</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row  justify-content-md-center">
                        <div class="col-md-9">

                            <div class="md-form form-group input-form row">
                                <div class="col-md-3">
                                    <label for="marja" data-error="wrong" data-success="right" style="" dir="rtl"> مرجع تصویب</label>
                                </div>
                                <div class="col-md-9">

                                    <select id="marja" name="marja" class="form-control" style="display:block!important;">
                                        <?php foreach ($marja_tasvib as $m):?>
                                            <option value="<?php echo $m['id'];?>"> <?php echo $m['title'];?> </option>
                                        <?php endforeach;?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row  justify-content-md-center">
                        <div class="col-md-9">
                            <div class="md-form form-group input-form row">
                                <div class="col-md-3">
                                    <label for="status" data-error="wrong" data-success="right" style="" dir="rtl">وضعیت قانون</label>
                                </div>
                                <div class="col-md-9">

                                    <select id="status" name="statuss" class="form-control" style="display:block!important;">
                                        <option value="1">معتبر</option>
                                        <option value="2">موقت</option>
                                        <option value="3">منسوخ</option>
                                        <option value="4">تمدید</option>
                                        <option value="5">با اجرا ملغی میشود</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row  justify-content-md-center uk-padding">
                        <div class="col-md-8" style="text-align: center;">
                            <button type="submit" name="submit" value="submit" id="add-law-btn" class="uk-button uk-button-primary" onclick="add_Law()">افزودن</button>
                            <button type="button" name="cancel" class="uk-button uk-button-default">انصراف</button>
                        </div>
                    </div>


                </form>
            </li>
            <!-----------------------2----------------------------------->
            <li class="">
                <form  action="<?php echo base_url();?>users/employee/add_bylaw_validate" method="post" id="add-user" dir="rtl">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">

                            <div class="md-form form-group input-form">
                                <i class="fa fa-pencil-square-o prefix"></i>
                                <input type="text" id="title" class="form-control">
                                <label for="title" data-error="wrong" data-success="right" dir="rtl">عنوان</label>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="md-form form-group input-form dateform">
                                        <i class="fa fa-calendar  prefix calicon"></i>
                                        <input type="text" class="form-control dateinput" id="tasvib-date">
                                        <label for="tasvib-date" class="datelable" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">تاریخ اجرا</label>
                                    </div>
                                </div>

                                <div class="col-xl-5 col-lg-4 col-md-3 col-sm-4 col-10 cal-btn-column">
                                    <button class="uk-button uk-button-default calbtn" data-toggle="modal" data-target="#calmodal">انتخاب از تقویم</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1">
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <div class="md-form form-group input-form">
                                <i class="fa fa-pencil-square-o prefix"></i>
                                <label for="marja" data-error="wrong" data-success="right" style="display:block!important;  margin-left: 50px;" dir="rtl"> مرجع تصویب</label>
                                <select id="marja" class="form-control" style="display:block!important; width: 80%; margin-right: 130px;">
                                    <?php foreach ($marja_tasvib as $m):?>
                                        <option value="<?php echo $m['id'];?>"> <?php echo $m['title'];?> </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div id="formfilename" class="col-xl-6" style=" text-align: right; margin-top: 27px;"> فایل انتخاب شده :
                                    <div id="FN" dir="ltr" style="display: inline"></div>
                                </div>
                                <form id="myform" method="post" class="col-xl-2" style="">
                                    <div class="form-group" style="text-align: right; padding-bottom: 0px;">
                                        <label class="uk-button uk-button-default btn-uikit">انتخاب فایل</label>
                                        <input class="form-control" type="file" id="myfile" />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <div class="form-group col-xl-12">
                                <div class="progress" style="display: block;">
                                    <div class="progress-bar myprogress" role="progressbar" style="width:0%"></div>
                                </div>
                                <div class="msg"></div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6" style="text-align: center;">
                            <button class="uk-button uk-button-primary">اضافه کردن </button>
                            <button class="uk-button uk-button-default">انصراف</button>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </form>
            </li>
            <!-----------------------3----------------------------------->
            <li class="">3</li>
        </ul>
    </div>

    <!-- Modal Core -->
    <!--<div class="modal fade" id="calmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="calender" id="cal2" style="max-width: 231px;"></div>
                </div>
                <div class="modal-footer" style="text-align: center; align-items: center;">
                    <button type="button" class="uk-button uk-button-danger uk-button-small" style="margin: auto;" data-dismiss="modal" id="okcal">انتخاب</button>
                </div>
            </div>
        </div>
    </div>-->

    <!--<input type="text" id="calenderSelector" style="display: none;">
    <input type="text" style="display: none;" id="calenderSecondarySelector" name="current_date">-->
</div>