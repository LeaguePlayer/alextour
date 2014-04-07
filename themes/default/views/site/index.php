<div class="row line-1">
                <div class="col-lg-6" id="searchtour">
                    <a href="#" class="searchtour-1">
                        <h3>Подобрать тур</h3>
                    </a>
					<a href="#" class="searchtour-2">
                        <h3>Подобрать тур быстро и надежно</h3>
                    </a>
                </div>
                <div class="col-lg-2" id="request">
                    <a href="#" class="request-1">
                        <h3>Оставить <br />заявку</h3>
                    </a>
					<a href="#" class="request-2">
                        <h3>Жми сейчас</h3>
                    </a>
                </div>
                <div class="col-lg-4" id="hottours">
                    <a href="#" class="hottours-1">
                        <h3>Горящие туры</h3>
                    </a>
					<a href="#" class="hottours-2">
                        <h3>Подобрать лучшие горящие туры</h3>
                    </a>
                </div>
            </div>
		
			<form action="#" method="post">
				<div id="search-tour">
					<h3>Подобрать тур</h3>
					<div class="row margin-bottom-15">
						<div class="col-lg-3">
							<select>
								<option>Город отправления</option>
								<option>Город 1</option>
								<option>Город 2</option>
								<option>Город 3</option>
								<option>Город 4</option>
								<option>Город 5</option>
							</select>
						</div>
						<div class="col-lg-3">
							<select>
								<option>Страна прибытия</option>
								<option>Страна 1</option>
								<option>Страна 2</option>
								<option>Страна 3</option>
								<option>Страна 4</option>
								<option>Страна 5</option>
							</select>
						</div>
						<div class="col-lg-3">
							<select>
								<option>Город прибытия</option>
								<option>Город 1</option>
								<option>Город 2</option>
								<option>Город 3</option>
								<option>Город 4</option>
								<option>Город 5</option>
							</select>
						</div>
						<div class="col-lg-3">
							<select>
								<option>Вид курорта</option>
								<option>Вид 1</option>
								<option>Вид 2</option>
								<option>Вид 3</option>
								<option>Вид 4</option>
								<option>Вид 5</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<div class="row">
								<div class="col-lg-7"><label for="people">Кол-во человек</label></div>
								<div class="col-lg-5">
									<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>							
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="row">
								<div class="col-lg-10"><input class="datepicker" placeholder="Вылет с " type="text" name="people" /></div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="row">
								<div class="col-lg-10"><input class="datepicker" placeholder="Вылет по " name="people" type="text" /></div>
							</div>
						</div>
						<div class="col-lg-3">
							<a href="#" class="btn red">Подобрать тур</a>
						</div>
					</div>
					
					<a class="more-filter" href=""><span class="plus">+</span> <span class="more-filter-text">Расширенный фильтр</span></a>
					
				</div>
			</form>
		
            <div class="row line-2">
                <div class="col-lg-2" id="reviews">
                    <a href="#" class="reviews-1">
						<h3>Отзывы</h3>
					</a>
					<a href="#" class="reviews-2">
						<h3>Оставить отзыв</h3>
					</a>
                </div>
                <div class="col-lg-4" id="what">
                    <a href="#" class="what-1">
						<h3>Почему Алекс Тур?</h3>
					</a>
					<a href="#" class="what-2">
						<h3>Я выбираю надежность</h3>
					</a>
                </div>
                <div class="col-lg-4" id="special">
                    <a href="#" class="special-1">
						<h3>Спецпредложение</h3>
					</a>
					<a href="#" class="special-2">
						<h3>С нами удобно</h3>
					</a>
                </div>
                <div class="col-lg-2" id="news">
                    <a href="#" class="news-1">
						<h3>Новости</h3>
					</a>
					<a href="#" class="news-2">
						<h3>Последние события в мире</h3>
					</a>
                </div>
            </div>

            <div id="question">
                <h3>У вас есть к нам вопросы?</h3>
                <div class=" phone-wrapper">
                    <a href="#" class="btn green">
                        Свяжитесь с нами
                    </a> 
					<span class="phone"> +7 (3452)</span> <strong>30-57-93</strong><i class="icon phone"></i>
                </div>
            </div>

            <div id="map">
                <img src="<?=$this->getAssetsUrl();?>/images/map.jpg" alt="Где находится Алекс Тур" />
            </div>

			<? if( $data['partners'] ) { ?>
            	<? $this->renderPartial("_partners", array('partners'=>$data['partners'])); ?>
            <? } ?>
            
			<div id="hr"></div>