<br/>
<table width="100%" border="0" class="tbl"  cellspacing="0">
    <thead>
        <tr height="30">
            <th>Дата</th><th>Название</th><th>Функции</th>
        </tr>
    </thead>
<? foreach ($all_news as $news):?>
<tr>
<td align="center" width="100"><?=$news->news_date?></td>
<td ><?=HTML::anchor('admin/news/edit/'. $news->id, $news->news_title)?></td>
<td width="100" align="center">
<?=HTML::anchor('admin/news/edit/'. $news->id, HTML::image('media/img/edit.png'),array('title' => 'редактировать новость',))?>

<?=HTML::anchor('admin/news/delete/'. $news->id, HTML::image('media/img/delete.png'),array('title' =>'стереть'))?>

</td>
</tr>
<? endforeach?>

</table>

<br/>
<p align="right">
<?=HTML::image('media/img/add.png', array('valign' => 'top',))?>
    
<?=HTML::anchor('admin/news/add', 'Добавить',array('title' => 'Добавить новость'))?>
</p>