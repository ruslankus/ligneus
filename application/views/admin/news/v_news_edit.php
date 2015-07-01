<br/>
<?php if($errors): ?>
    <?php foreach($errors as $error):?>
        <?=$error;?>
    <?php endforeach;?>
<?php endif; ?>
<?=Form::open('admin/news/edit/'. $news['id'])?>
<table width="100%" cellspacing="3">
    <tr>
        <td ><?=Form::label('title', 'Название')?>:</td>
        <td><?=Form::input('news_title', $news['news_title'], array('size' => 100))?></td>
    </tr>
    <tr>
        <td ><?=Form::label('date', 'Дата')?>:</td>
        <td><?=Form::input('news_date', $news['news_date'], array('size' => 40))?></td>
    </tr>
   
    <tr>
        <td valign="top"><?=Form::label('content', 'Основной текст')?>: </td>
        <td><?=Form::textarea('news_text', $news['news_text'], array('cols' => 100, 'rows' => 20,'class' => 'editor'))?></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><?=Form::submit('submit', 'Сохранить изменения')?></td>
    </tr>
</table>
<?=Form::close()?>

   