<p>
Настройки сайта
</p>
<?=Form::open('admin/settings')?>
<table width="100%" cellspacing="5">
     
   
    <tr>
        <td valign="top"><?=Form::label('text', 'Название сайта')?>: </td>
        <td><?=Form::input('site_name', $data['site_name'], array('size' => 100))?></td>
    </tr>
              
    <tr>
        <td ><?=Form::label('site_description', 'Описание сайта')?>:</td>
        <td><?=Form::input('seo_snippet', $data['seo_snippet'], array('size' => 100))?></td>
    </tr>
    
    <tr>
        <td ><?=Form::label('site_keywords', 'Ключивые слова сайта')?>:</td>
        <td><?=Form::input('keywords', $data['keywords'], array('size' => 100))?></td>
    </tr>
    
    <tr>
        <td ><?=Form::label('site_email', 'Email сайта')?>:</td>
        <td><?=Form::input('email', $data['email'], array('size' => 50))?></td>
    </tr>
    
    <tr>
        <td colspan="2" align="center"><?=Form::submit('submit', 'Сохранить')?></td>
    </tr>
</table>
<?=Form::close()?>
