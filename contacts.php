<?php /* Template Name: Contacts */ ?>
<?php get_header(); ?>
<?php global $city_data; ?>
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

  <section id="info">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block-contacts">
            <div class="row">
              <div class="col-md-6">
                <?php the_content(); ?>
                <p class="text-muted">Просто найдите наш магазин в Вашем городе при помощи поиска.
                Или выберете город из списка ниже.</p>
              </div>
              <div class="col-md-6">
                <p class="v20">Поиск магазина в вашем городе</p>

                <form action="<?php the_permalink(); ?>" >
                  <input type="text" name="city" class="form-control" placeholder="Введите название города">
                  <button class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                <?php
                if (isset($_GET['city'])) {
                  $city_name = mb_convert_case($_GET['city'],MB_CASE_TITLE,"UTF-8");
                  $cities = get_posts(array('post_type'=>'cities'));
                  foreach ($cities as $single) {
                    if ($single->post_title == $city_name) {
                      $city = get_post($single->ID);
                    }
                  }
                  if (!isset($city)) {
                      $city = get_post(6);
                  }
                } else {
                  $city = get_post($city_data['id']);
                }
                ?>

                <p class="last">Наш магазин в городе <?php echo ($city->ID==6)? 'Москва':$city->post_title; ?> <br></p>
                <div class="row">
                  <div class="col-md-6">
                    <ul class="list-unstyled text-muted">
                      <li><?php the_field('city_location',$city->ID); ?></li>
                      <li>Тел. <?php the_field('city_phone',$city->ID); ?></li>
                      <li>Пн-Пт : <?php the_field('city_weekdays',$city->ID); ?></li>
                      <li>Сб,Вс : <?php the_field('city_weekends',$city->ID); ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
                          <th><?php the_title(); ?></th>
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
                          <th><?php the_title(); ?></th>
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
                          <th><?php the_title(); ?></th>
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
                          <th><?php the_title(); ?></th>
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
                          <th><?php the_title(); ?></th>
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
                          <th><?php the_title(); ?></th>
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
                          <th><?php the_title(); ?></th>
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

</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
