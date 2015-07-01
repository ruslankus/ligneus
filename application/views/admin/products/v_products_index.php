<br/>
<table width="100%" border="0" class="tbl"  cellspacing="0">
    <thead>
        <tr height="30">
            <th>Название</th><th>Категория</th><th>Функции</th>
        </tr>
    </thead>
<? foreach ($products as $product):?>
<tr>
    <td >
        <?=HTML::anchor('admin/products/prod_edit/'. $product->id, $product->title_ru)?>&nbsp;
       
    </td>
    <td ><?=HTML::anchor('admin/products/by_category/'. $product->category->id, $product->category->cat_title_ru)?></td>
   
    <td width="100" align="center">
    <?=HTML::anchor('admin/products/prod_edit/'. $product->id, HTML::image('media/img/edit.png'))?>

    <?=HTML::anchor('admin/products/prod_delete/'. $product->id, HTML::image('media/img/delete.png'))?>

    </td>
</tr>
<? endforeach?>

</table>

<br/>
<p align="right">
<?=HTML::image('media/img/add.png', array('valign' => 'top'))?>

<?=HTML::anchor('admin/products/prod_add', 'Добавить')?>
</p>