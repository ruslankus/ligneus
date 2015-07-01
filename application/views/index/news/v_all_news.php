    	<div id="all_news">
    		<h2>Все новости</h2>
            <hr/>
            <?php foreach($news as $news_item):?>
            <div class="news_single">
            	<h3><?=$news_item->news_title;?></h3>
                <span><?=$news_item->news_date?></span><br />
            	<p><?=Text::limit_words($news_item->news_text,35);?></p>
                <a href="<?=URL::base()?>news/get_news/<?=$news_item->id?>">Читать полностью</a>		
            </div><!------ / news_single ---------->
            <?php endforeach;?>
           
        
    	</div><!----- all_news ---------->
