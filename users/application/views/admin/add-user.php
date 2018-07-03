<div  class="uk-card uk-card-default uk-card-body">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
            <h3 style="text-align: right;">افزودن کاربر</h3>
        </div>
        <div class="col-md-1">
        </div>
    </div>
    <form action="<?php echo base_url();?>users/Admin/add_user_validate" method="post" id="add-user" dir="rtl">
        <div class="row uk-padding uk-padding-remove-bottom">
            <div class="col-md-3">
                <p>اطلاعات کاربر</p>
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row  justify-content-md-center">
            <div class="col-md-9">
                <div class="md-form form-group input-form">
                    <i class="fa fa-user-o prefix"></i>
                    <input type="text" name="fname"  id="fname" class="form-control">
                    <label for="fname" data-error="wrong" data-success="right" dir="rtl">نام</label>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9 error" id="fname-error">
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9">
                <div class="md-form form-group input-form">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" name="lname"  id="lname" class="form-control">
                    <label for="lname" data-error="wrong" data-success="right" dir="rtl">نام خانوادگی</label>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9 error" id="lname-error">
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9">

                <div class="md-form form-group input-form">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" name="email"  id="email" class="form-control">
                    <label  lang="en" for="email" data-error="wrong" data-success="right" dir="rtl">ایمیل</label>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9 error" >
                <p id="email-error"></p>
                <p id="mailerror"></p>
            </div>
        </div>

        <div class="row uk-padding uk-padding-remove-bottom">
            <div class="col-md-3">
                <p> حساب کاربری</p>
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row  justify-content-md-center">
            <div class="col-md-9">
                <div class="md-form form-group input-form">
                    <i class="fa fa-address-card prefix"></i>
                    <input type="text" name="username"  id="username" class="form-control">
                    <label for="username" data-error="wrong" data-success="right" dir="rtl">نام کاربری </label>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9 error">
                <p id="username-error"></p>
                <p id="usererror"></p>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9">
                <div class="md-form form-group input-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" name="password"  id="password" class="form-control">
                    <label for="password" data-error="wrong" data-success="right" dir="rtl">کلمه ی عبور</label>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9 error" id="password-error">
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9" >
                <div class="md-form form-group input-form">
                    <i class="fa fa-circle prefix"></i>
                    <input type="password" name="passconf"  id="passconf" class="form-control">
                    <label for="passconf" data-error="wrong" data-success="right" dir="rtl">تکرار کلمه ی عبور</label>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9 error" id="passconf-error">
            </div>
        </div>
        <div class="row uk-padding uk-padding-remove-bottom">
            <div class="col-md-3">
                <p> سطح دسترسی</p>
            </div>
            <div class="col-md-9">
            </div>
            <div class="col-md-1">
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-10">
                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid input-form uk-margin-top uk-margin-bottom" style=" float: right;" >
                    <i class="fa  fa-user-circle-o prefix"></i>
                    <label for="password2" data-error="wrong" data-success="right">نوع کاربر : </label>
                </div>
            </div>
        </div>

        <div class="row  justify-content-md-center uk-padding uk-padding-remove-left uk-padding-remove-right uk-padding-remove-top">
            <div class="col-md-9 uk-margin uk-grid-small uk-child-width-auto uk-grid input-form uk-margin-top uk-margin-bottom ">
                <label  style="margin-right: 10px !important;">
                    <input style="margin-right: 10px !important;"  class="uk-radio" type="radio" name="type" value="1" data-toggle="collapse" data-target="#admin" aria-expanded="true" aria-controls="admin"> مدیر
                </label>
                <label  style="margin-right: 10px !important;">
                    <input style="margin-right: 10px !important;" class="uk-radio" type="radio" name="type" value="2" data-toggle="collapse" data-target="#employee" aria-expanded="false" aria-controls="employee"> کارمند سازمان
                </label>
                <label  style="margin-right: 10px !important;">
                    <input style="margin-right: 10px !important;"  class="uk-radio" type="radio" name="type" value="3" data-toggle="collapse" data-target="#expert" aria-expanded="false" aria-controls="expert"> کارشناس حقوقی
                </label>
            </div>
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-md-9 error" id="type-error">
            </div>
        </div>

        <div class="row  justify-content-md-center uk-padding uk-padding-remove-left uk-padding-remove-right uk-padding-remove-top" style="text-align: right;">
            <div class="col-md-9">

                <div class="collapse" id="admin">
                    <p>دسترسی های مدیر:</p>
                    <div class="">
                        <p>
                            <input class="uk-checkbox uk-margin-small-left" type="checkbox" name="access[]" value="11"> مدیرت کاربران(افزودن کاربر, کنترل دسترسی و...)
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input class="uk-checkbox  uk-margin-small-left" type="checkbox" name="access[]" value="12"> مدیرت فروم ها (ایجاد یا حذف آنها)
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input class="uk-checkbox  uk-margin-small-left" type="checkbox" name="access[]" value="13"> مشاهده ی log ها
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="19">مشاهده توشیحات
                        </p>
                    </div>
                </div>
                <div class="collapse" id="employee">
                    <p>دسترسی های کارمند:</p>
                    <div class="">
                        <p>
                            <input type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="24">مدیریت قوانین (افزودن و حذف قانون - اصلاحیه و...)
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input  type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="25">دریافت صورت جلسه
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input  type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="29">مشاهده توشیحات
                        </p>
                    </div>
                </div>
                <div class="collapse" id="expert">
                    <p>دسترسی های کارشناس:</p>
                    <div class="">
                        <p>
                            <input  type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="34">مدیریت قوانین (افزودن و حذف قانون - اصلاحیه و...)
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input  type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="36">حاشیه نویسی
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input  type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="37">نظر دادن در فروم ها
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <input  type="checkbox" class="uk-checkbox  uk-margin-small-left" name="access[]" value="38">مرتبط سازی موضوعات
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--captcha-->
        <!--<div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-5"">
                <?php /*echo $cap_img; */?>
            </div>
            <div class="col-md-3">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-5">

                <div class="md-form form-group input-form">
                    <input type="text" name="captcha" value="" id="captcha" class="form-control">
                    <label for="captcha" data-error="wrong" data-success="right" dir="rtl">حروف بالا را وارد نمایید</label>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>-->

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

</div>