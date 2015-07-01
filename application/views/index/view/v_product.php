    	<div id="product">
        	<h2><?=$product->title_ru?></h2>
        	<hr>
            <div class="product_inner">
            	<div id="image_section" class="section_holder">
                    <?php if($images->count() > 0):?>
                	<div class="main_image">
                    	<a href="<?=URL::base()?>media/uploads/<?=$images[0]->image_name?>" rel="lightbox"><img src="<?=URL::base()?>media/uploads/<?=$images[0]->image_name?>" width="289" height="410"></a>
                    </div><!-----/ main_image ---->
                    <div class="img_thumb">
                    <?php foreach($images as $image):?>
                    	<a href="#"><img src="<?=URL::base()?>media/uploads/<?=$image->image_name?>" width="83" height="101"></a>
                    <?php endforeach;?>	
                    </div>
                    <?php else:?>
                    <div class="main_image">
                    	<img src="<?=URL::base()?>media/images/nopic.jpg" width="289" height="410" alt alt="фото продукта отсуствует">
                    </div><!-----/ main_image ---->
                    <?php endif;?>
                </div><!----- / image_section ---->
                <div id="tech_section" class="section_holder">
                	<h3>Технические характеристики</h3>
                    <?=$product->prod_text?>
                    
                    <a href="<?=URL::base()?>media/pdf/<?=$product->pdf?>" target="_blank">Скачать техническую документацию</a>
                    <div id="serti">
                    	<table width="450">
                        	<tr>
                                <td><img src="<?=URL::base()?>media/images/sert1.png" width="63" height="57"></td>
                                <td><img src="<?=URL::base()?>media/images/sert2.png" width="63" height="98"></td>
                                <td><img src="<?=URL::base()?>media/images/sert3.png" width="61" height="74"></td>
                                <td><img src="<?=URL::base()?>media/images/sert4.png" width="61" height="56"></td>
                                <td><img src="<?=URL::base()?>media/images/sert5.png" width="62" height="53"></td>
                        	</tr>
                        </table>
                    </div><!----/ serti ------------>
                </div><!------ / tech_section ----->
            </div><!----- / product_inner --------->
    		<div class="clear"></div>
    	</div><!------ / product --------->
