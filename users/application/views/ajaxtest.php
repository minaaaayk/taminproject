
<table dir="rtl" style="text-align: right;" class="uk-padding uk-margin table  table-hover table-responsive">
    <thead>
    <tr>
        <th></th>
        <th style="text-align: center">مشاهده</th>
        <th style="text-align: center">ویرایش</th>
        <th style="text-align: center">حذف</th>
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

function print_paragraphs($array_of_paragraph, $txt_id, $flag, $note = array())
{

    foreach ($array_of_paragraph as $p1)
    {

        if($p1->parent_id_txt == $txt_id)
        {
            echo "<div style=\"text-align: right; padding-right: 20px\">";
                echo $p1->name_list . " - " . $p1->txt . "<br>";
                if($flag == true)
                {
                    print_note_paragraphs($note, $p1->paragraph_id, true);
                }
                if(count($p1->array_of_paragraph) > 0)
                {
                    echo "<div style=\"text-align: right; padding-right: 20px\">";
                        foreach ($p1->array_of_paragraph as $p2)
                        {
                            echo $p2->name_list . " - " . $p2->txt . "<br>";
                            if($flag == true)
                            {
                                print_note_paragraphs($note, $p2->paragraph_id, true);
                            }
                        }
                    echo "</div>";
                }
            echo "</div>";

        }
    }
}

function print_note_paragraphs($arr_notes, $prent_paragraph_id = 0, $in_paragraph)
{
    foreach ($arr_notes as $note)
    {
        if ($in_paragraph == true)
        {
            if ($note->paragraph_flag == 1)
            {
                if ($note->parent_paragraph_id == $prent_paragraph_id)
                {
                    echo "تبصره " . $note->num . " : ";
                    foreach ($note->txt as $txt)
                    {
                        echo $txt['data'] . "</br>";
                        print_paragraphs($note->array_of_paragraph, $txt['id'], false, null);
                    }
                }
            }
        }
        else
        {
            echo "تبصره " . $note->num . " : ";
            foreach ($note->txt as $txt)
            {

                echo $txt['data'] ."</br>";
                print_paragraphs($note->array_of_paragraph, $txt['id'], false, null);
            }
        }
    }
}
foreach ($parts as $part)
{
    foreach ($part->array_of_article as $article)
    {
       echo "<tr>";
        echo "<td>";
        echo "ماده " . $article->num . " : ";
        foreach ($article->txt as $txt)
        {
            echo $txt['data'] ."</br>";
            print_paragraphs($article->array_of_paragraph, $txt['id'], true, $article->array_of_Note);
        }
        print_note_paragraphs($article->array_of_Note,  0, false);
        echo "</td>";
        ?>

        <td class="td-actions" style="text-align: center">
            <button type="button" rel="tooltip" title="مشاهده ی جزئیات"  class="icon-law" style="color: #33b5e5;">
                <i class="fa fa-eye"></i>
            </button>
        </td>
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
        <?php
       echo "</tr>";
    }

}
?>
    </tbody>
</table>
