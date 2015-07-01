<br/>
<?if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
<?=Form::open('admin/products/prod_edit/'.$data['id'],array('enctype' => 'multipart/form-data'))?>
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
        <td><?=Form::label('description', 'Описание')?>: <br/><?=Form::textarea('prod_text', $data['prod_text'], array('cols' => 80, 'rows' => 20, 'class'=>'editor'))?></td>
    </tr>
    
    <tr>
       <td ><?=Form::label('title', 'SEO сниппет')?>: <br />
       <?=Form::textarea('seo_snippet', $data['seo_snippet'], array('cols' => 80,'rows' => 5))?></td>         
    </tr>
    
    <tr>
        <td ><?=Form::label('title', 'SEO ключевые слова')?>: <br />
        <?=Form::input('keywords', $data['keywords'], array('size' => 80))?></td>
    </tr>
    
    <tr>
        <td> 
            <?=Form::label('images', 'Загрузить изображения')?>: <br/><br/>
            <?=Form::file('images[]', array('id' => 'multi'))?>
        </td>
    </tr>

    <tr>
        <td align="center"><?=Form::submit('submit', 'Сохранить изменения')?></td>
    </tr>
    
    <tr>
        <td>
            <?=Form::label('images', 'Изображения')?>: <br/><br/>
            <?if (!empty($data['images'])):?>
            
<a name="img"></a>

            <table width="100%" cellspacing="20">
                <tr>
                <?foreach($data['images'] as $i =>  $image):?>
                    <td align="center"><?=html::anchor('media/uploads/'. $image->image_name, html::image('media/uploads/' . $image->image_name,array('width' => '200')), array('target' => '_blank'))?>
                        <br><?=html::anchor('admin/products/prod_delimg/' . $image->id, 'Удалить')?> | 
                        <?if ($image->image_name != $data['small_photo'] ):?>
                        <?=html::anchor('admin/products/cat_img/' . $image->id, 'На стр. категории')?>
                        <?else:?>
                        На стр. категории
                        <?endif?>
                    </td>
                    <?if ($i % 2):?>
                        </tr><tr>
                    <?endif?>
                <?endforeach?>
                </tr>
            </table>

            <?else:?>
            <div class="empty">Нет изображений</div>
            <?endif?>
        </td>
    </tr>

</table>
<?=Form::close()?>
