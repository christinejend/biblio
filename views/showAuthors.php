<link rel="stylesheet" href="styles.css" type="text/css">
<h1><?php echo $datas[ 'author' ] -> name; ?></h1>

<div class="logo">
    <img src="<?php echo $datas[ 'author' ] -> logo ; ?>" alt="" />
</div>
<?php if( $datas[ 'author' ] -> bio ): ?>
    <div class="summary">
        <?php echo $datas[ 'author' ] -> bio; ?>
    </div>
<?php endif; ?>

<h2>Livres publiés par cet auteur</h2>
<?php if( $datas[ 'books' ] ): ?>
    <ul class="books">
        <?php foreach( $datas[ 'books' ] as $book ): ?>
            <li class="book">
                <a href="?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors">
                    <?php echo $book -> title; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<h2>Éditeurs ayant publié cet auteur</h2>

<?php if( $datas[ 'editors' ] ): ?>
    <ul class="editors">
        <?php foreach( $datas[ 'editors' ] as $editor ): ?>
            <li class="editor">
                <a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=books">
                    <?php echo $editor -> name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div>
    <a href="index.php?a=index&e=authors">Tous les auteurs</a>
</div>
