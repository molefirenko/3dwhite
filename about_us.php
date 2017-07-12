<?php /* Template Name: About Us */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
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

  <section id="about" class="section-home">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="block-ul">
            <ul class="list-unstyled">
              <li class="active"><a href="<?php the_permalink(); ?>">Инструкция <span>></span></a></li>
              <li><a href="<?php the_permalink(); ?>?part=1">Часто задаваемые вопросы <span>></span></a></li>
              <li><a href="<?php the_permalink(); ?>?part=2">Как отбеливают полоски Crest <span>></span></a></li>
              <li><a href="<?php the_permalink(); ?>?part=3">Как использовать полоски Crest <span>></span></a></li>
              <li><a href="<?php the_permalink(); ?>?part=4">Состав полосок <span>></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9 col-sm-8 right">
          <?php $parts = get_posts(array('category_name'=>'about','post_type'=>'post'));
            if (!isset($_GET['part'])) {
              $part_id = 0;
            } else {
              $part_id = intval($_GET['part']);
            }
            switch ($part_id) {
              case 0: $part_name = 'Инструкция'; break;
              case 1: $part_name = 'Часто задаваемые вопросы'; break;
              case 2: $part_name = 'Как отбеливают полоски Crest'; break;
              case 3: $part_name = 'Как использовать полоски Crest'; break;
              case 4: $part_name = 'Состав полосок'; break;
              default: $part_name = 'Инструкция';
            }
            foreach ($parts as $part) {
              if ($part->post_title == $part_name) {
                echo '<h3>'.$part->post_title.'</h3>';
                echo $part->post_content;
                break;
              }
            }
          ?>
          <h3>Рекомендации по применению полосок Crest 3D White</h3>
          <div class="row bottom">
            <div class="col-md-7">
              <p class="normal"> Приведённые ниже советы помогут вам отбелить зубы максимально быстро и сохранить эмаль здоровой.</p>
              <ul class="list-unstyled big-dot">
                <?php if (have_rows('about_recomends')): while (have_rows('about_recomends')): the_row(); ?>
                  <li><?php the_sub_field('about_recomend'); ?></li>
                <?php endwhile; endif; ?>
              </ul>
            </div>
            <div class="col-md-5">
              <img src="<?php the_field('about_photo'); ?>" alt="" class="img-responsive">
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
