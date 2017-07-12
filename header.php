<?php global $city_data; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <!-- fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- css -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
    <?php wp_head(); ?>
    <script>
      var onloadCallback = function () {
        var Widget1;
        var Widget2;
        var Widget3;
        var Widget4;
        <?php if (is_front_page() || is_page('dostavka-i-oplata')): ?>
        Widget1 = grecaptcha.render('captcha1',{
          'sitekey' : '6LfZQScUAAAAAOE9v54xuw8K5w0w9ElAEaY2Yv_x'
        });
        <?php endif; ?>
        <?php if (is_singular('cities')): ?>
        Widget2 = grecaptcha.render('captcha2',{
          'sitekey' : '6LfZQScUAAAAAOE9v54xuw8K5w0w9ElAEaY2Yv_x'
        });
        <?php endif; ?>
        Widget3 = grecaptcha.render('captcha3',{
          'sitekey' : '6LfZQScUAAAAAOE9v54xuw8K5w0w9ElAEaY2Yv_x'
        });
        Widget4 = grecaptcha.render('captcha4',{
          'sitekey' : '6LfZQScUAAAAAOE9v54xuw8K5w0w9ElAEaY2Yv_x'
        });
      };
      // Как только будет загружен API и готов DOM, выполняем инициализацию
      ymaps.ready(init);

      function init () {
          // Создание экземпляра карты и его привязка к контейнеру с
          // заданным id ("map")
          if (jQuery('#map').length != 0) {
            var myMap = new ymaps.Map('map', {
                    // При инициализации карты, обязательно нужно указать
                    // ее центр и коэффициент масштабирования
                    center: [56.326944, 44.0075], // Нижний Новгород
                    zoom: 13
                });
          }
          var myGeocoder = ymaps.geocode("<?php echo ($city_data['name'] == '')? 'Москва' : $city_data['name']; ?>, <?php the_field('city_location',$city_data['id']); ?>");
          myGeocoder.then(
              function (res) {
                  console.log('Координаты объекта :' + res.geoObjects.get(0).geometry.getCoordinates());
                  myMap.setCenter(res.geoObjects.get(0).geometry.getCoordinates(),14);
                  myGeoObject = new ymaps.GeoObject({
                    geometry: {
                      type: "Point", // тип геометрии - точка
                      coordinates: res.geoObjects.get(0).geometry.getCoordinates() // координаты точки
                    }
                  });
                  myMap.geoObjects.add(myGeoObject); // Размещение геообъекта на карте.
              },
              function (err) {
                  console.log('Ошибка');
              }
          );
      }
    </script>
    <style>
      button {
        outline:none !important;
      }
      button::-moz-focus-inner {
        border: 0 !important;
      }
      input {
        cursor: text !important;
      }
      </style>
  </head>
  <body>
    <header id="header">
      <div class="top-head">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-6">
              <div id="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="3D-white"></a></div>
            </div>
            <div class="col-md-2 col-sm-6 slog">
              <p>Сеть магазинов по продаже отбеливающих полосок</p>
            </div>
            <div class="col-md-2 col-sm-6">
              <button class="btn btn-green" onclick="jQuery('#modal-three').modal('show');">Перезвоните мне</button>
            </div>
            <div class="col-md-3 col-sm-6 top-phone col-sm-push-6 col-md-push-0">
              <p>Бесплатый звонок</p>
              <a href="tel:<?php echo get_theme_mod('global_phone'); ?>" class="tel"><?php echo get_theme_mod('global_phone'); ?></a>
            </div>
            <div class="col-md-3 col-sm-6 sity col-sm-pull-6 col-md-pull-0">
              <?php if ($city_data['name'] != ''): ?><p>Ваш город: <a class="sity-a" href="#" data-toggle="modal" data-target="#modal-1"><?php echo $city_data['name']; ?><i class="fa fa-angle-down" aria-hidden="true"></i></a></p><?php endif; ?>
                <a href="tel:<?php the_field('city_phone',$city_data['id']); ?>" class="tel"><?php the_field('city_phone',$city_data['id']); ?></a>
                <p><?php the_field('city_location',$city_data['id']); ?></p>
            </div>
          </div>
        </div>
      </div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      <nav class="collapse navbar-collapse main-menu" id="bs-example-navbar-collapse-1">

        <div class="container">
          <div class="row">
              <ul class="list-inline">
                <li <?php echo (get_the_ID() == 6)? 'class="active"' : ''; ?>><a href="/">Главная</a></li>
                <li <?php echo (get_the_ID() == 8)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(8); ?>">Каталог</a></li>
                <li <?php echo (get_the_ID() == 10)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(10); ?>">Все о 3D-полосках</a></li>
                <li <?php echo (get_the_ID() == 12)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(12); ?>">Отзывы</a></li>
                <li <?php echo (get_the_ID() == 14)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(14); ?>">Доставка и оплата</a></li>
                <li <?php echo (get_the_ID() == 16)? 'class="active"' : ''; ?>><a href="<?php echo get_permalink(16); ?>">Контакты</a></li>
              </ul>
          </div>
        </div>
      </nav>
    </header>
