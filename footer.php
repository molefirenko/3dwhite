<?php global $city_data; ?>
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 bot-menu col-sm-3">
        <div class="title">Меню</div>
        <ul class="list-unstyled">
          <li <?php echo (get_the_ID() == 6)? 'class="active"' : ''; ?>><a href="/">Главная</a></li>
          <li <?php echo (get_the_ID() == 8)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(8); ?>">Каталог</a></li>
          <li <?php echo (get_the_ID() == 10)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(10); ?>">Все о 3D-полосках</a></li>
          <li <?php echo (get_the_ID() == 12)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(12); ?>">Отзывы</a></li>
          <li <?php echo (get_the_ID() == 14)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(14); ?>">Доставка и оплата</a></li>
          <li <?php echo (get_the_ID() == 16)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(16); ?>">Контакты</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-3 sity">
        <div class="title">Наш магазин</div>
        <p><b>Ваш город:</b> <a href="#" data-toggle="modal" data-target="#modal-1"><?php echo $city_data['name']; ?></a><br>
          <?php the_field('city_location',$city_data['id']); ?></p>

        <p><b>Время работы офиса:</b><br>
          Пн-Пт: <?php the_field('city_weekdays',$city_data['id']); ?><br>
          <?php if (get_field('city_saturday',$city_data['id'])): ?>Сб: <?php the_field('city_saturday',$city_data['id']); ?><br><?php endif; ?>
          <?php if (get_field('city_sunday',$city_data['id'])): ?>Вс: <?php the_field('city_sunday',$city_data['id']); ?><?php endif; ?>
        </p>
      </div>
      <div class="col-md-3 col-sm-3 ctn">
        <div class="title">Наши контакты</div>
        <p><a href="tel:<?php the_field('city_phone',$city_data['id']); ?>"><?php the_field('city_phone',$city_data['id']); ?></a></p>
        <button class="btn btn-green" onclick="jQuery('#modal-three').modal('show');">Перезвоните мне</button>
      </div>
      <div class="col-md-3 col-sm-3">
        <script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>

        <!-- VK Widget -->
        <div id="vk_groups"></div>
        <script type="text/javascript">
        VK.Widgets.Group("vk_groups", {mode: 3}, 149476180);
        </script>

        <ul class="list-inline soc-link">
          <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bot-block">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>Все права защищены © 2006 - 2017</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="modal fade" id="modal-two" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<div class="modal fade" id="modal-three" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="block-form">
        <h3 class="green">Просто введите свои данные и мы <br>перезвоним Вам в ближайшее время.</h3>
        <form role="form" id="callback_form">
          <div class="form-group"><input type="text" name="Имя" placeholder="Имя Фамилия" class="form-control" required="required"></div>
          <div class="form-group"><input type="tel" name="Телефон" placeholder="Телефон" class="form-control" required="required"></div>
          <div id="captcha3"></div>
          <div class="text-center">
            <button class="btn btn-green">Перезвоните мне</button>
          </div>
        </form>
        <a class="close" data-dismiss="modal">x</a>
      </div>
      <div class="block-thx hidden">
        <h3>Мы свяжемся с Вами в ближайшее время</h3>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="block-form">
        <h3 class="green">Ваш отзыв о наших 3D-полосках<br>для отбеливания зубов</h3>
        <form role="form" id="feedback_form">
          <div class="form-group"><input type="text" name="Имя" placeholder="Имя Фамилия" class="form-control" required="required"></div>
          <div class="form-group"><input type="text" name="Адрес в соц. сети" placeholder="Адрес в соц. сети" class="form-control"></div>
          <div class="form-group"><textarea rows="4" placeholder="Ваш отзыв" name="Отзыв" id="rev" cols="30" rows="10" class="form-control" required="required"></textarea></div>
          <div id="captcha4"></div>
          <div class="text-center">
            <button class="btn btn-green">Оставить отзыв</button>
          </div>
        </form>
        <a class="close" data-dismiss="modal">x</a>
      </div>
      <div class="block-thx hidden">
        <h3>Спасибо Вам<br>за оставленный отзыв!</h3>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <a href="#" class="close" data-dismiss="modal">x</a>
    <h4>Выберите город</h4>
    <?php $cities = get_posts(array('posts_per_page'=>-1,'post_type'=>'cities','orderby'=>'title','order'=>'ASC'));
      if ($cities):
        foreach ($cities as $city) {
          $title = get_the_title($city);
          $sort_abc[substr($title,0,2)][] = $city;
        }
        foreach ($sort_abc as $key=>$posts):
    ?>
      <div class="block-20">
        <div class="head-al"><?php echo $key; ?></div>
        <ul class="list-unstyled">
          <?php foreach($posts as $post): setup_postdata($post); ?>
            <li><a href="javascript:;" onclick="change_city(<?php the_ID(); ?>);"><?php the_title(); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; endif; wp_reset_postdata(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-last" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="block-form">
        <h3 class="green">Сидорова Светлана, спасибо, <br>что выбрали наш магазин!</h3>
        <p class="text-center">В ближайшее время мы свяжемся с Вами <br>по указанному телефону: 89488547830</p>
        <p class="text-center">Заказ можно забрать в пункте выдачи по адресу: <br> г.Томск, ул. Красноармейская 96</p>
        <p class="cena text-center">Итого: <b>3 790 руб.</b></p>
        <p class="green text-center">Будем рады видеть Вас снова!</p>
        <a class="close" data-dismiss="modal">x</a>
      </div>
    </div>
  </div>
</div>

<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'></script>

<?php wp_footer(); ?>
</body>
</html>
