<?php
    namespace Controller;

    use Model\Books;
    use Model\Authors;
    use Model\Editors;

    class PageController {
        private $books_model = null;

        public function __construct() {
            $this->books_model = new Books();
            $this->authors_model = new Authors();
            $this->editors_model = new Editors();

        }
        //fct qui s'exécute quand on fait le new pour créer une instance
        //créer une instance du controleur => quand on fait new

        public function index() {
            $books = $this->books_model->all();
         /*   $view = 'indexBooks.php';*/

            return ['books' => $books, 'view' => $view, 'page_title' => 'Home - Biblio'];
        }

        public function show() {
          
            $book = $this->books_model->find($id);
            $author = $this->authors_model->find($id);
            $editor = $this->editors_model->find($id);



            return ['book' => $book,
                    'view' => 'showBooks.php',
                    'page_title' => 'ebooks - '.$book->title,
                    'authors' => $authors,
                    'editors' => $editors,
                    
                ];
        }
        public function home(){
            
            $lastBooks = $this->books_model->getLastBooks();
            /*$authors = $this->authors_model->find($id);
            $editors = $this->editors_model->find($id);*/


            return ['view'=>'home.php',
                    'page_title' => 'ebooks - ',
                    'book'=>$lastBooks,
                    ];
        }
        public function admin(){

        if (!isset($_SESSION['user'])){ //Vérifie si une var session user est non définie, on envoit vers la page home
            header('Location: ?a=home&e=page');
        }


        return ['view'=>'admin.php',
                    'resource_title'=> 'Accueil - Admin',
                    'authors' => $authors,
                    'editors' => $editors,
         ];
    }

    }
