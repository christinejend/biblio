<!-- Main view -->

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title><?php echo $datas[ 'page_title' ]; ?> </title>
        </head>
        <body>
            <header>
                <?php include( 'partials/_main_navigation.php' ) ?>
                <?php include('_connect.php'); ?>
            </header>
            <main>
                <?php include( $datas[ 'view' ] ); ?>
                <!--  la valeur dans l'include est la valeur qui sera dans la sous vue qu'on charge -->
            </main>
        </body>
    </html>
