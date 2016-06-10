<?php
    require 'vendor/autoload.php';
    include( 'routes.php' );
    session_start();

$default_route = $routes['default'];
$route_parts = explode('/', $default_route);

$method = $_SERVER['REQUEST_METHOD'];

/*
Pour exécuter des req sql avec php, différentes fonctions sont disponibles:
la classe PDO qui représente la connexion
PDOStatement pour les requêtes
*/


    $a = isset( $_REQUEST[ 'a' ] ) ? $_REQUEST[ 'a' ] : 'home'; // request = méta tableau qui regroupe get et post
    $e = isset( $_REQUEST[ 'e' ] ) ? $_REQUEST[ 'e' ] : 'page';
    
    // on teste si il y a un paramètre a ou un paramètre e dans l'url
    if( !in_array( $a .'_' . $e , $routes ) ) {
        die( 'Cette route n’est pas permise' );
    }

    $controller_name = '\Controller\\' . ucfirst( $e ) . 'Controller'; // ucfirst met en uppercase la premiere lettre
    $container = new \Illuminate\Container\Container();
    $controller = $container->make($controller_name);

    $datas = call_user_func( [ $controller, $a ] ); // on donne un contexte à $a pour qu'elle fonctionne


    include( 'views/view.php' );
