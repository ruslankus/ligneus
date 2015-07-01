    	<div id="contacts">
    		<div id="adress_holder" class="contacts_inner">
            	<div id="main_office">
                	<h2>Главный офис</h2>
                    <?=$data->main_adress?>
                </div><!----/ main_office ----->
                <div id="map">
                    
                    <iframe width="400" height="260" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ru/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q=%D1%83%D0%BB.+%D0%9A%D1%80%D1%8B%D0%BC%D1%81%D0%BA%D0%B8%D0%B9+%D0%92%D0%B0%D0%BB,+%D0%B4.+8,+%D0%BA%D0%BE%D1%80%D0%BF.+2&amp;aq=&amp;sll=55.354135,40.297852&amp;sspn=14.19963,43.286133&amp;ie=UTF8&amp;hq=&amp;hnear=%D1%83%D0%BB.+%D0%9A%D1%80%D1%8B%D0%BC%D1%81%D0%BA%D0%B8%D0%B9+%D0%92%D0%B0%D0%BB,+8+%D0%BA%D0%BE%D1%80%D0%BF%D1%83%D1%81+2,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+119049&amp;t=m&amp;ll=55.732523,37.607574&amp;spn=0.012565,0.034246&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.ru/maps?f=q&amp;source=embed&amp;hl=ru&amp;geocode=&amp;q=%D1%83%D0%BB.+%D0%9A%D1%80%D1%8B%D0%BC%D1%81%D0%BA%D0%B8%D0%B9+%D0%92%D0%B0%D0%BB,+%D0%B4.+8,+%D0%BA%D0%BE%D1%80%D0%BF.+2&amp;aq=&amp;sll=55.354135,40.297852&amp;sspn=14.19963,43.286133&amp;ie=UTF8&amp;hq=&amp;hnear=%D1%83%D0%BB.+%D0%9A%D1%80%D1%8B%D0%BC%D1%81%D0%BA%D0%B8%D0%B9+%D0%92%D0%B0%D0%BB,+8+%D0%BA%D0%BE%D1%80%D0%BF%D1%83%D1%81+2,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+119049&amp;t=m&amp;ll=55.732523,37.607574&amp;spn=0.012565,0.034246&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">Просмотреть увеличенную карту</a></small>
                 
                </div>
                <div id="branches">
                	<h2>Филиалы</h2>
                    <?=$data->branch_adress?>
                </div><!----/branches --------->
            </div><!---- / adress_holder ----->
    		<div id="form_holder" class="contacts_inner">
            	<h2>Пишите нам</h2>
                <form action="<?=URL::base()?>email" method="post">
                	<p class="labels">Имя, Фамилия</p>
                    <p class="inputs"><input name="name" type="text" required /></p>
                	<p class="labels">Электронная почта</p>
                    <p class="inputs"><input name="mail" type="text" required/></p>
                	<p class="labels">Контактный телефон</p>
                    <p class="inputs"><input name="phone" type="phone"/></p>
                	<p class="labels">Ваш текст</p>
                    <p class="inputs"><textarea name="mail_text"></textarea></p>
                    <p class="inputs"><input id="submit" type="submit" value="Отправить сообщение" name="submit"></p>
                </form>
            </div><!-----/ form_holder ------->
            <div class="clear"></div>
    	</div><!---- / contacts ------->
