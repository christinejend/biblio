<?php
namespace Model;

    // Model\Model => nom qualifié de la classe, c'est le Model qui est dans l'espace de noms Model
    class Model {
        protected $table = '';
        protected $cn = null;

        public function __construct() {
            $dbConfig = parse_ini_file( 'db.ini' );
            $PDOOptions = [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ];


            try {
                $dsn = sprintf( '%s:host=%s; dbname=%s', $dbConfig[ 'driver' ], $dbConfig[ 'host' ], $dbConfig[ 'dbname' ] );

                $this -> cn = new \PDO( $dsn, $dbConfig[ 'username' ], $dbConfig[ 'password' ], $PDOOptions );
                // on vient de créer une connexion à la base de données
                $this -> cn -> exec( 'SET CHARACTER SET UTF8' );
                $this -> cn -> exec( 'SET NAMES UTF8' );
                // on définit que le jeu de caractères utilisés pour les échanges entre la base de données et PDO est bien UTF8
            } catch( \PDOException $e ) { // on attrape l'exception dans une variable e qui contient l'erreur produite
                die( $e -> getMessage() ); // quand on a un objet, pour accéder à ses propriétés ou méthodes publiques, on utilise une ->
            }

        }


        public function all() {
            $sql = sprintf('SELECT * FROM ' . $this -> table); // on fait une requête
            // on stocke la requête dans une variable
            $pdoStmnt = $this -> cn -> query( $sql ); // on exécute la requête
            return $pdoStmnt -> fetchAll(); // crée un tableau d'objets avec ≠ infos
        }

        public function  find( $id ) {
            $sql = sprintf('SELECT * FROM ' .  $this -> table . ' WHERE id= :id');
            $stmnt = $this -> cn -> prepare( $sql );
            // Toutes les variables qui sont dans le scope global sont récupérables avec $GLOBALS qui est une sorte de super-variable
            $stmnt -> execute( [ ':id' => $id ] );
            return $stmnt -> fetch();
        }
         public function save($fields)//FOnction générique pour enregistrer dans la base de donnée, save juste les infos qui vont dans une table. La rends "public"
    {
        $sFieldsNames = implode('`, `', array_keys($fields));
        $sFieldsJokers = implode(', :', array_keys($fields));
        $sql = sprintf('INSERT INTO %s(`%s`) VALUES(:%s)',
            $this->table,
            $sFieldsNames,
            $sFieldsJokers);
        $pdoSt = $this->cn->prepare($sql);
        foreach (array_keys($fields) as $field) {
            $pdoSt->bindValue(':' . $field, $fields[$field]);
        }
        return $pdoSt->execute();
    }
    }