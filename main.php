<?php /* Template Name: Main Page */?>
<?php global $city_data;
?>
<?php get_header(); ?>
    <main id="main">
      <section id="section-home" class="section-home slider">
        <?php
        $slider = new WP_Query(array('cat'=>5,'post_type'=>'products'));
        if ($slider->have_posts()):
        ?>
        <div id="owl-main"  class="owl-carousel owl-theme">
          <?php
          while($slider->have_posts()): $slider->the_post();
          ?>
          <div class="slider-item">
            <div class="container">
              <div class="row">
                <div class="col-md-5">
                  <h1>3D-ПОЛОСКИ <span><?php the_title(); ?></span></h1>
                  <?php if (have_rows('product_attrs')): ?>
                  <ul class="list-unstyled">
                    <?php while (have_rows('product_attrs')): the_row(); ?>
                    <li>- <?php the_sub_field('product_attr'); ?></li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; ?>
                  <div class="bl-c">
                    <p><?php echo number_format(get_field('product_price'),0,'.',' '); ?> руб.</p>
                    <button class="btn btn-pink btn-buy" data-id="<?php the_ID(); ?>" onclick="window.location.href='<?php echo get_permalink(63);?>'">Купить</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <?php wp_reset_postdata();?>
      </section>
      <!-- top -->
      <section id="section-home-2" class="section-home">
        <div class="container">
          <div class="row">
          <h2>Лидеры средств<br>для ослепительной улыбки</h2>
          <?php
            $args = array(
              'showposts' => 4,
              'cat' => 3,
              'post_type' => 'products',
              'post_status' => 'publish'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()): while ($query->have_posts()): $query->the_post();
          ?>
            <div class="col-md-3 col-sm-6">
              <div class="item <?php echo (in_category('hits'))? 'item-hit':''; ?>">
                <h4><?php the_title(); ?></h4>
                <?php if (in_category('hits')): ?><img src="<?php echo get_template_directory_uri(); ?>/images/hit.png" alt="hit" class="hit"><?php endif; ?>
                <div class="img-block">
                  <div class="text-center"><a href="<?php echo get_permalink(); ?>"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/tovar.jpg" alt=""></a></div>
                </div>
                <?php if (have_rows('product_attrs')): ?>
                <ul class="list-unstyled">
                    <?php while (have_rows('product_attrs')): the_row(); ?>
                    <li><?php the_sub_field('product_attr'); ?></li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <div class="cena">
                  <p><?php echo number_format(get_field('product_price'),0,'.',' '); ?><span>руб.</span><button class="btn btn-pink pull-right  btn-buy" data-id="<?php the_ID(); ?>">Купить</button></p>
                </div>
              </div>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>

            <div class="clearfix"></div>

            <div class="col-md-12 text-center">
              <button class="btn btn-green" onclick="window.location.href='<?php echo get_permalink(8);?>'">Показать весь каталог</button>
            </div>

          </div>
        </div>
      </section>

      <section id="section-home-3" class="section-home">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-sm-6">
              <p class="pad-left">
                Купите полоски Crest 3D White<br>
                и надолго забудьте про зубные пятна от:
              </p>
            </div>
            <div class="col-md-3 col-sm-offset-1 col-md-offset-0 col-sm-4">
              <p><span>крепкого чая, кофе
              и антибиотиков</span></p>
            </div>
            <div class="col-md-2 col-sm-offset-7 col-md-offset-0 col-sm-4">
              <p><span>сигарет <br>и вина</span></p>
            </div>
            <div class="col-md-2 col-sm-offset-7 col-md-offset-0 col-sm-4">
              <p><span>естественного старения</span></p>
            </div>
          </div>
        </div>
      </section>

      <section id="section-home-4" class="section-home">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-center">Используйте Crest 3D White <span>и Вашу белоснежную улыбку заметят уже через 10 дней.</span></h2>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-4 pad">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/smile.jpg" alt="" class="img-responsive">
                  <h4>Превосходный эффект.</h4>
                  <p>Как после профессионального отбеливания, разницу результата
                  не заметит даже стоматолог!
                  В 2–3 раза дешевле, чем сеанс в клинике, экономия около
                  6–18 тыс. руб.</p>
                </div>
                <div class="col-md-4 pad">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/smile2.jpg" alt="" class="img-responsive">
                  <h4>Пользоваться просто.</h4>
                  <p>Наклеил, подержал, снял – и не нужно часами сидеть под лампой с гелем и защитой во рту.Первые результаты через 1–3 дня: несколько процедур, и зубы станут на 2–3 тона белее.</p>
                </div>
                <div class="col-md-4 mar-minus">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/smile3.jpg" alt="" class="img-responsive">
                  <h4>Чистая экономия.</h4>
                  <p>30 минут в сутки: не тратьте время и деньги на походы в клинику, купите полоски Crest и отбелите зубы дома. Комфорт: никакой боли и дискомфорта во время и после применения полосок.</p>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </section>

      <section id="section-home-5" class="section-home">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image.jpg" alt="" class="img-responsive">
            </div>
            <div class="col-md-6">
              <h3>Crest 3D White Whitestrips Professional Effects</h3>
              <p class="sub-text">Профессиональные отбеливающие полоски!</p>
              <ul class="list-unstyled big-dot">
                <?php if (have_rows('city_professional')): while (have_rows('city_professional')): the_row(); ?>
                  <li><?php the_sub_field('city_prof_attr'); ?></li>
                <?php endwhile; endif; ?>
              </ul>
              <p class="sub-text"><?php the_field('city_question'); ?></p>
              <p><?php the_field('city_answer'); ?></p>
              <p><?php the_field('city_recomend'); ?> <a class="pull-right" href="<?php echo get_permalink(8); ?>">Посмотреть все товары</a></p>
              <div class="cena">
                <?php $post_object = get_field('city_buy'); ?>
                <?php if ($post_object):
                  $post = $post_object;
                  setup_postdata($post); ?>
                <span><?php echo number_format(get_field('product_price'),0,'.',' '); ?> руб.</span>
                <button class="btn btn-green btn-buy" data-id="<?php echo get_the_ID();?>">Купить</button>
              <?php wp_reset_postdata(); endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="section-home-6" class="section-home">
        <div class="container">
          <div class="row">
            <h2 class="text-center">Видео о Crest 3D White</h2>
            <div class="col-md-4">
              <?php the_field('city_text_video'); ?>
              <a href="<?php echo get_permalink(8); ?>" class="green">Перейти к каталогу</a>
            </div>
            <div class="col-md-8">
              <iframe width="100%" height="384" src="<?php the_field('city_video_link'); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </section>

      <section id="section-home-7" class="section-home">
        <div class="container">
          <div class="row">
            <div class="col-md-12"><h2>Почему покупатели выбирают наш магазин?</h2></div>
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <div class="row">
                <div class="text-center col-md-3 col-sm-6">
                  <div class="adv-item adv-item-1">
                    <p>В наличии в 58
                        городах России:
                        сможете забрать
                        покупку в день заказа.</p>
                  </div>
                </div>
                <div class="text-center col-md-3 col-sm-6">
                  <div class="adv-item adv-item-2">
                    <p>Удобная оплата,
                        быстрая доставка,
                        гарантия
                        результата</p>
                  </div>
                </div>
                <div class="text-center col-md-3 col-sm-6">
                  <div class="adv-item adv-item-3">
                    <p>Более 10 видов
                        средств для
                        сверкающей
                        улыбки</p>
                  </div>
                </div>
                <div class="text-center col-md-3 col-sm-6">
                  <div class="adv-item adv-item-4">
                    <p>Он-лайн
                        подбор курса,
                        индивидуальное
                        консультирование</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
      </section>


      <section id="section-home-8" class="section-home">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Отзывы покупателей</h2>
              <?php $reviews = new WP_Query(array('showposts'=>-1,'cat'=>6,'post_type'=>'testimonials','post_status'=>'publish'));
              if ($reviews->have_posts()): ?>
              <div class="block-over">
                <div id="owl-carusel"  class="owl-carousel owl-theme">
                  <?php while ($reviews->have_posts()): $reviews->the_post(); ?>
                  <div class="item-bot">
                    <div class="img-block-slid">
                      <img src="<?php the_field('review_photo'); ?>" alt="" class="img-responsive">
                    </div>
                    <div class="border-block">
                      <div class="rev-name"><?php the_title(); ?></div>
                      <p class="item-text"><?php the_field('review_title'); ?></p>
                      <?php the_field('review_content'); ?>
                      <a href="<?php the_permalink(); ?>" class="green">Читать полностью</a>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div>
              <?php endif; wp_reset_postdata(); ?>
            </div>
          </div>
          <div class="row button-block">
              <div class="col-md-6 col-xs-6 text-right">
                <a href="<?php echo get_permalink(12); ?>">Читать все отзывы</a>
              </div>
              <div class="col-md-6 col-xs-6 text-left">
                <button class="btn btn-green" data-toggle="modal" data-target="#modal-one">Оставить отзыв</button>
              </div>
            </div>
        </div>
      </section>

      <section id="section-home-9" class="section-home">
        <div class="container">
          <div class="row">
            <h2>Где купить 3D-полоски</h2>
            <div class="col-md-6">
              <div class="panel-group" id="accordion">
                <?php $fo = get_posts(array('showposts'=>-1,'category_name'=>'central-fo','post_type'=>'cities')); ?>
                <?php if ($fo): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#toggle-1">Центральный ФО</a></h4>
                  </div>
                  <div id="toggle-1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($fo as $post): setup_postdata($post); ?>
                            <tr>
                              <th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                              <th><?php the_field('city_location'); ?></th>
                              <th><?php the_field('city_phone'); ?></th>
                            </tr>
                          <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php $fo = get_posts(array('showposts'=>-1,'category_name'=>'north-fo','post_type'=>'cities')); ?>
                <?php if ($fo): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#toggle-2">Северо-Западный ФО</a></h4>
                  </div>
                  <div id="toggle-2" class="panel-collapse collapse">
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($fo as $post): setup_postdata($post); ?>
                            <tr>
                              <th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                              <th><?php the_field('city_location'); ?></th>
                              <th><?php the_field('city_phone'); ?></th>
                            </tr>
                          <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php $fo = get_posts(array('showposts'=>-1,'category_name'=>'siberia-fo','post_type'=>'cities')); ?>
                <?php if ($fo): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#toggle-3">Сибирский ФО</a></h4>
                  </div>
                  <div id="toggle-3" class="panel-collapse collapse">
                    <div class="panel-body">
                     <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($fo as $post): setup_postdata($post); ?>
                            <tr>
                              <th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                              <th><?php the_field('city_location'); ?></th>
                              <th><?php the_field('city_phone'); ?></th>
                            </tr>
                          <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php $fo = get_posts(array('showposts'=>-1,'category_name'=>'ural-fo','post_type'=>'cities')); ?>
                <?php if ($fo): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#toggle-4">Уральский ФО</a></h4>
                  </div>
                  <div id="toggle-4" class="panel-collapse collapse">
                    <div class="panel-body">
                     <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($fo as $post): setup_postdata($post); ?>
                            <tr>
                              <th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                              <th><?php the_field('city_location'); ?></th>
                              <th><?php the_field('city_phone'); ?></th>
                            </tr>
                          <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel-group" id="accordion-2">
                <?php $fo = get_posts(array('showposts'=>-1,'category_name'=>'south-fo','post_type'=>'cities')); ?>
                <?php if ($fo): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-2" href="#toggle-5">Южный ФО</a></h4>
                  </div>
                  <div id="toggle-5" class="panel-collapse collapse">
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($fo as $post): setup_postdata($post); ?>
                            <tr>
                              <th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                              <th><?php the_field('city_location'); ?></th>
                              <th><?php the_field('city_phone'); ?></th>
                            </tr>
                          <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php $fo = get_posts(array('showposts'=>-1,'category_name'=>'east-fo','post_type'=>'cities')); ?>
                <?php if ($fo): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-2" href="#toggle-6">Дальневосточный ФО</a></h4>
                  </div>
                  <div id="toggle-6" class="panel-collapse collapse">
                    <div class="panel-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($fo as $post): setup_postdata($post); ?>
                            <tr>
                              <th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                              <th><?php the_field('city_location'); ?></th>
                              <th><?php the_field('city_phone'); ?></th>
                            </tr>
                          <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php $fo = get_posts(array('showposts'=>-1,'category_name'=>'volga-fo','post_type'=>'cities')); ?>
                <?php if ($fo): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-2" href="#toggle-7">Приволжский ФО</a></h4>
                  </div>
                  <div id="toggle-7" class="panel-collapse collapse">
                    <div class="panel-body">
                     <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Город</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($fo as $post): setup_postdata($post); ?>
                            <tr>
                              <th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
                              <th><?php the_field('city_location'); ?></th>
                              <th><?php the_field('city_phone'); ?></th>
                            </tr>
                          <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="section-home-10" class="section-home">
        <div id="map"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="marg-a" id="qa-form">
                <a href="javascript:;" class="close" onclick="jQuery('#qa-form').addClass('hidden');">x</a>
                <form class="form callquestion" role="form">
                  <h4>Остались вопросы?</h4>
                  <p>Напишите нам и мы свяжемся<br>с Вами в течение 15 минут.</p>
                  <div class="form-group">
                  <label for="tel">Телефон</label>
                    <input name="Телефон" type="text" id="tel" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                  <label for="ask">Вопрос</label>
                    <textarea id="ask" name="Вопрос" type="text" class="form-control" required="required"></textarea>
                  </div>
                  <div id="captcha1"></div>
                  <div class="btn-block text-center">
                    <button class="btn btn-pink">Получить ответ</button>
                  </div>
                </form>
                <div class="block-thx hidden">
                  <h4>Спасибо <br>за Ваш вопрос!</h4>
                  <p>с Вами в течение 15 минут.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
<?php get_footer(); ?>
