<ul id="menu-nav">
	<li id="nav-article"><a href="/#article1" class="external">Start</a></li>
	<li id="nav-author"><a href="/author/#author1" class="external">Autoren</a></li>
	<?php
	if (isset($_SESSION["id"])){
		?>
		<li id="nav-profile"><a href="/profile/#profile" class="external">Mein Profil</a></li>
		<li id="nav-createarticle"><a href="/article/#createarticle" class="external">Artikel schreiben</a></li>
		<?php
	} else {
		?>
		<li id="nav-login"><a href="/login/#login" class="external">Login</a></li>
		<li id="nav-register"><a href="/register/#register" class="external">Registrieren</a></li>
		<?php
	}
	?>
</ul>