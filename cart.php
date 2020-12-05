<?php
    header('Content-Type: text/html; charset=utf-8');
    include("include/db_connect.php");
    mysql_set_charset('utf8');
    mb_internal_encoding("UTF-8");
    include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="js/shop-script.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="1c/test.json"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
	<title>Корзина Заказов</title>
</head>

<body>
<div id="block-body">

    <div class="scroll" id="text"> Изначальное содержимое </div>
    <a href="#" onclick="showMessage();"> Далее </a>
    
<form action="" method="POST">
 <input type="submit" onclick="showMessage();" name="username" value="Button">
</form>


<?php
	include("include/block-header.php");
?>

<div id="block-right">
<?php
	include("include/block-category.php");
    include("include/block-parameter.php");
    include("include/block-news.php");
    
   

?>


</div>
<div id="block-content">
<?php
	$action = clear_string($_GET["action"]);
    switch ($action){
        case 'oneclick':
        
    echo '
    <div id="block-step">
    <div id="name-step">
    <ul>
    <li><a class="activ">1. Корзина товаров</a></li>
    <li><span>&rarr;</span></li>
    <li><a>2. Контактная информация</a></li>
    <li><span>&rarr;</span></li>
    <li><a>3. Завершение</a></li>
    </ul>
    </div>
    
    <p>шаг 1 из 3</p>
    <a href="cart.php?action=clear">Очистить</a>
    
    </div>
    ';
    
    
    $all_price = 0;
    $result = mysql_query("SELECT * FROM cart, table_products WHERE table_products.products_id = cart.cart_id_products", $link);
    If (mysql_num_rows($result) > 0)
    {
    $row = mysql_fetch_array($result);
    
    echo '
    
    <div id="header-list-cart">
    <div id="head1">Изображение</div>
    <div id="head2">Наименование товара</div>
    <div id="head3">Кол-во</div>
    <div id="head4">Цена</div>
    </div>
    
    ';
    
    do{
        $int = $row["cart_price"] * $row["cart_count"];
        $all_price = $all_price + $int;
    
    if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
    {
        $img_path = './uploads_images/'.$row["image"];
          $max_width = 100;
          $max_height = 100;
          list($width, $height) = getimagesize($img_path);
          $ratioh = $max_height/$height;
          $ratiow = $max_width/$width;
          $ratio = min($ratioh,$ratiow);
          $width = intval($ratio*$width);
          $height = intval($ratio*$height);
          
          }else
          {
            $img_path = "/images/no-image.png";
            $width = 120;
            $height = 105;
          }
          echo'
     <div class="block-list-cart">
     
     <div class="img-cart">
     <p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
     </div>
     
     <div class="title-cart">
     <p><a href="">'.$row["title"].'</a></p>
     <p class="cart-mini_features">
     '.$row["mini_features"].'
     </p>
     </div>
     
     <div class="count-cart">
     <ul class="input-count-style">
     <li>
     <p align="center" class="count-minus">-</p>
     </li>
     <li>
     <p align="center"><input  class="count-input" maxlength="3" type="text" value="'.$row["cart_count"].'"/></p>
     </li>
     <li>
     <p align="center" class="count-plus">+</p>
     </li>
     </ul>
     </div>
     
     <div class="price-product"><h5><span class="span-count">'.$row["cart_count"].'</span> x <span>'.$row["cart_price"].'</span></h5><p>'.$int.'</p></div>
     <div class="delete-cart"><a href="cart.php?id='.$row["cart_id"].'&action=delete"><img src="images/bsk_item_del.png"</a></div>
     
     <div id="bottom-cart-line5"></div>     
     
     </div>

     '; 
    
      }while ($row = mysql_fetch_array($result));      
    
    echo '
    <h2 class="itog-price" align="right">Итого: <strong>'.$all_price.'</strong> руб</h2>
    <p align="right" class="button-next" ><a href="cart.php?action=confirm" > Далее </a></p>
    ';
    } else {
        echo '<h3 id ="clear-cart" align="center">Корзина пуста</h3>'; 
    }
 
        break;
        case 'confirm':
        
        echo '
    <div id="block-step">
    <div id="name-step">
    <ul>
    <li><a>1. Корзина товаров</a></li>
    <li><span>&rarr;</span></li>
    <li><a class="activ">2. Контактная информация</a></li>
    <li><span>&rarr;</span></li>
    <li><a>3. Завершение</a></li>
    </ul>
    </div>
    
    <p>шаг 1 из 3</p>
    <a href="cart.php?action=clear">Очистить</a>
    
    </div>
    ';
        
        break;
        case 'completion':
        
        echo '
    <div id="block-step">
    <div id="name-step">
    <ul>
    <li><a>1. Корзина товаров</a></li>
    <li><span>&rarr;</span></li>
    <li><a>2. Контактная информация</a></li>
    <li><span>&rarr;</span></li>
    <li><a class="activ">3. Завершение</a></li>
    </ul>
    </div>
    
    <p>шаг 1 из 3</p>
    <a href="cart.php?action=clear">Очистить</a>
    
    </div>
    ';
        
        break;
        default:
        break;
    }
?>
</div>

<?php
	include("include/block-footer.php");
?>
</div>  



</body>
</html>