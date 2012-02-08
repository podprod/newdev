<?php

$deal = R::dispense('deals');

$deal->title = 'Zip Play!';
$deal->price = 8900;
$deal->stock = 10;
$deal->spec = 'Mémoire de 1GB|Stockage de fichiers|Lecture MP3, WMA|Poids plume de 25g';
$deal->desc = <<<EOS
		<h2>Lecteur MP3 Zic Play qui peut aussi être une clé USB !</h2>
		<p>
			Le temps des cassettes est révolu... (les cd aussi) place aux MP3
			téléchargés légalement (bien sûr) ou mieux encore, extraits de vos
			propres cd.
		</p>
		<p>
			Bref écouter votre musique au format Mp3 ou WMA, est un jeu
			d'enfant avec ce petit lecteur qui vous permettra aussi de
			fonctionner comme simple clef usb pour le transport de vos données
			informatiques (oui c'est important de préciser informatique... on
			sait jamais au cas où quelqun souhaiterait mettre un classeur dans
			la clef)... et bien nous vous proposons une clef USB lecteur MP3,
			WMA, cassette, vinyl, machine à café... ah non je m'emballe...
		</p>
		<h3>Données techniques de la bête</h3>
		<ul>
			<li>Mémoire 1GB</li>
			<li>Dimensions 78 x 28 x 19 mm</li>
			<li>Ecran LCD retro-éclairé avec diverses couleurs à choix</li>
			<li>Lecture Mp3 et WMA</li>
			<li>Fonction Voice recording (dictaphone)</li>
			<li>Poids de 25g</li>
		</ul>
		<p>Bon download et bonne écoute</p>
		<p><em>Dr 2balles!</em></p>
EOS;
$id = R::store($deal);

$order = R::dispense('orders');
$order->deal_id = $id;
$order->email = 'yoan.blanc@qoqa.com';
$order->quantity = 3;
R::store($order);

$order = R::dispense('orders');
$order->deal_id = $id;
$order->email = 'mrqoqa@qoqa.com';
$order->quantity = 1;
R::store($order);
