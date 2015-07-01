<br/>
<?php if($errors):?>
    <?php foreach($errors as $error): ?>
        <?=$error?>
    <?php endforeach; ?>
<?php endif;?>
<?=Form::open('admin/news/add')?>
<table width="100%" cellspacing="10">
    <tr>
        <td ><?=Form::label('title', 'Название')?>:</td>
        <td><?=Form::input('news_title', $post['news_title'], array('size' => 100))?></td>
    </tr>
    <tr>
        <td ><?=Form::label('date', 'Дата')?>:</td>
        <td><?=Form::input('news_date', date('Y-m-d'), array('size' => 40))?></td>
    </tr>
    
    <tr>
        <td valign="top"><?=Form::label('content', 'Основной текст')?>: </td>
        <td><?=Form::textarea('news_text', $post['news_text'], array('cols' => 100, 'rows' => 20 , 'class' => 'editor'))?></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><?=Form::submit('submit', 'Добавить')?></td>
    </tr>
</table>
<?=Form::close()?>
