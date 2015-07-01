    <div id="meniu_holder" class="holder">
    	<ul id="nav">
        <?php foreach($pages as $page): ?>
            <?php if($page->sub_cat == 1): ?>
            	<li><span><?=$page->title_ru?></span>
                    <ul class="sub">
                        <?php foreach($categories as $cat): ?>  
                            <li><a href="<?=URL::base()?>categories/<?=$cat->id?>"><?=$cat->cat_title_ru?></a></li>    
                        <?php endforeach;?>
                    </ul>
                </li>
            <?php else: ?>
        	<li><a href="<?=URL::base()?><?=$page->title_en?>"><?=$page->title_ru?></a></li>
            <?php endif;?>
         <?php endforeach; ?>
            
        
            	
        </ul>
        <div class="clear"></div>

    </div><!--- / meniu_holder ---->
