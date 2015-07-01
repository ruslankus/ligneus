          <h2>Новости</h2>
            <?php foreach($news as $news_item):?>          
                <div class="news">
                	<h3><?=$news_item->news_title?></h3>
                    <p><?=$news_item->news_date?> -  <?=Text::limit_words($news_item->news_text,18);?></p>
                    <a href="<?=URL::base()?>news/get_news/<?=$news_item->id?>">Читать далее</a>
                    <div class="clear"></div>
                </div>
               <?php endforeach;?> 
                
                <a href="<?=URL::base()?>news">Читать все новости</a>