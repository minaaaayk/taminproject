<div dir="rtl">

    <div class="row">

        <div class="col-md-10">
            <form class="md-form law-input-file">
                <div class="filelaw row">
                    <div class="col-md-4 " style="padding-bottom: 0px !important; margin-bottom: 0px !important; bottom: 0px !important;padding-bottom: 0px !important;left:0px; padding-left: 0px; float: left;">
                        <div class="btn btn-primary btn-sm float-right waves-effect waves-light" style="display: inline-block; left:0px !important; float: left !important; margin-right: auto !important;">
                            <span>انتخاب فایل</span>
                            <input type="file" class="file-law" onchange='somsom(this)'/>
                        </div>
                    </div>

                    <div class="col-md-8" style="">
                        <div class="md-form form-group input-form file-path-wrapper" style="display: inline; width: 100%">
                            <input class="form-control file-name-law" style=" margin: 0px !important; bottom: 0px !important;padding-bottom: 0px !important;" type="text" placeholder="فایل خود را آپلود نمایید">
                        </div>
                        <div class="msg"></div>
                    </div>
                </div>
            </form>
            <div class="col-md-2">
            </div>
        </div>
    </div>



    <div class="row prog" style="display: none;">
        <div class="col-md-2">
        </div>
        <div class="col-md-9">
            <div class="form-group col-xl-12">
                <div class="progress" >
                    <div class="progress-bar myprogress" role="progressbar" style="width:0%"></div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>

<!--<form action="<?php /*echo base_url();*/?>users/employee/add_law_validate" method="post" dir="rtl">-->
<form action="<?php echo base_url();?>users/Employee/add_law_validate" method="post" dir="rtl">

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-9">
            <div class="md-form form-group input-form">
                <i class="fa fa-pencil-square-o prefix"></i>
                <input type="text" id="title" name="title" class="form-control">
                <label for="title" data-error="wrong" data-success="right" dir="rtl">عنوان</label>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>

    <input class="file-path" name="path" type="hidden">

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-9">

            <div class="row">
                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                    <div class="md-form form-group input-form dateform">
                        <i class="fa fa-calendar  prefix calicon"></i>
                        <input type="text" class="form-control dateinput" id="tasvib-date" name="tasvib-date">
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

        <div class="col-md-1">
        </div>
    </div>


    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-9">
            <div class="md-form form-group input-form">
                <i class="fa fa-pencil-square-o prefix"></i>
                <label for="type" data-error="wrong" data-success="right" style="display:block!important;  margin-left: 50px;" dir="rtl">نوع قانون</label>
                <select id="type" name="type" class="form-control" style="display:block!important; width: 85%; margin-right: 100px;">
                    <option value="1">اساسی</option>
                    <option value="2">ولائي</option>
                    <option value="3">حكومتي</option>
                    <option value="4">اساسی</option>
                    <option value="5">عادي – حكومتي</option>
                    <option value="6">عادی</option>
                    <option value="7">اساسنامه قانوني</option>
                    <option value="8">آيين نامه قانوني</option>
                    <option value="9">احکام و نظام نامه ها</option>
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
            <div class="md-form form-group input-form">
                <i class="fa fa-pencil-square-o prefix"></i>
                <label for="marja" data-error="wrong" data-success="right" style="display:block!important;  margin-left: 50px;" dir="rtl"> مرجع تصویب</label>
                <select id="marja" name="marja" class="form-control" style="display:block!important; width: 80%; margin-right: 130px;">
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
            <div class="md-form form-group input-form">
                <i class="fa fa-pencil-square-o prefix"></i>
                <label for="status" data-error="wrong" data-success="right" style="display:block!important;  margin-left: 50px;" dir="rtl">وضعیت قانون</label>
                <select id="status" name="statuss" class="form-control" style="display:block!important; width: 85%; margin-right: 130px;">
                    <option value="1">معتبر</option>
                    <option value="2">موقت</option>
                    <option value="3">منسوخ</option>
                    <option value="4">تمدید</option>
                    <option value="5">با اجرا منتفی میشود</option>
                </select>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6" style="text-align: center;">
            <button type="submit" name="submit" value="submit" id="add-user-btn" class="uk-button uk-button-primary">افزودن</button>
            <button type="button" name="cancel" class="uk-button uk-button-default">انصراف</button>
        </div>
        <div class="col-md-3">
        </div>
    </div>


</form>