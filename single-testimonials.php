<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

<main id="main">

  <section id="breadcrambs">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li><a href="<?php echo get_permalink(12); ?>">Отзывы</a></li>
            <li class="active">Отзыв</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

<section id="section-home-16" class="section-home">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="review">
          <div class="row last-rev">
            <div class="col-md-4">
              <img src="<?php the_field('review_photo'); ?>" alt="" class="img-responsive">
                <div class="rev-name text-center"><?php the_title(); ?></div>
            </div>
            <div class="col-md-8 text">
              <?php the_field('review_content'); ?>
            </div>
          </div>
        </div>
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

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
