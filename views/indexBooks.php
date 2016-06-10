<link rel="stylesheet" href="styles.css" type="text/css">
<div class="content">
    <h1 role="heading" aria-level="1" class="content__title">Nos livres :</h1>
        <ul> 
            <?php foreach( $datas[ 'books' ] as $book ): ?>
                <li>
                    <a href="index.php?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<h1 role="heading" aria-level="1" class="content__title">