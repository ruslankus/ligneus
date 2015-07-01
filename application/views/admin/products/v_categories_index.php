<br/>
<table width="100%" border="0" class="tbl"  cellspacing="0">
    <thead>
        <tr height="30">
            <th>Название категории</th><th>Функции</th>
        </tr>
    </thead>
<? foreach ($categories as $cat):?>
<tr>
    <td >
        <?=HTML::anchor('admin/products/cat_edit/'. $cat->id, $cat->cat_title_ru)?>&nbsp;
       
    </td>
    
   
    <td width="100" align="center">
    <?=HTML::anchor('admin/products/cat_edit/'. $cat->id, HTML::image('media/img/edit.png'))?>   

    </td>
</tr>
<? endforeach?>

</table>


