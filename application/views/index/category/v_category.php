<div id="category">
    		<div id="cat_description">
            	<?=$cat->cat_description?>
            </div><!--- /cat_description -->
            
            <!------------ wood corlor output start ------------->
            <?=$wood_colors?>           
            <!------------ wood corlor output end ------------->
            
            <!---- glass color output start ---------->
    		<?php if(isset($glass_colors)):?>
                <?=$glass_colors?>
            <?php endif;?>
            <!---- glass color output end ---------->
            
            <div id="products">
            	<h2><?=$cat->cat_title_ru?></h2>
                
                <?php if($products->count() > 0):?>
                <?php foreach($products as $product):?>
                <div class="curr_product">
                    <?php if($product->small_photo):?>
                	   <img src="<?=URL::base()?>media/uploads/<?=$product->small_photo?>" width="100" height="100"/>
                    <?php else:?>
                        <img src="<?=URL::base()?>media/images/nopic.jpg"  width="100" height="100" />
                    <?php endif;?>
                    <p><a href="<?=URL::base()?>view/product/<?=$product->id?>"><strong><?=$product->title_ru?></strong>&nbsp;<?=$product->prod_intro?></a> </p>
				<div class="clear"></div>
                </div><!--- /curr_product --->
                <?php endforeach;?>
                <?php else:?>
                    <p> В этой категории продукты отсуствуют </p>
                <?php endif;?>
                
            </div><!--- /products -->
            <div id="cat_examples">
            	<h2>Примеры работ</h2>
                <?php if($examples->count() > 0):?>
                    <?php foreach($examples as $example): ?>
                       <a href="<?=URL::base()?>media/uploads/<?=$example->photo_name?>" rel="lightbox['example']"><img src="<?=URL::base()?>media/uploads/<?=$example->photo_name?>" width="143" height="98"></a>
                    <?php endforeach;?>
                <div class="clear"></div>
                <?php else:?>
                    <p>В этой категории примеры отсуствуют</p>
                <?php endif;?>
            </div><!--- /cat_examples -->
    	</div><!--- /category ---------->