<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<?php if(isset($seo_snippet)):?>
    <meta name="description" content="<?=$seo_snippet?>" />
<?php endif;?>
<?php if(isset($keywords)):?>
    <meta name="keywords" content="<?=$keywords?>" />
<?php endif;?>



<?php if(isset($scripts)):?>
    <?php foreach($scripts as $file_script):?>
        <?=HTML::script($file_script);?>    
    <?php endforeach;?>
<?php endif;?>

<?php if(isset($styles)):?>
    <?php foreach($styles as $file_style):?>
        <?=HTML::style($file_style);?>
    <?php endforeach;?>
<?php endif;?>


<title>
    <?php if(isset($title)):?>
        <?=$title?>&nbsp;
    <?php endif;?>    
    <?php if(isset($title_head)):?>
       |&nbsp;<?=$title_head; ?>
    <?php endif;?> 
</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43542738-1', 'ligneus.ru');
  ga('send', 'pageview');

</script>
</head>

<body>
<div id="conteiner">
	<div id="header" >
   	<div class="header_holder holder">
        	<div class="logo">
   	    		<a href="<?=URL::base()?>"><img src="<?=URL::base()?>media/images/logo.png" width="111" height="116" alt="logo"/></a>
         	</div><!-- /logo  -->
            <div class="header_links">
            	<p class="phone_number">+7 (499) 406 05 60</p>
                <p class="email"><?=$email?></p>
                <p class="catalog_download"><?=HTML::file_anchor('media/pdf/catalog.pdf', 'Скачать каталог'); ?></p>
            </div><!-- / header_links  -->
            <div class="clear"></div>
        </div>
	</div><!-- / header -->
    
    <!--  meniu output start  -->
    <?php if(isset($meniu_main)): ?> 
        <?=$meniu_main ?>
    <?php endif; ?>
    <!-- / meniu output end     -->
    <section id="slider_holder" class="holder slider">
    <!-- slider and plugin output  -->
    <?php if(isset($slider_plugin)): ?> 
        <?=$slider_plugin ?>
    <?php endif; ?>
        
    <!-- slider and plugin output  -->    
    </section><!-- /slider_holder -->
    <div id="content_holder" class="holder">
    
    <!-- / content output start  -->
    
    <?php if(isset($content)):?>
        <?=$content?>
    <?php endif?>
    
    <!-- / content output end  -->
    </div><!-- / content_holder  -->
    <div id="footer">
    	<p>Ligneus&copy;2013</p>
    </div>
</div><!-- /conteiner -->
</body>
</html>
