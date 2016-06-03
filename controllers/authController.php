<?php 
namespace Controller;

use Model\User;

class AuthController{

		private $user_model = null;

		public function __construct(User $user)
		{
			$this->user_model = $user;

		}

		public function getLogin()
		{
			return  ['view'=>'login.php', 'resource_title'=>'User login'];
		}

		public function getRegister()
		{
			return  ['view'=>'register.php', 'resource_title'=>'Register new user'];
		}

		/* */
		  public function postLogin()
    {   
        if ($user = $this->user_model->check([ //renvoi un utilisateur ou pas val1 = (dans) la val2
            'email' => $_POST['email'],
            'password' => sha1($_POST['password'])
        ])
        ) { //SI on a un user, on peut le mémoriser dans la var session, le user qui esy fournit est un objet, on l'encodera dans la session en json pour produire une chaine, bcp plus simple. 
            $_SESSION['user'] = json_encode($user);
            header('Location: ?a=admin&e=page');//Mnt que l'user est enregistrer, on le redirige vers la page admin, requete http vers la route admin
        }else {

            $_SESSION['old_datas'] = $_POST;
            $_SESSION['error'] = 'Wrong credentials';

            return ['view' => 'login.php', 'resource_title' => 'Please Login'];
        }
    }

    public function getLogout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        header('Location: index.php');
    }

    public function postRegister()
    {
        $errors = [];// tab d'erreur a tester dans le formulaire, affichera dans la vue si il y a du contenu

        //Il faudrait aussi tester les qualités des entrées et pas seulement leur présence
        if (empty($_POST['email'])) {//Si pas défini, on aliment le tableau des erreurs que l'on veut afficher
            $errors['email'] = 'Veuillez entrer un email';
        }elseif (strpos($_POST['email'], "@", 1) === false ){
            $errors['email'] = 'Entrer un email valide';
        }

        if (empty($_POST['password'])) {//Verifie si le champs pseudo est bien rempli
            $errors['password'] = 'Veuillez entrer un mot de passe';
        }
        if (empty($_POST['name'])) {//Verifie si le champs name est bien rempli
            $errors['name'] = 'Veuillez entrer un petit name';
        }
        echo count($errors);  //SI le compte est a 0 pas de soucis sinon on rentre ds le if
        if (count($errors)) {
            $_SESSION['errors'] = $errors; // SI on veut avoir nos donnée a la requete suivante on stocke les infos dans la session
            $_SESSION['old_datas'] = $_POST;//Re remplit le formulaire de l'utili avec ces infos car on a refait une requete http, 
            header('Location: index.php?e=auth&a=getRegister'); //Si il y a des erreurs on redirige vers getRegister.
            return;
        }

        if ($this->user_model->save([
            'password' => sha1($_POST['password']), // password_hash= algorythme - Sécurise 
            'email' => $_POST['email'],
            'name'=>$_POST['name']
        ])
        ) {
            return ['view' => 'login.php', 'resource_title' => 'Please login']; // renvoi à la page login après un enregistrement
        } else {
            $_SESSION['errors'] = ['error' => 'Impossible to write in the database'];
            $_SESSION['old_datas'] = $_POST;
            header('Location: index.php?e=auth&a=getRegister');
        }
    }



}