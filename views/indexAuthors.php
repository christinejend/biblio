<link rel="stylesheet" href="styles.css" type="text/css">
<ul>

    <?php foreach ( $datas[ 'authors' ] as $author ): ?>
    <li>
        <a href="index.php?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?> </a>
    </li>
<?php endforeach; ?>
</ul>
