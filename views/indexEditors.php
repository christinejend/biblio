<link rel="stylesheet" href="styles.css" type="text/css">
<div class="content">
<h1 role="heading" aria-level="1" class="content__title">Nos éditeurs :</h1>
	<ul>
	    <?php foreach( $datas[ 'editors' ] as $editor ): ?>
	        <li>
	            <a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=books,authors"><?php echo $editor -> name; ?></a>
	        </li>
	    <?php endforeach; ?>
	</ul>
</div>
