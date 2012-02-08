<?php
include __DIR__ . '/../lib/bootstrap.php';
$title = 'Le deal à 40 sous';

$deal = R::findOne('deals', '1 ORDER BY id DESC');
$orders = R::find('orders', 'deal_id = :deal_id', array('deal_id' => $deal->id));
$sold = 0;
foreach ($orders as $order) {
	$sold += $order->quantity;
}
$stock = 100 * (1 - $sold / $deal->stock);
?>
<!DOCTYPE html>
<html lang=en>
<head>
	<meta charset=utf-8>
	<title><?php echo $deal->title ?> - <?php echo $title ?></title>
	<link rel=stylesheet href=assets/styles.css type="text/css">
</head>
<body>
<div id=doc>
	<h1><a href="/"><?php echo $title ?></a></h1>
	<div id=product>
		<h2><?php echo $deal->title ?></h2>
		<p class=picture>
			<img src="http://static.qoqa.com/products/p/zicplay.jpg" alt="Zip Play!">
		</p>
		<div id=product-info>
			<p class=price>
				Prix : <strong><?php echo money_format('%!n', $deal->price / 100) ?></strong><br>
				frais de port offerts<br>
				prix en CHF
			</p>
			<ul class=spec>
<?php
$specs = explode('|', $deal->spec);
foreach($specs as $spec):
?>
				<li><?php echo $spec ?></li>
<?php
endforeach;
?>
			</ul>
			<p class=stock>
				<strong><?php printf('%.0f', $stock) ?>%</strong> du stock disponible.
			</p>
		</div>
<?php if(true): ?>
		<form method=POST>
			<p>
				<label>E-mail :
					<input type=email name=email required>
				</label>
			</p>
			<p>
				<label>Quantité :
					<select name=quantity>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
				</label>
			</p>
			<p>
				<input type=submit value="J'achète!">
			</p>
		</form>
<?php elseif($todo): ?>
		<p class="msg thanks">
			Merci de votre commande!
		</p>
<?php elseif($stock <= 0): ?>
		<p class="msg soldout">
			Stock épuisé!
		</p>
<?php else: ?>
		<p class="msg ordered">
			Vous avez déjà commandé cet article.
		</p>
<?php endif ?>
	</div>
	<div id=product-desc>
<?php echo $deal->desc ?>
	</div>
</div>
<footer>2012 © QoQa Services SA</footer>
</body>
</html>