<div class="container" style="margin-top:75px;margin-bottom:75px; left: 0px; margin-left: 0px; padding-left: 0px;" dir="rtl" >
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="searchFor" placeholder="جستوجو" class="form-control" id="searchKey" onchange="sendRequest();">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group" >
                <select class="form-control" id="limitRows" onchange="sendRequest();" style="display: block !important;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover" id="lawstbl">
        <thead>
        <tr>
            <?php if($manipulate == true):?>
                <th >ویرایش</th>
                <th >حذف</th>
            <?php endif;?>
            <th><span>ردیف</span></th>
            <th data-action="sort" data-title="title" data-direction="ASC"><span>عنوان</span> <span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="type" data-direction="ASC"><span>نوع قانون</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="Date_tasvib" data-direction="ASC"><span>تاریخ تصویب</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th><span>مرجع تصویب</span></th>
            <th data-action="sort" data-title="Date_eblagh" data-direction="ASC"><span>تاریخ ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="num_eblagh" data-direction="ASC"><span>شماره ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <!--<th data-action="sort" data-title="Date_enteshar" data-direction="ASC"><span>تاریخ انتشار</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="Date_emza" data-direction="ASC"><span>تاریخ امضا</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="Date_taeid" data-direction="ASC"><span>تاریخ تایید</span><span class="iconTBL" uk-icon="triangle-up"></span></th>-->
            <th data-action="sort" data-title="status" data-direction="ASC"><span>وضعیت</span><span class="iconTBL" uk-icon="triangle-up"></span></th>        </tr>

        </thead>

        <?php
        foreach ($lawList as $key => $law) {
            ?>

            <tr>
                <?php if($manipulate == true):?>
                    <td class="td-actions" style="text-align: center">
                        <button type="button" rel="tooltip" title="ویرایش " class="icon-law" style="color: #007E33;">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                    <td class="td-actions" style="text-align: center">
                        <button type="button" rel="tooltip" title="حذف " class="icon-law" style="color: #ff4444;">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                <?php endif;?>
                <td><?=($page+$key+1)?></td>
                <td><?=$law->title;?></td>
                <td><?=$law->type;?></td>
                <td><?=$law->Date_tasvib;?></td>
                <td><?=$law->marja_tasvib_title;?></td>
                <td><?=$law->Date_eblagh;?></td>
                <td><?=$law->num_eblagh;?></td>
                <!--<td><?/*=$law->Date_enteshar;*/?></td>
                <td><?/*=$law->Date_emza;*/?></td>
                <td><?/*=$law->Date_taeid;*/?></td>-->
                <td><?=$law->status_title;?></td>


            </tr>

        <?php	}
        ?>
        <tfoot>
        <tr>
            <?php if($manipulate == true):?>
                <th >ویرایش</th>
                <th >حذف</th>
            <?php endif;?>
            <th><span>ردیف</span></th>
            <th data-action="sort" data-title="title" data-direction="ASC"><span>عنوان</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="type" data-direction="ASC"><span>نوع قانون</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="Date_tasvib" data-direction="ASC"><span>تاریخ تصویب</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th><span>مرجع تصویب</span><span class="iconTBL" uk-icon="triangle-up "></span></th>
            <th data-action="sort" data-title="Date_eblagh" data-direction="ASC"><span>تاریخ ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="num_eblagh" data-direction="ASC"><span>شماره ابلاغ</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <!--<th data-action="sort" data-title="Date_enteshar" data-direction="ASC"><span>تاریخ انتشار</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="Date_emza" data-direction="ASC"><span>تاریخ امضا</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
            <th data-action="sort" data-title="Date_taeid" data-direction="ASC"><span>تاریخ تایید</span><span class="iconTBL" uk-icon="triangle-up"></span></th>
          -->  <th data-action="sort" data-title="status" data-direction="ASC"><span>وضعیت</span><span class="iconTBL" uk-icon="triangle-up"></span></th>        </tr>

        </tr>

        </tfoot>
    </table>
    <?php echo $pagination; ?>
</div>