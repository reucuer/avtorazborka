<?php
    header('Content-Type: text/html; charset=utf-8');
    include("include/db_connect.php");
    mysql_set_charset('utf8');
    mb_internal_encoding("UTF-8");
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
	<title>ИП Пирумян - Услуги самосвалов в городе Иркутске</title>
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
<div id="block-sorting">
<p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Вся техника</span></p>
<ul id="options-list">
<li>Вид: </li>
<li><img id="style-grid" src="images/icon-grid.png"/></li>
<li><img id="style-list" src="images/icon-list.png"/></li>
<li>Сортировать:</li>
<li><a id="select-sort">Без сортировки</a>
<ul id="sorting-list">
<li><a href="">От дешевых к дорогим</a></li>
<li><a href="">От дорогих к дешевым</a></li>
<li><a href="">Популярное</a></li>
<li><a href="">Новинки</a></li>
<li><a href="">От А до Я</a></li>
</ul>
</li>
</ul>
</div>

<ul id="block-tovar-grid">
<?php

$res = file_get_contents('1c/test.json');
$data = json_decode($res, true);


	$result = mysql_query("SELECT * FROM table_products WHERE visible='1'",$link);
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
do
        {
        
          
          if ($row["image"] != "" && file_exists("./1c/".$row["image"]))
          {
          $img_path = './1c/'.$row["image"];
          $max_width = 200;
          $max_height = 200;
          list($width, $height) = getimagesize($img_path);
          $ratioh = $max_height/$height;
          $ratiow = $max_width/$width;
          $ratio = min($ratioh,$ratiow);
          $width = intval($ratio*$width);
          $height = intval($ratio*$height);
          
          }else
          {
            $img_path = "/images/no-image.png";
            $width = 110;
            $height = 200;
          }
          
          
          
          echo '
          
          <li>
          <div class="block-images-grid">
          <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
          </div>
          <p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
          <ul class="reviews-and-counts-grid">
          <li><img src="images/visibility.png"/><p>0</p></li>
          <li><img src="images/comment.png"/><p>0</p></li>
          
          </ul>
          
          <a class="add-cart-style-grid"></a>
          <p class="style-price-grid"><strong>'.$row["price"].'</strong> рублей</p>
          
          <div class="mini-features">
          '.$row["mini_features"].'
          </div>    
          </li>
          
          ';
          
            

        }while($row = mysql_fetch_array($result));
    }
?>
</ul>

<ul id="block-tovar-list">
<?php
	$result = mysql_query("SELECT * FROM table_products WHERE visible='1'",$link);
    if (mysql_num_rows($result) > 0)
    {
        $row = mysql_fetch_array($result);
        
       do
        {
          
          if ($row["image"] != "" && file_exists("./1c/".$row["image"]))
          {
          $img_path = './1c/'.$row["image"];
          $max_width = 150;
          $max_height = 150;
          list($width, $height) = getimagesize($img_path);
          $ratioh = $max_height/$height;
          $ratiow = $max_width/$width;
          $ratio = min($ratioh,$ratiow);
          $width = intval($ratio*$width);
          $height = intval($ratio*$height);
          
          }else
          {
            $img_path = "/images/no-image.png";
            $width = 110;
            $height = 200;
          }
          
          
          
          echo '
          
          <li>
          <div class="block-images-list">
          <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
          </div>
          
          <ul class="reviews-and-counts-list">
          <li><img src="images/visibility.png"/><p>0</p></li>
          <li><img src="images/comment.png"/><p>0</p></li>
          
          </ul>
          <p class="style-title-list"><a href="">'.$row["title"].'</a></p>
          <a class="add-cart-style-list"></a>
          <p class="style-price-list"><strong>'.$row["price"].'</strong> рублей</p>
          
          <div class="style-text-list">
          '.$row["mini_description"].'
          </div>
          </li>
          
          ';
          
            
        }while($row = mysql_fetch_array($result));

    }
?>
</ul>



</div>

<?php
	include("include/block-footer.php");
?>
</div>  



</body>
</html>