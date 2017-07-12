<?php /* Template Name: Reviews */ ?>
<?php get_header(); ?>

<main id="main">

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

<section id="section-home-16" class="section-home">
  <div class="container">
    <div class="row">
      <?php $reviews = new WP_Query(array('showposts'=>-1,'post_type'=>'testimonials','post_status'=>'publish'));
      if ($reviews->have_posts()): ?>
      <?php while ($reviews->have_posts()): $reviews->the_post(); ?>
      <div class="col-md-4 col-sm-6">
        <div class="reviews">
          <img src="<?php the_field('review_photo'); ?>" alt="" class="img-responsive">
          <div class="text">
            <div class="rev-name"><?php the_title(); ?></div>
            <p class="item-text">“<?php the_field('review_title'); ?>”</p>
            <?php the_field('review_content'); ?>
            <a href="<?php the_permalink(); ?>" class="green pull-right">Читать полностью</a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
      <div class="row button-block text-center">
        <button class="btn btn-green" data-toggle="modal" data-target="#modal-one">Оставить отзыв</button>
      </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
