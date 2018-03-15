<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/php/header.php");
include($_SERVER['DOCUMENT_ROOT']."/_include/html/header.html");
include($_SERVER['DOCUMENT_ROOT']."/_include/php/config.php");

if (isset($_REQUEST["abmelden"]) and $_REQUEST["abmelden"]){
	unset($_SESSION["user"]);
	unset($_SESSION["id"]);
	setcookie("user", "", time() - 3600, "/");
	setcookie("id", "", time() - 3600, "/");
}

$result = true;
if (isset($_REQUEST["user"]) and isset($_REQUEST["email"]) and isset($_REQUEST["pass"]) and isset($_REQUEST["passw"])) {
	$user = $_REQUEST["user"];
	$email = $_REQUEST["email"];
	$pass = $_REQUEST["pass"];
	$passw = $_REQUEST["passw"];
	
	$stmt = $dbh->prepare("SELECT * FROM `autor` WHERE `nutzername`=:nutzername");
	$stmt->bindParam(':nutzername', $user);
	$stmt->execute();
	$result = !($row = $stmt->fetch());
	if ($pass == $passw and $result){
		$hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]);
		
		$stmt = $dbh->prepare("INSERT INTO `uni`.`autor` (`nutzername`, `email`, `passwort`) VALUES (:nutzername, :email, :passwort);");
		$stmt->bindParam(':nutzername', $user);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':passwort', $hash);
		$stmt->execute();
		
		?>
		<script>
			window.location.href = "/login/#login"
		</script>
		<?php
	}	
}
?>
<body>
<?php
if (isset($_SESSION["user"]) and isset($_SESSION["id"])){
	?>
	<script>
		window.location.href = "/profile/#profile"
	</script>
	<?php
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
					$("#nav-register").attr('class', 'current');
				} else {
					$(window.location.hash.replace("#","#nav-")).attr('class', 'current');
				}
				$('#nav-register').html('<a href="#register">Registrieren</a>');
			</script>
        </nav>
        
    </div>
</header>

<div id="register" class="page">
	<div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="title-page">
					<h2 class="title">Registrieren</h2>
				</div>
				<?php
					if (!$result){
						?>
						<div class="alert alert-error fade in">
							<a class="close" data-dismiss="alert" href="#">×</a>
							Der Benutzername existiert schon!
						</div>
						<?php
					}
				?>
				<form id="register-form" class="form" action="./#register" method="post">
					<p>
						<input type="text" placeholder="Benutzername" value="" name="user" />
					</p>
					<p>
						<input type="text" placeholder="E-Mail" value="" name="email" />
					</p>
					<p>
						<input id="pass" type="password" placeholder="Passwort" value="" name="pass" />
					</p>
					<p>
						<input id="passw" type="password" placeholder="Passwort" value="" name="passw" />
					</p>
					<input type="submit" style="position: absolute; left: -9999px"/>
					<p>
						<a class="submit" href="javascript:void(0)" onclick="check()">Registrieren</a>
					</p>
					<script>
						function check(){
							if ($("#pass").val() == $("#passw").val()){
								$('#register-form').submit();
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


<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/html/credits.html");
?>

<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>

</body>
</html>