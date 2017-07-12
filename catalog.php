<?php /* Template Name: Catalog */ ?>
<?php get_header(); ?>

<main id="main">
  <!-- top -->
  <section id="breadcrambs">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li class="active"><?php the_title(); ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section id="info">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block-info">
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <span>В наличии</span><p>в 58 городах<br> России</p>
              </div>
              <div class="col-md-5 col-sm-5">
                <span>Бесплатная доставка</span><p>оперативно<br> доставим заказ</p>
              </div>
              <div class="col-md-4 col-sm-4">
                <span>Без <br class="visible-xs">выходных</span><p>поможем<br> подобрать курс</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="control">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="tbl active" ><span></span><span></span><span></span><span></span></a>
          <a class="line" ><span></span><span></span></a>
        </div>
      </div>
    </div>
  </section>

  <section id="section-home-2" class="section-home tbl-block ">
    <div class="container">
      <?php $products = new WP_Query(array('showposts'=>-1,'post_type'=>'products','post_status'=>'publish')); ?>
      <?php if ($products->have_posts()): $rows = $products->post_cout/4;$row = 1; $posts = 0; ?>
      <?php while ($products->have_posts()): $products->the_post(); ?>
      <?php if ($posts == 0): ?><div class="row <?php if ($rows == $row):?>last-row<?php endif;?>"><?php endif; ?>
        <div class="col-md-3 col-sm-6">
          <div class="item <?php if (in_category('hits')): ?>item-hit<?php endif; ?>">
            <h4><?php the_title(); ?></h4>
            <?php if (in_category('hits')): ?><img src="<?php echo get_template_directory_uri(); ?>/images/hit.png" alt="" class="hit"><?php endif; ?>
            <div class="img-block">
              <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php the_field('product_img'); ?>" alt=""></a>
            </div>
            <?php if (have_rows('product_attrs')): ?>
            <ul class="list-unstyled">
              <?php while (have_rows('product_attrs')): the_row(); ?>
              <li><?php the_sub_field('product_attr'); ?></li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <div class="cena">
              <p><?php echo number_format(get_field('product_price'),0,'.',' '); ?> <span>руб.</span><button class="btn btn-pink pull-right  btn-buy" data-id="<?php the_ID(); ?>">Купить</button></p>
            </div>
          </div>
            <div class="more text-center"><a href="<?php the_permalink(); ?>">подробнее</a></div>
        </div>
      <?php if ($posts == 3): ?></div><?php endif; ?>
      <?php $posts++; if ($posts >= 4) {$posts = 0; $row++;} ?>
      <?php endwhile; ?>
      <?php endif; wp_reset_postdata();?>
    </div>
  </section>

  <section id="section-home-11" class="section-home line-block hidden">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php $products = new WP_Query(array('showposts'=>-1,'post_type'=>'products','post_status'=>'publish')); ?>
          <?php if ($products->have_posts()): while ($products->have_posts()): $products->the_post(); ?>
          <div class="item-line">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/images/hit-2.png" alt=""><?php the_title(); ?></h3>
            <div class="row">
              <div class="col-md-4 text-center big-image">
                <img src="<?php the_field('product_img');?>" class="img-responsive inline" alt="">
                <a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
              </div>
              <div class="col-md-8">
                <?php the_field('description_content'); ?>
                <div class="row">
                  <div class="col-md-7">
                    <?php if (have_rows('product_attrs')): ?>
                    <ul class="list-unstyled red-dot">
                      <?php while (have_rows('product_attrs')): the_row(); ?>
                      <li><?php the_sub_field('product_attr'); ?></li>
                      <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-5">
                    <ul class="list-unstyled plus-list">
                      <li>+ <span>Есть в наличии</span></li>
                      <li>+ <span>Доставка по всей России</span></li>
                      <li>+ <span>Удобная оплата</span></li>
                      <li>+ <span>Гарантия качества</span></li>
                    </ul>
                    <div class="cena">
                      <p><?php echo number_format(get_field('product_price'),0,'.',' '); ?><span>руб.</span> <button class="btn btn-pink" data-id="<?php the_ID(); ?>">Купить</button></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; endif; wp_reset_postdata();?>
        </div>
      </div>
    </div>
  </section>

  <section id="section-home-7" class="section-home pad-bot">
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

</main>

<?php get_footer(); ?>
