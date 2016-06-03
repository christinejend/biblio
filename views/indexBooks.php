<link rel="stylesheet" href="styles.css" type="text/css">
<div class="intro">
			<img src="biblio.jpg" class="intro__img">
			<p class="intro__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam maxime molestiae in dignissimos dolorem. Nesciunt vero distinctio optio, vitae saepe dignissimos nulla soluta provident. Sunt nobis odio, pariatur voluptates fuga.
			</p>
		</div>
    <ul> 
        <?php foreach( $datas[ 'books' ] as $book ): ?>
            <li>
                <a href="index.php?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
