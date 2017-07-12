<?php
function geo_detect() {
  global $city_data;
  if (!isset($_COOKIE['city'])) {
    $geo_ip = geoip_detect2_get_info_from_current_ip();
    if ($geo_ip) {
      $location = $geo_ip->city->name;
      $cities = get_posts(array('showposts'=>-1,'post_type'=>'cities'));
      if ($cities) {
        foreach ($cities as $city) {
          if ($city->post_title == $location) {
            $data = array(
              'name' => $location,
              'id'   => $city->ID
            );
            setcookie('city',json_encode($data),time()+3600,"/");
            $link = get_permalink($data['id']);
            wp_redirect($link);
            exit();
          }
        }
      }
      $city_data = array(
        'name' => 'Не выбран',
        'id'   => 6
      );
      setcookie('city',json_encode($city_data),time()+3600,"/");
      wp_reset_postdata();
    }
  } else {
    $city_data = json_decode(stripslashes($_COOKIE['city']),true);
  }
}
if (!is_admin()) {
  add_action('init','geo_detect');
}

function themeslug_customize_register( $wp_customize ) {
  $wp_customize->add_setting( 'email', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => 'rusruscrm@gmail.com',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => '',
    'sanitize_js_callback' => '', // Basically to_json.
  ) );
  $wp_customize->add_setting( 'global_phone', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => '8-800-200-85-66',
    'transport' => 'refresh', // or postMessage
    'sanitize_callback' => '',
    'sanitize_js_callback' => '', // Basically to_json.
  ) );

  $wp_customize->add_control( 'email', array(
    'label' => __( 'Email' ),
    'type' => 'textarea',
    'section' => 'custom_attrs',
  ) );

  $wp_customize->add_control( 'global_phone', array(
    'label' => __( 'Номер телефона' ),
    'type' => 'textarea',
    'section' => 'custom_attrs',
  ) );

  $wp_customize->add_section( 'custom_attrs', array(
    'title' => __( 'Дополнительно' ),
    'description' => __( 'Дополнительные параметры темы' ),
    'panel' => '', // Not typically needed.
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
  ) );

}
add_action( 'customize_register', 'themeslug_customize_register' );

function enqueue_scripts() {
  wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'));
  wp_enqueue_script('owl-carousel',get_template_directory_uri().'/js/owl.carousel.min.js',array('jquery'));
  wp_enqueue_script('masked-input',get_template_directory_uri().'/js/jquery.maskedinput.min.js',array('jquery'));
  wp_enqueue_script('main',get_template_directory_uri().'/js/main.js',array('jquery'));
  wp_localize_script('main','myajax',array(
    'nonce' => wp_create_nonce('3dwhite'),
    'url' => admin_url('admin-ajax.php'),
    'carturl' => get_permalink(63),
  ));
}

function enqueue_styles() {
  wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
  wp_enqueue_style('fonts',get_template_directory_uri().'/fonts/fonts.css');
  wp_enqueue_style('owl-carousel',get_template_directory_uri().'/css/owl.carousel.min.css');
  wp_enqueue_style('style',get_template_directory_uri().'/css/style.css');
}

add_action('wp_enqueue_scripts','enqueue_styles');
add_action('wp_enqueue_scripts','enqueue_scripts');


function create_post_types() {
  register_post_type( 'products',
    array(
      'labels' => array(
        'name' => __( 'Продукты' ),
        'singular_name' => __( 'Продукт' ),
        'add_new' => __('Добавить новый'),
      ),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'has_archive' => true,
      'can_export' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'supports' => array('title', 'revisions', 'comments'),
      'taxonomies' => array( 'category' ),
      'capability_type' => 'post',
    )
  );

  register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' => __( 'Отзывы' ),
        'singular_name' => __( 'Отзыв' ),
        'add_new' => __('Добавить новый'),
      ),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'has_archive' => true,
      'can_export' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'supports' => array('title', 'revisions'),
      'taxonomies' => array( 'category' ),
      'capability_type' => 'post',
    )
  );

  register_post_type( 'cities',
    array(
      'labels' => array(
        'name' => __( 'Города' ),
        'singular_name' => __( 'Город' ),
        'add_new' => __('Добавить город'),
      ),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'has_archive' => true,
      'can_export' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'supports' => array('title', 'revisions'),
      'taxonomies' => array( 'category' ),
      'capability_type' => 'post',
    )
  );

  register_post_type( 'orders',
    array(
      'labels' => array(
        'name' => __( 'Заказы' ),
        'singular_name' => __( 'Заказ' ),
        'add_new' => __('Добавить заказ'),
      ),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'has_archive' => true,
      'can_export' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'supports' => array('title', 'editor', 'revisions'),
      'capability_type' => 'post',
    )
  );

}
add_action('init','create_post_types');

function addCart() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }
  $cart = array();
  if ( isset($_COOKIE['cart']) ) {
    $cart = json_decode(stripslashes($_COOKIE['cart']),true);
  }
  if (isset($_POST['id'])) {
    if (count($cart) == 0) {
      $cart[$_POST['id']] = 1;
    } else {
      if (isset($cart[$_POST['id']])) {
        $cart[$_POST['id']]++;
      } else {
        $cart[$_POST['id']] = 1;
      }
    }
    setcookie('cart',json_encode($cart),0,"/");
  }
  wp_die();
}
add_action('wp_ajax_addCart','addCart');
add_action('wp_ajax_nopriv_addCart','addCart');

function subCart() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }
  if ( isset($_COOKIE['cart']) && isset($_POST['id']) ) {
    $cart = json_decode(stripslashes($_COOKIE['cart']),true);
    $id = $_POST['id'];
    if (array_key_exists($id,$cart)) {
      if ($cart[$id] > 1) {
        $cart[$id]--;
        setcookie('cart',json_encode($cart),0,"/");
      }
    }
  }
  wp_die();
}
add_action('wp_ajax_subCart','subCart');
add_action('wp_ajax_nopriv_subCart','subCart');

function remCart() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }
  if ( isset($_COOKIE['cart']) && isset($_POST['id']) ) {
    $cart = json_decode(stripslashes($_COOKIE['cart']),true);
    $id = $_POST['id'];
    if (array_key_exists($id,$cart)) {
      unset($cart[$id]);
      if (count($cart) == 0) {
        setcookie('cart',"",0,"/");
      } else {
        setcookie('cart',json_encode($cart),0,"/");
      }
    }
  }
  wp_die();
}
add_action('wp_ajax_remCart','remCart');
add_action('wp_ajax_nopriv_remCart','remCart');

function orderSubmit() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }
  parse_str($_POST['form'],$form);
  if (count($form) == 0) {
    error_log('Order Form parse error');
    wp_die('Form parse error');
  }
  $to = array('savinov@mediaceh.com','molefirenko@yandex.ru', get_theme_mod('email'));
  $subject = 'Новый заказ';
  $body = '<div>';
  $total_sum = 0;
  foreach ($form as $key=>$value) {
    if ($key == 'product') {
      foreach ($value as $val) {
        $body .= '<div>';
        $body .= '<p>Название: '.$val['name'].'</p>';
        $body .= '<p>Количество: '.$val['count'].'</p>';
        $body .= '<p>Всего: '.$val['total'].'</p>';
        $body .= '</div>';
        $total_sum = intval($val['total']);
      }
    } else {
        $body .= '<p>'.$key.': '.$value.'</p>';
    }
  }
  $body .= '</div>';
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $res = wp_mail($to, $subject, $body,$headers);
  if ($res) {?>
      <div class="modal-dialog">
        <div class="modal-content text-center">
          <h3 class="green"><?php echo $form['ФИО']; ?>, спасибо,<br> что выбрали наш магазин!</h3>
          <p>В ближайшее время мы свяжемся с Вами<br> по указанному телефону: <?php echo $form['Тел']; ?></p>
          <p>Заказ можно забрать в пункте выдачи по адресу:<br>г.<?php echo (isset($form['Город']))? $form['Город']:''; ?>, <?php echo (isset($form['Адрес']))? $form['Адрес']:''; ?></p>
          <div class="cena"><span>Итого:</span> <?php echo number_format($total_sum,0,'.',' '); ?>  руб.</div>
          <em class="green">Будем рады видеть Вас снова! </em>
       </div>
      </div>
  <?php } else {
    echo 'Err';
  }
  setcookie('cart',"",0,"/");
  $attr = array(
    'ID' => 0,
    'post_title' => 'Новый заказ',
    'post_content' => $body,
    'post_type' => 'orders',
    'post_status' => 'publish'
  );
  wp_insert_post($attr);
  wp_die();
}
add_action('wp_ajax_orderSubmit','orderSubmit');
add_action('wp_ajax_nopriv_orderSubmit','orderSubmit');

function sendCallForm() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }

  parse_str($_POST['form'],$form);

  if (count($form) == 0) {
    error_log('Call Form parse error');
    wp_die('Form parse error');
  }

  if (isset($form['g-recaptcha-response']) && $form['g-recaptcha-response'] != '') {
    // your secret key
    $secret = "6LfZQScUAAAAAGLix-1QjxVAnyTfhsVfTRzrTxye";
    // response
    $response = $form['g-recaptcha-response'];
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        // CURLOPT_USERAGENT => '',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            secret => $secret,
            response => $response
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    $captcha = json_decode($resp);
    if (!$captcha->success) {
      wp_die('Wrong captcha');
    }
  } else {
    wp_die('No captcha');
  }
  $to = array('savinov@mediaceh.com','molefirenko@yandex.ru',get_theme_mod('email'));
  $subject = 'Новый вопрос';
  $body = '<div>';
  foreach ($form as $key=>$value) {
    $body .= '<p>'.$key.': '.$value.'</p>';
  }
  $body .= '</div>';
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $res = wp_mail($to, $subject, $body,$headers);
  if ($res) {
    echo 'Ok';
  } else {
    echo 'Err';
  }
  wp_die();
}
add_action('wp_ajax_sendCallForm','sendCallForm');
add_action('wp_ajax_nopriv_sendCallForm','sendCallForm');

function sendCallBackForm() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }
  parse_str($_POST['form'],$form);
  if (count($form) == 0) {
    error_log('Callback Form parse error');
    wp_die('Form parse error');
  }

  if (isset($form['g-recaptcha-response']) && $form['g-recaptcha-response'] != '') {
    // your secret key
    $secret = "6LfZQScUAAAAAGLix-1QjxVAnyTfhsVfTRzrTxye";
    // response
    $response = $form['g-recaptcha-response'];
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        // CURLOPT_USERAGENT => '',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            secret => $secret,
            response => $response
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    $captcha = json_decode($resp);
    if (!$captcha->success) {
      wp_die('Wrong captcha');
    }
  } else {
    wp_die('No captcha');
  }

  $to = array('savinov@mediaceh.com','molefirenko@yandex.ru',get_theme_mod('email'));
  $subject = 'Заказ звонка';
  $body = '<div>';
  foreach ($form as $key=>$value) {
    $body .= '<p>'.$key.': '.$value.'</p>';
  }
  $body .= '</div>';
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $res = wp_mail($to, $subject, $body,$headers);
  if ($res) {
    echo 'Ok';
  } else {
    echo 'Err';
  }
  wp_die();
}
add_action('wp_ajax_sendCallBack','sendCallBackForm');
add_action('wp_ajax_nopriv_sendCallBack','sendCallBackForm');


function sendFeedback() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }
  parse_str($_POST['form'],$form);
  if (count($form) == 0) {
    error_log('Feedback Form parse error');
    wp_die('Form parse error');
  }

  if (isset($form['g-recaptcha-response']) && $form['g-recaptcha-response'] != '') {
    // your secret key
    $secret = "6LfZQScUAAAAAGLix-1QjxVAnyTfhsVfTRzrTxye";
    // response
    $response = $form['g-recaptcha-response'];
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        // CURLOPT_USERAGENT => '',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            secret => $secret,
            response => $response
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    $captcha = json_decode($resp);
    if (!$captcha->success) {
      wp_die('Wrong captcha');
    }
  } else {
    wp_die('No captcha');
  }

  $to = array('savinov@mediaceh.com','molefirenko@yandex.ru',get_theme_mod('email'));
  $subject = 'Новый отзыв';
  $body = '<div>';
  foreach ($form as $key=>$value) {
    $body .= '<p>'.$key.': '.$value.'</p>';
  }
  $body .= '</div>';
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $res = wp_mail($to, $subject, $body,$headers);
  if ($res) {
    echo 'Ok';
  } else {
    echo 'Err';
  }
  wp_die();
}
add_action('wp_ajax_sendFeedback','sendFeedback');
add_action('wp_ajax_nopriv_sendFeedback','sendFeedback');

function ChangeCity() {
  if( ! wp_verify_nonce( $_POST['nonce'], '3dwhite' ) ) {
    wp_die('Security error');
  }
  $id = intval($_POST['data']);
  $post = get_post($id);
  if ($post) {
    $city_data = array(
      'name' => $post->post_title,
      'id'   => $id
    );
    setcookie('city',json_encode($city_data),time()+3600,"/");
  }
  echo 'Ok';
  wp_die();
}
add_action('wp_ajax_ChangeCity','ChangeCity');
add_action('wp_ajax_nopriv_ChangeCity','ChangeCity');

?>
