
<?php var_dump($law);?>

<div class="uk-card uk-card-default uk-margin-bottom">


    <form id="edit-law-form" method="post" dir="rtl">

        <input name="law-id" type="hidden">
        <div class="row  justify-content-md-center">
            <div class="col-md-9">
                <div class="md-form form-group input-form">
                    <i class="fa fa-pencil-square-o prefix"></i>
                    <input type="text" id="title" name="title" value="<?=$law->title;?>" class="form-control">
                    <label for="title" data-error="wrong" data-success="right" dir="rtl">عنوان</label>
                </div>

            </div>
        </div>
        <div class="row  justify-content-md-center">
            <div class="col-md-9 error" id="title-error">
            </div>
        </div>




        <div class="row  justify-content-md-center uk-margin-top">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="md-form form-group input-form dateform">
                            <i class="fa fa-calendar calicon"></i>
                            <input type="text" class="form-control dateinput " value="<?=$law->Date_tasvib;?>" id="tasvib-date" name="tasvib-date" onchange="CheckDate(this)">
                            <label for="tasvib-date" class="datelable" data-error="wrong" data-success="right" style="text-align: right; float: right;left: auto; right: 0px;" dir="rtl">تاریخ تصویب</label>
                        </div>
                    </div>
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
                            <input type="text" class="form-control dateinput " value="<?=$law->Date_eblagh;?>" id="eblagh-date" name="eblagh-date" onchange="CheckDate(this)">
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
                        <input type="text" id="eblagh-num" name="eblagh-num" class="form-control" value="<?=$law->num_eblagh;?>">
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
                            <input type="text" class="form-control dateinput " value="<?=$law->Date_enteshar;?>" id="enteshar-date" name="enteshar-date" onchange="CheckDate(this)">
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
                            <input type="text" class="form-control dateinput " value="<?=$law->Date_emza;?>" id="emza-date" name="emza-date"  onchange="CheckDate(this)">
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
                            <input type="text" class="form-control dateinput " value="<?=$law->Date_taeid;?>" id="taeid-date" name="taeid-date"  onchange="CheckDate(this)">
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
                            <?php /*foreach ($marja_tasvib as $m):*/?>
                                <option value="<?php /*echo $m['id'];*/?>"> <?php /*echo $m['title'];*/?> </option>
                            <?php /*endforeach;*/?>

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
</div>
