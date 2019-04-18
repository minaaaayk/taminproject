
<table id="law-sh" dir="rtl" style="text-align: right;" class="uk-card uk-card-default uk-table-middle uk-padding uk-margin table  table-hover table-responsive table-hover">
    <thead>
    <tr  style='width: 100%;'>
        <th></th>
        <th style="text-align: center">مشاهده</th>

        <?php if($manipulate == true):?>
        <th style="text-align: center">ویرایش</th>
        <th style="text-align: center">حذف</th>
        <?php endif;?>
    </tr>
    </thead>
    <tbody>

    <?php
    /**
     * Created by PhpStorm.
     * User: Mina2
     * Date: 1/7/2018
     * Time: 12:56 PM
     */

    foreach ($parts as $part)
    {
        foreach ($part->array_of_article as $article)
        {
            $id = $article->A_id;
            echo "<tr data-art-id='$id'>";
            echo "<td>";
            echo "ماده " . $article->num . " : ";

            echo "<div class='art-tbl' style='display: inline;'>";
            $temp = explode('</br>', $article->txt[0]['data']);
            echo  $temp[0];
            echo "</div>";

            echo "</td>";
            ?>

            <td class="td-actions" style="text-align: center">
                <button type="button" rel="tooltip" title="مشاهده ی جزئیات"  class="icon-law" style="color: #33b5e5;">
                    <i class="fa fa-eye"></i>
                </button>
            </td>

            <?php if($manipulate == true):?>
            <td class="td-actions" style="text-align: center">
                <button type="button" rel="tooltip" title="ویرایش ماده" class="icon-law" style="color: #007E33;">
                    <i class="fa fa-edit"></i>
                </button>
            </td>
            <td class="td-actions" style="text-align: center">
                <button type="button" rel="tooltip" title="حذف ماده" class="icon-law" style="color: #ff4444;">
                    <i class="fa fa-times"></i>
                </button>
            </td>
            <?php endif;?>


            <?php
            echo "</tr>";
        }

    }
    ?>
    </tbody>
</table>
