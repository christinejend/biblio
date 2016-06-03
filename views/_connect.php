<h1>Login </h1>

<?php if (!isset($_SESSION['user'])): ?> <!-- Vérifie si il y a un user connecter -->

    <div>
    <a href="?a=getLogin&e=auth">s’identifier</a> - <a href="?a=getRegister&e=auth">s’enregistrer</a>
    </div>

<?php else: ?>
    <?php $user = json_decode($_SESSION['user']); //DOnne acces au nom user?> 

    <div>
    	<a href="#">connecté en tant que <?php echo $user->email; ?></a> - <a href="?a=getLogout&e=auth">se déconnecter</a>
    </div> 

    <a href="?a=admin&e=page">Aller à l’admin</a>

<?php endif; ?>
