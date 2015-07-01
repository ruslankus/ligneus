<br/>
<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>

<?=Form::open('admin/about/',array('enctype' => 'multipart/form-data'))?>
<table width="100%" cellspacing="5" >

    <tr>
        <td ><?=Form::label('title', 'Заголовок страницы')?>: <br />
        <?=Form::input('title_ru', $data['title_ru'], array('size' => 100))?></td>
    </tr>
   
    
    
    <tr>
        <td><?=Form::label('text', 'Текст на странице')?>: <br/><?=Form::textarea('text', $data['text'], array('cols' => 100, 'rows' => 20,'class'=>'editor'))?></td>
    </tr>
    
    <tr>
       <td ><?=Form::label('title', 'SEO сниппет')?>: <br />
       <?=Form::textarea('seo_snippet', $data['seo_snippet'], array('cols' => 100,'rows' => 5))?></td>         
    </tr>
    
    <tr>
        <td ><?=Form::label('title', 'SEO ключевые слова')?>: <br />
        <?=Form::input('keywords', $data['keywords'], array('size' => 100))?></td>
    </tr>
    
    


    <tr>
        <td align="center"><?=Form::submit('submit', 'Сохранить изменения')?></td>
    </tr>
    


    
</table>
<?=Form::close()?>
