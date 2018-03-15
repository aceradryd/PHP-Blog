<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/php/header.php");
include($_SERVER['DOCUMENT_ROOT']."/_include/html/header.html");
include($_SERVER['DOCUMENT_ROOT']."/_include/php/config.php");

if (isset($_REQUEST["nutzername"]) and isset($_REQUEST["email"])) {
	$nutzername = $_REQUEST["nutzername"];
	$email = $_REQUEST["email"];
	
	$stmt = $dbh->prepare("UPDATE `uni`.`autor` SET `nutzername`=:nutzername, `email`=:email WHERE `id`=:id;");
	$stmt->bindParam(':nutzername', $nutzername);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':id', $_SESSION["id"]);
	$stmt->execute();
}


if (isset($_REQUEST["pass"]) and $_REQUEST["pass"]!="") {
	$pass = $_REQUEST["pass"];
	if ($pass == $_REQUEST["passw"]){
			$hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]);
			
			$stmt = $dbh->prepare("UPDATE `uni`.`autor` SET `passwort`=:passwort WHERE `id`=:id;");
			$stmt->bindParam(':passwort', $hash);
			$stmt->bindParam(':id', $_SESSION["id"]);
			$stmt->execute();
	}
}

if (isset($_REQUEST["textid"])){
	$stmt = $dbh->prepare("DELETE FROM `uni`.`artikel` WHERE `id`=:id AND autor_id=:autor_id;");
	$stmt->bindParam(':id', $_REQUEST["textid"]);
	$stmt->bindParam(':autor_id', $_SESSION["id"]);
	$stmt->execute();
}
?>
<body>
<?php
if (!isset($_SESSION["user"]) or !isset($_SESSION["id"])){
	?>
	<script>
		window.location.href = "/login/#login"
	</script>
	<?php
	die();
}
?>
<div id="home-slider">	
    <div class="slider-text">
    	<div id="slidecaption"><div class="slide-content">Unser kleiner Blog</div></div>
    </div>   
	
	<div class="control-nav">
        <a id="nextsection" href="#article1"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div>

<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	Unser kleiner Blog
        </div>
        
        <nav id="menu">
        	<?php
				include($_SERVER['DOCUMENT_ROOT']."/_include/php/navbar.php");
			?>
			<script>
				if (window.location.hash == "" || $(window.location.hash.replace("#","#nav-")).length == 0){
					$("#nav-profile").attr('class', 'current');
				} else {
					$(window.location.hash.replace("#","#nav-")).attr('class', 'current');
				}
				$('#nav-profile').html('<a href="#profile">Mein Profil</a>');
			</script>
        </nav>
        
    </div>
</header>

<div id="profile" class="page">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-page">
                    <h2 class="title">Mein Profil</h2>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<form id="profile_form" class="form" action="./#profile" method="post">
					<?php
					$stmt = $dbh->prepare("SELECT * FROM uni.autor WHERE id=:id;");
					$stmt->bindParam(':id', $_SESSION["id"]);
					$stmt->execute();
					$userdata = $stmt->fetch();
					?>
					<div id="warning"></div>
					<p>
						<input type="text" placeholder="Benutzername" value="<?php echo $userdata["nutzername"]?>" name="nutzername" />
					</p>
					<p>
						<input type="text" placeholder="E-Mail" value="<?php echo $userdata["email"]?>" name="email" />
					</p>
					<p>
						<input id="login_pass" type="password" placeholder="Passwort" value="" name="pass"/>
					</p>
					<p>
						<input id="login_passw" type="password" placeholder="Passwort wiederholen" value="" name="passw"/>
					</p>
					<input type="submit" style="position: absolute; left: -9999px"/>
					<div class="row">
						<div class="col-md-2">
							<p class="login-submit">
								<a id="login-submit" class="submit" href="javascript:void(0)" onclick="check()">Absenden</a>
							</p>
						</div>
						<div class="col-md-2">
							<p class="login-submit">
								<a id="login-submit" class="submit" href="/login/?abmelden=true#login">Abmelden</a>
							</p>
						</div>
					</div>
					<script>
						function check(){
							if ($("#login_pass").val() == $("#login_passw").val()){
								$('#profile_form').submit();
							} else {
								$("#warning").html('<div class="alert alert-error fade in"><a class="close" data-dismiss="alert" href="#">×</a>Passwörter sind nicht gleich.</div>');
							}
						}
					</script>
				</form>
			</div>
		</div>
    </div>
</div>

<div id="ownArticle" class="page">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-page">
                    <h2 class="title">Eigene Beiträge</h2>
                </div>
            </div>
        </div>
		<?php
		$stmt = $dbh->prepare("SELECT * FROM uni.artikel WHERE autor_id=:id ORDER BY date DESC;");
		$stmt->bindParam(':id', $_SESSION["id"]);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		foreach ($result as $row){
			?>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="title-page">
								<h2 class="title"><?php echo $row["titel"]?></h2>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">	
							<p>
							<?php echo $row["inhalt"]?>
							</p>
						</div>
					</div>
					<p class="login-submit">
						<a id="login-submit" class="submit" href="./?textid=<?php echo $row["id"]?>#profile">Löschen</a>
					</p>
				</div>
			</div>
		<?php 
		}
		?>
    </div>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/html/credits.html");
?>

<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>

</body>
</html>