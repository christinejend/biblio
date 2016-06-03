<link rel="stylesheet" href="styles.css" type="text/css">
<div class="nav">
	<nav>
	    <h2 role="heading" aria-level="2" class="hidden">Navigation principale</h2>
		
		<li class="nav__elt">
			<a href="index.php?a=home&e=page" title="">Accueil</a>
		</li>
		<li class="nav__elt">
			<a href="" title="">Mon espace</a>
		</li>
		<input type="checkbox" id="toogle-nav" title="nav" checked>
    	<label for="toogle-nav" class="nav__burger">Menu</label>
		<ul class="nav__list nav__index">
			<li class="nav__elt">
			    <a href="index.php?a=index&e=books">Les livres</a>
			</li>
			<li class="nav__elt">
				<a href="index.php?a=index&e=authors">Les auteurs</a>
			</li>
			<li class="nav__elt">
			    <a href="index.php?a=index&e=editors">Les éditeurs</a>
			</li>
		</ul>
	</nav>
</div> <!-- PHP -->
<div class="searchbar">
			<form class="search__form" action="">
				<input class="champ" type="text" placeholder="Que recherchez-vous?">
				<input class="bouton" type="button" value="Rechercher">
			</form>
		</div>