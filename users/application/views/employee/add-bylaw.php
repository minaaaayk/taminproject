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