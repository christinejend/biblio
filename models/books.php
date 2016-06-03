<?php
    namespace Model;

    // Model\Books

    class Books extends Model {

        protected $table = 'books';

        public function getBooksByAuthorId( $id ) {
            $sql = 'SELECT books.*
                    FROM books
                    JOIN author_book
                    ON books.id = author_book.book_id
                    JOIN authors
                    ON authors.id = author_book.author_id
                    WHERE authors.id = :id';

            $pdoSt = $this -> cn -> prepare( $sql );
            $pdoSt -> execute( [ ':id' => $id ] );
            return $pdoSt -> fetchAll();
        }

        public function getBooksByEditorId( $id ) {
            $sql = 'SELECT books.*
                    FROM books
                    JOIN editors ON editors.id = books.editor_id
                    WHERE editors.id = :id';

            $pdoSt = $this->cn->prepare( $sql );
            $pdoSt->execute( [ ':id' => $id ] );
            return $pdoSt->fetchAll();
        }
        public function getLastBooks(){
            $sql = 'SELECT DISTINCT books.title, authors.name, books.cover as cover, books.summary, books.id as books_id, authors.id as authors_id FROM books JOIN author_book ON books.id = author_book.book_id JOIN authors ON author_book.author_id = authors.id ORDER BY books_id DESC LIMIT 3';

                     $pdoSt = $this->cn->prepare( $sql );
                    $pdoSt->execute();
                    return $pdoSt->fetchAll();

        }
    }
