<div id="block-parameter">
<p class="header-title">Поиск по параметрам</p>
<p class="title-filter">Стоимость</p>
<form method="GET" action="search-filter.php">

<div id="block-input-price">

<ul>
<li><p>от</p></li>
<li><input type="text" id="start-price" name="start_price" value="1000"/></li>
<li><p>до</p></li>
<li><input type="text" id="end-price" name="end_price" value="30000"/></li>
<li><p>руб</p></li>
</ul>

</div>

<div id="blocktrackbar"></div>

<p class="title-filter">Автомобили</p>

<ul class="checkbox-brand">
<li><input type="checkbox" id="checkbrand1"/><label for="checkbrand1">МАЗ</label></li>
<li><input type="checkbox" id="checkbrand2"/><label for="checkbrand2">Howo</label></li>
<li><input type="checkbox" id="checkbrand3"/><label for="checkbrand3">Faw</label></li>

</ul>

<center><input type="submit" name="submit" id="button-param-search" value="Найти"/></center>
</form>

</div>