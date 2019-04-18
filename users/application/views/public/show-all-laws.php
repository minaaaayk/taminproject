<div class="container" style="margin-top:75px;margin-bottom:75px; left: 0px; margin-left: 0px; padding-left: 0px;" dir="rtl" >
    <div class="row">
        <div class="col-sm-2" style="margin-top: 35px; margin-right: auto; text-align: center"> نوع قانون:</div>
        <div class="col-sm-3">
            <div class="form-group" dir="">
                <select id="typelaw" class="form-control" onchange="sendRequest();" style="display:block!important;">
                    <option value="همه">همه</option>
                    <option value="اساسی">اساسی</option>
                    <option value="ولائي">ولائي</option>
                    <option value="حكومتي">حكومتي</option>
                    <option value="عادي – حكومتي">عادي – حكومتي</option>
                    <option value="عادی">عادی</option>
                    <option value="اساسنامه قانوني">اساسنامه قانوني</option>
                    <option value="آيين نامه قانوني">آيين نامه قانوني</option>
                    <option value="احکام و نظام نامه ها">احکام و نظام نامه ها</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="searchFor" placeholder="جستوجو" class="form-control" id="searchKey" onchange="sendRequest();">
            </div>
        </div>
        <div class="col-sm-2" style="margin-top: 35px; margin-right: auto; text-align: center"> تعداد نمایش:</div>
        <div class="col-sm-2">
            <div class="form-group" dir="">
                <select class="form-control" id="limitRows" onchange="sendRequest();" style="display: block !important;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>


    </div>
    <div class="" style="">
        <table class="table table-striped table-hover" id="lawstbl" dir="rtl">
            <thead>
            <tr>
                <th><span>ردیف</span></th>
                <?php if($manipulate == true):?>
                    <th >ویرایش</th>
                    <th >حذف</th>
                    <th >جزئیات</th>
                <?php endif;?>
                <th data-action="sort" data-title="title" data-direction="ASC"><span>عنوان</span> <span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="type" data-direction="ASC"><span>نوع قانون</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_tasvib" data-direction="ASC"><span>تاریخ تصویب</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <!--<th><span>مرجع تصویب</span></th>
                <th data-action="sort" data-title="Date_eblagh" data-direction="ASC"><span>تاریخ ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="num_eblagh" data-direction="ASC"><span>شماره ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_enteshar" data-direction="ASC"><span>تاریخ انتشار</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_emza" data-direction="ASC"><span>تاریخ امضا</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_taeid" data-direction="ASC"><span>تاریخ تایید</span><span class="iconTBL" uk-icon="triangle-up"></span></th>-->
                <th data-action="sort" data-title="status" data-direction="ASC"><span>وضعیت</span><span class="iconTBL" uk-icon="triangle-up"></span></th>        </tr>

            </thead>

            <?php
            foreach ($lawList as $key => $law) {
                ?>

                <tr data-selection="<?=$law->Law_id;?>">
                    <td><?=($page+$key+1)?></td>

                    <?php if($manipulate == true):?>
                        <td data-action="edit" class="td-actions">
                            <button type="button" rel="tooltip" title="ویرایش " class="icon-law" style="color: #007E33;">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <td data-action="delete" class="td-actions" >
                            <button type="button" rel="tooltip" title="حذف " class="icon-law" style="color: #ff4444;">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                        <td  data-action="detail"  class="td-actions">
                            <button type="button" rel="tooltip" title="مشاهده ی جزئیات"  class="icon-law" style="color: #33b5e5;">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    <?php endif;?>

                    <td data-action="show"><div class="uk-button uk-button-text"> <?=$law->title;?> </div></td>
                    <td><?=$law->type;?></td>
                    <td><?=$law->Date_tasvib;?></td>
                    <!--<td><?/*=$law->marja_tasvib_title;*/?></td>
                    <td><?/*=$law->Date_eblagh;*/?></td>
                    <td><?/*=$law->num_eblagh;*/?></td>
                    <td><?/*=$law->Date_enteshar;*/?></td>
                    <td><?/*=$law->Date_emza;*/?></td>
                    <td><?/*=$law->Date_taeid;*/?></td>-->
                    <td><?=$law->status_title;?></td>


                </tr>

            <?php	}
            ?>
            <tfoot>
            <tr>
                <th><span>ردیف</span></th>
                <?php if($manipulate == true):?>
                    <th >ویرایش</th>
                    <th >حذف</th>
                    <th >جزئیات</th>
                <?php endif;?>
                <th data-action="sort" data-title="title" data-direction="ASC"><span>عنوان</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="type" data-direction="ASC"><span>نوع قانون</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_tasvib" data-direction="ASC"><span>تاریخ تصویب</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <!--<th><span>مرجع تصویب</span><span class="iconTBL" uk-icon="triangle-up "></span></th>
                <th data-action="sort" data-title="Date_eblagh" data-direction="ASC"><span>تاریخ ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="num_eblagh" data-direction="ASC"><span>شماره ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_enteshar" data-direction="ASC"><span>تاریخ انتشار</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_emza" data-direction="ASC"><span>تاریخ امضا</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
                <th data-action="sort" data-title="Date_taeid" data-direction="ASC"><span>تاریخ تایید</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
              -->  <th data-action="sort" data-title="status" data-direction="ASC"><span>وضعیت</span><span class="iconTBL" uk-icon="triangle-up"></span></th>        </tr>

            </tr>

            </tfoot>
        </table>
        <?php echo $pagination; ?>
    </div>
</div>


<div id="lawDetail" class="uk-flex-top" uk-modal dir="rtl" style="padding-top: 80px;">
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header" style="text-align: right">
            <h5>جزئیات قانون</h5>
        </div>
        <div class="uk-modal-body">
            <table dir="rtl" style="text-align: right"class="uk-table table">
                <tr>
                    <td style="border-top: none !important;">عنوان : </td>
                    <td style="border-top: none !important;" id="d-title"></td>
                    <td style="border-top: none !important;">نوع : </td>
                    <td style="border-top: none !important;" id="d-type"></td>
                </tr>
                <tr>
                    <td> تاریخ تصویب : </td>
                    <td id="d-tasvib-date"></td>
                    <td>مرجع تصویب : </td>
                    <td id="d-marja-tasvib"></td>
                </tr>
                <tr>
                    <td>تاریخ ابلاغ : </td>
                    <td id="d-eblagh-date"></td>
                    <td>شماره ابلاغ : </td>
                    <td id="d-eblagh-num"></td>
                </tr>
                <tr>
                    <td>تاریخ امضا : </td>
                    <td id="d-emza-date"></td>
                    <td>تاریخ انتشار : </td>
                    <td id="d-enteshar-date"></td>
                </tr>
                <tr>
                    <td>تاریخ تایید : </td>
                    <td id="d-taeid-date"></td>
                    <td>وضعیت قانون : </td>
                    <td id="d-status"></td>
                </tr>
            </table>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-danger uk-modal-close" type="button">بستن</button>
        </div>
    </div>
</div>