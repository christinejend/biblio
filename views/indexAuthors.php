<link rel="stylesheet" href="styles.css" type="text/css">
<div class="content">
<h1 role="heading" aria-level="1" class="content__title">Nos auteurs :</h1>
	<ul>
	    <?php foreach ( $datas[ 'authors' ] as $author ): ?>
	    <li>
	        <a href="index.php?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?> </a>
	    </li>
	<?php endforeach; ?>
	</ul>
