<?php /* Template Name: Delivery */ ?>
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

  <section id="info">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block-contacts">
            <div class="row">
              <div class="col-md-6">
                <?php the_content(); ?>
              </div>
              <div class="col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/images/img-delivery.jpg" alt="" class="img-responsive">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="section-home-12" class="section-home">
    <div class="container">
      <div class="row">
        <h2 class="veolet">Как оформить заказ</h2>
        <div class="col-md-4">
          <div class="item-del">
            <h3>Если Вы находитесь в одном из 32 городов, где есть наши представители:</h3>
            <a href="<?php echo get_home_url(); ?>">Смотреть список городов, где есть представители</a>
            <ul class="list-unstyled">
              <li>1) Звонок</li>
              <li>2) Консультация</li>
              <li>3) Оформление заказа</li>
              <li>4) Получение в пункте выдачи в день заказа</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item-del">
            <h3>Если Вы находитесь в одном из 32 городов, где есть наши представители:</h3>
            <a href="<?php echo get_home_url(); ?>">Смотреть список городов, где есть представители</a>
            <ul class="list-unstyled">
              <li>1) Звонок</li>
              <li>2) Консультация</li>
              <li>3) Оформление заказа</li>
              <li>4) Получение в пункте выдачи в день заказа</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item-del">
            <h3>Если Вы находитесь в одном из 32 городов, где есть наши представители:</h3>
            <a href="<?php echo get_home_url(); ?>">Смотреть список городов, где есть представители</a>
            <ul class="list-unstyled">
              <li>1) Звонок</li>
              <li>2) Консультация</li>
              <li>3) Оформление заказа</li>
              <li>4) Получение в пункте выдачи в день заказа</li>
            </ul>
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
          <div class="marg-a">
            <form class="form callquestion" role="form">
              <h4>Остались вопросы?</h4>
              <p>Напишите нам и мы свяжемся<br>с Вами в течение 15 минут.</p>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Телефон">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Вопрос">
              </div>
              <div id="captcha1"></div>
              <div class="btn-block text-center">
                <button class="btn btn-pink">Получить ответ</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
