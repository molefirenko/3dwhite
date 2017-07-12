<?php /* Template Name: Cart */ ?>
<?php global $city_data; ?>
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
 <section id="section-home-15" class="section-home">
   <div class="container">
     <div class="row">
       <h2>Оформить заказ</h2>
       <div class="col-md-12">
         <?php
         $products = array();
         if ( isset($_COOKIE['cart']) ) {
           global $post;
           $cart = json_decode(stripslashes($_COOKIE['cart']),true);
           foreach ($cart as $key=>$value) {
             $post = get_post($key);
             setup_postdata($post);
             $products[] = array(
               'name' => get_the_title(),
               'count'=> $value,
               'total'=> intval(get_field('product_price'))*$value
             );
          ?>

             <div class="block-order">
               <div class="row">
                 <div class="col-md-2 table-col">
                   <img src="<?php the_field('product_img'); ?>" alt="" class="img-responsive pull-right">
                 </div>
                 <div class="col-md-3 table-col">
                   <h3><?php the_title(); ?></h3>
                 </div>
                 <div class="col-md-3 table-col text-center">
                   <p>Количество товара:</p>
                   <form role="form">
                     <a href="#" class="minus" onclick="cartsub('<?php the_ID(); ?>')">-</a>
                     <input type="text" id="col" value="<?php echo $value; ?>">
                     <a href="#" class="pluse" onclick="cartadd('<?php the_ID(); ?>');">+</a>
                   </form>
                 </div>
                 <div class="col-md-1 table-col text-center back">
                   <a href="#" class="cross" onclick="cartrem('<?php the_ID(); ?>');">x</a>
                 </div>
                 <div class="col-md-3 col-sm-4 table-col">
                   <?php $price = intval(get_field('product_price'))*$value; ?>
                   <div class="cena"><?php echo number_format($price,0,'.',' '); ?> <span>руб.</span></div>
                 </div>
               </div>
             </div>

        <?php wp_reset_postdata();
            }
          }
         ?>

       </div>
     </div>
   </div>
 </section>

   <section class="section-home" id="section-home-16">
     <div class="container">
      <form role="form" id="order-form">
         <div class="row">
           <div class="col-md-4 col-sm-12">
             <div class="one">
               <h5>Выберете способ доставки:</h5>
                 <div class="row">
                   <div class="col-md-5 col-sm-5 act">
                    <div>

                        <input type="radio" class="radio" name="Доставка" id="optionsRadios1" value="самовывоз" checked>
                       <label for="optionsRadios1">Самовывоз</label>
                    </div>
                    <div>

                        <input class="radio" type="radio" name="Доставка" id="optionsRadios2" value="доставка на дом">
                        <label for="optionsRadios2">Доставка <br>на дом</label>
                    </div>
                   </div>
                   <div class="col-md-7 col-sm-7 text-right vis">
                     <?php $city = get_post($city_data['id']); ?>
                     <?php if ($city): ?>
                     <p>Адрес: <?php echo ($city_data['id'] == 6)? 'Не выбран': $city_data['name']; ?></p>
                     <a href="#" data-toggle="modal" data-target="#modal-1">изменить</a>
                      <div class="m-20">
                          <input type="hidden" name="Город" value="<?php echo $city_data['name']; ?>">
                          <input type="checkbox" name="Адрес" class="radio" name="optionsRadios" id="options" value="<?php the_field('city_location',$city->ID); ?>" checked>
                          <label for="options"><?php the_field('city_location',$city->ID); ?> </label>
                      </div>
                      <?php endif; ?>
                   </div>
                 </div>
               </div>
           </div>
           <div class="col-md-4 col-sm-6 form-l">
             <div class="form-group"><label for="fio">Имя и Фамилия</label><input type="text" name="ФИО" id="fio" class="form-control" required="required"></div>
             <div class="form-group"><label for="tel">Номер телефона</label><input id="tel" type="tel" name="Тел" class="form-control" required="required"></div>
           </div>
           <div class="col-md-4 col-sm-6 form-l">
             <div class="form-group dil hidden"><label for="add">Адрес доставки</label><input id="add" type="text" name="Доставка" class="form-control"></div>
             <div class="form-group">
                <label for="textarea">Ваше сообщение</label>
                <textarea name="Сообщение" id="textarea" cols="30" rows="10" class="form-control"></textarea>
             </div>
           </div>
           <?php if (count($products) > 0): ?>
             <?php $i=0; ?>
             <?php foreach ($products as $product): ?>
               <input type="hidden" name="product[<?php echo $i; ?>][name]" value="<?php echo $product['name']; ?>">
               <input type="hidden" name="product[<?php echo $i; ?>][count]" value="<?php echo $product['count']; ?>">
               <input type="hidden" name="product[<?php echo $i; ?>][total]" value="<?php echo $product['total']; ?>">
             <?php $i++; endforeach; ?>
           <?php endif; ?>

           <div class="col-md-4 col-sm-6 form-l btn-f">
             <div class="form-group"><button class="btn-pink btn">Купить</button></div>
           </div>
         </div>
      </form>
     </div>
   </section>
</main>

<?php get_footer(); ?>
