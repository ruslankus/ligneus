<?=HTML::anchor('',HTML::image('media/img/home.png'))?>

<?php foreach($menu as $name => $link): ?>
<?php if(in_array($select,$link,false)):?>
<?=HTML::anchor('admin/'.$link[0],$name,array('class' => 'select',))?>
<?php else:?>
<?=HTML::anchor('admin/'.$link[0],$name)?>
<?php endif ?>
<?php endforeach; ?>

