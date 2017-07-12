<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

  <main id="main">

    <section id="breadcrambs">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="/">Главная</a></li>
              <li><a href="<?php echo get_permalink(8); ?>">Каталог</a></li>
              <li class="active"><?php the_title(); ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section id="card" class="section-home">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="main-images">
              <?php if (in_category('hits')): ?><img src="<?php echo get_template_directory_uri(); ?>/images/hit-2.png" alt="" class="hit"><?php endif; ?>
              <div class="card-img-big">
                <img src="<?php the_field('product_img'); ?>" alt="" class="img-responsive">
              </div>
              <?php if (have_rows('product_gallery')): ?>
              <div class="card-img-thumb text-center">
                <div id="owl-carusel-1" class="owl-carousel owl-theme">
                  <?php while (have_rows('product_gallery')): the_row(); ?>
                  <div class="item"><a><img src="<?php the_sub_field('product_gallery_single'); ?>" alt=""></a></div>
                  <?php endwhile; ?>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <h3><?php the_title(); ?></h3>
            <?php $available = get_field('product_present'); ?>
            <div class="status">
              <?php if ($available): ?>
                <div class="est">Есть в наличии</div>
              <?php else: ?>
                <div class="net">Нет в наличии</div></div>
              <?php endif; ?>
            <?php if (have_rows('product_attrs')): ?>
            <ul class="list-unstyled red-dot">
              <?php while(have_rows('product_attrs')): the_row(); ?>
              <li><?php the_sub_field('product_attr'); ?></li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php if (have_rows('product_delivery')): ?>
            <ul class="list-unstyled plus-list visible-lg visible-xs">
              <?php while (have_rows('product_delivery')): the_row(); ?>
                <li>+ <span><?php the_sub_field('product_delivery_single'); ?></span></li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <div class="cena">
              <p><?php echo number_format(get_field('product_price'),0,'.',' '); ?><span>руб.</span> <button class="btn btn-pink pull-right btn-buy" data-id="<?php echo get_the_ID();?>">Купить</button></p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 pad-top">
           <ul class="list-unstyled plus-list visible-md visible-sm">
             <li>+ <span>В наличии в 32 городах России</span></li>
             <li>+ <span>Доставка по всей России</span></li>
             <li>+ <span>Удобная оплата</span></li>
             <li>+ <span>Гарантия качества</span></li>
           </ul>
          </div>

        </div>
      </div>
    </section>
    <section class="tabs-block section-home">
      <div class="tabs">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="nav-custom list-inline">
                <li class="active"><a href="#home" data-toggle="tab">Обзор</a></li>
                <li><a href="#profile" data-toggle="tab">Характеристики</a></li>
                <li><a href="#messages" data-toggle="tab">Отзывы</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="tabs-contant">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                  <div class="row">
                    <div class="col-md-4">
                      <iframe width="100%" height="195" src="<?php the_field('description_link'); ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6">
                      <h4><?php the_field('description_header'); ?></h4>
                      <?php the_field('description_content'); ?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="profile">
                  <div class="cont">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/option-1.png" alt="" class="pull-left">
                        <p>Длительность курса <span><?php the_field('course_delay'); ?></span></p>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/option-2.png" alt="" class="pull-left">
                        <p>Уровень отбеливания<span><?php the_field('light_level'); ?></span></p>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="numb pull-left"><?php echo explode(' ',get_field('amount'))[0];?></div>
                        <p>Количество полосок<span><?php the_field('amount'); ?></span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="messages">
                  <div class="row">
                  <div class="col-md-12">
                    <h2>Отзывы покупателей</h2>
                    <div class="block-over">
                      <div id="owl-carusel"  class="owl-carousel owl-theme">
                        <div class="item-bot">
                          <div class="img-block-slid">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img-slid.png" alt="" class="img-responsive">
                          </div>
                          <div class="border-block">
                            <div class="rev-name">Олеся</div>
                            <p class="item-text">“ Консультанты магазина подобрали мне он-лайн подходящий курс”</p>
                            <p>Пользуюсь CrestProEffects уже второй год. Очень нравится. По началу были опасения. Но мне помогли консультанты магазина и он-лайн подобрали подходящий курс. Пользуюсь CrestProEffects уже второй год. Очень нравится. </p>
                            <a href="#" class="green">Читать полностью</a>
                          </div>
                        </div>
                        <div class="item-bot">
                          <div class="img-block-slid">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img-slid.png" alt="" class="img-responsive">
                          </div>
                          <div class="border-block">
                            <div class="rev-name">Олеся</div>
                            <p class="item-text">“ Консультанты магазина подобрали мне он-лайн подходящий курс”</p>
                            <p>Пользуюсь CrestProEffects уже второй год. Очень нравится. По началу были опасения. Но мне помогли консультанты магазина и он-лайн подобрали подходящий курс. Пользуюсь CrestProEffects уже второй год. Очень нравится. </p>
                            <a href="#" class="green">Читать полностью</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row button-block">
                    <div class="col-md-6 col-xs-6 text-right">
                      <a href="#">Читать все отзывы</a>
                    </div>
                    <div class="col-md-6 col-xs-6 text-left">
                      <button class="btn btn-green" data-toggle="modal" data-target="#modal-one">Оставить отзыв</button>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="settings">...</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="section-home-7" class="section-home">
      <div class="container">
        <div class="row">
        <h2>Почему покупатели выбирают наш магазин?</h2>
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="row">
              <div class="text-center col-md-3 col-sm-6">
                <div class="adv-item adv-item-1">
                  <p>В наличии в 58
                      городах России:
                      сожете забрать
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
                      консультиование</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </section>

    <script>
      jQuery(document).ready(function($){
        $('#owl-carusel-1').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            responsive:{
                0:{
                    items:3
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        });
        $('#owl-carusel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1.5
                }
            }
        });
      });
    </script>

  </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
