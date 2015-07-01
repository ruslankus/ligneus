<br/>
<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>

<?=Form::open('admin/contacts/',array('enctype' => 'multipart/form-data'))?>
<table width="100%" cellspacing="5" >

    <tr>
        <td ><?=Form::label('title', 'Заголовок страницы')?>: <br />
        <?=Form::input('title_head', $data_pages['title_head'], array('size' => 100))?></td>
    </tr>
   
    
    
    <tr>
        <td><?=Form::label('text', 'Контакты основного оффиса')?>: <br/><?=Form::textarea('main_adress', $data_contacts['main_adress'], array('cols' => 100, 'rows' => 7,'class'=>'editor'))?></td>
    </tr>
    
    <tr>
        <td><?=Form::label('text', 'Контакты  филиалов')?>: <br/><?=Form::textarea('branch_adress', $data_contacts['branch_adress'], array('cols' => 100, 'rows' => 7,'class'=>'editor'))?></td>
    </tr>
    
    <tr>
       <td ><?=Form::label('title', 'SEO сниппет')?>: <br />
       <?=Form::textarea('seo_snippet', $data_pages['seo_snippet'], array('cols' => 100,'rows' => 5))?></td>         
    </tr>
    
    <tr>
        <td ><?=Form::label('title', 'SEO ключевые слова')?>: <br />
        <?=Form::input('keywords', $data_pages['keywords'], array('size' => 100))?></td>
    </tr>
    
    


    <tr>
        <td align="center"><?=Form::submit('submit', 'Сохранить изменения')?></td>
    </tr>
    
    

    
</table>
<?=Form::close()?>
