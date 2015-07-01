<br/>
<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
<?=Form::open('admin/products/prod_add',array('enctype' => 'multipart/form-data'))?>
<table width="100%" cellspacing="5" >

    <tr>
        <td ><?=Form::label('title', 'Название')?>: <br/><?=Form::input('title_ru', $data['title_ru'], array('size' => 80))?></td>
        <td rowspan="3" valign="top">
        <?=Form::label('cat', 'Категории')?>: <br/><br/><?=Form::select('cat_id', $cats)?><br/><br/>
       
        <?=Form::label('status', 'Статус')?>:<br/><br/><?=Form::checkbox('status', 1, true)?> Активен
        </td>
    </tr>
   
    <tr>
        <td><?=Form::label('description', 'Краткое описенание для категории')?>: <br/><?=Form::textarea('prod_intro', $data['prod_intro'], array('cols' => 80, 'rows' => 10))?></td>
    </tr>
    
    <tr>
        <td><?=Form::label('description', 'Описание')?>: <br/><?=Form::textarea('prod_text', $data['prod_text'], array('cols' => 80, 'rows' => 20,'class'=>'editor'))?></td>
    </tr>
    
    <tr>
       <td ><?=Form::label('title', 'SEO сниппет')?>: <br />
       <?=Form::textarea('seo_snippet', $data['seo_snippet'], array('cols' => 80,'rows' => 5))?></td>         
    </tr>
    
    <tr>
        <td ><?=Form::label('title', 'SEO ключевые слова')?>: <br />
        <?=Form::input('keywords', $data['keywords'], array('size' => 80))?></td>
    </tr>
    
    <td>
            <br/>
            <?=Form::label('images', 'Загрузить изображения')?>: <br/><br/>
            <?=Form::file('images[]', array('id' => 'multi'))?>
    </td>



    <tr>
        <td align="center"><?=Form::submit('submit', 'Добавить')?></td>
    </tr>
</table>
<?=Form::close()?>
