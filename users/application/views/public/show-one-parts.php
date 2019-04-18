<?php// var_dump($part);?>

<div class="container" style="margin-top:75px;margin-bottom:75px; left: 0px; margin-left: 0px; padding-left: 0px;" dir="rtl" >
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="searchFor" placeholder="جستوجو" class="form-control" id="searchKey" onchange="sendRequest2();">
            </div>
        </div>
        <div class="col-sm-2" style="margin-top: 35px; margin-right: auto; text-align: center"> تعداد نمایش:</div>
        <div class="col-sm-2">
            <div class="form-group" dir="">
                <select class="form-control" id="limitRows" onchange="sendRequest2();" style="display: block !important;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>


    </div>
    <div class="" style="">
        <table class="table table-striped table-hover" id="articletbl" dir="rtl" style="text-align: right" data-part-id="<?=$part->Part_id?>">
            <thead>
            <tr>
                <th><span>ردیف</span></th>
                <?php if($manipulate == true):?>
                    <th >ویرایش</th>
                    <th >حذف</th>
                <?php endif;?>
                <th></th>
                <th></th>

            </thead>

            <?php
            foreach ($articleList as $key => $article) {
                ?>

                <tr data-selection="<?=$article['article_id'];?>">
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
                    <?php endif;?>
                    <td>ماده<?= $article['num']?>:</td>
                    <td data-action="show"><div class="uk-button uk-button-text"> <?=$article['text'];?> </div></td>
                </tr>

            <?php	}
            ?>
            <tfoot>
            <tr>
                <th><span>ردیف</span></th>
                <?php if($manipulate == true):?>
                    <th >ویرایش</th>
                    <th >حذف</th>
                <?php endif;?>
                <th></th>
                <th></th>

            </tr>

            </tfoot>
        </table>
        <?php echo $pagination; ?>
    </div>
</div>


