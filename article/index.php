<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/php/header.php");
include($_SERVER['DOCUMENT_ROOT']."/_include/html/header.html");
?>
<body>
<?php
if (isset($_REQUEST["titel"]) and isset($_REQUEST["text"])) {
	$titel = $_REQUEST["titel"];
	$text = str_replace("\n","<br>",strip_tags($_REQUEST["text"]));
	
	include($_SERVER['DOCUMENT_ROOT']."/_include/php/config.php");
	
	$stmt = $dbh->prepare("INSERT INTO `uni`.`artikel` (`titel`, `inhalt`, `date`, `autor_id`) VALUES (:titel, :inhalt, NOW(), :autor)");
	$stmt->bindParam(':titel', $titel);
	$stmt->bindParam(':inhalt', $text);
	$stmt->bindParam(':autor', $_SESSION["id"]);
	$stmt->execute();
	
	?>
	<script>
		window.location.href = "/#article1"
	</script>
	<?php
}

if (!isset($_SESSION["user"]) or !isset($_SESSION["id"])){
	?>
	<script>
		window.location.href = "/login/#login"
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
					$("#nav-login").attr('class', 'current');
				} else {
					$(window.location.hash.replace("#","#nav-")).attr('class', 'current');
				}
				$('#nav-login').html('<a href="#login">Login</a>');
			</script>
        </nav>
        
    </div>
</header>

<div id="createarticle" class="page">
	<div class="container">
        <div class="row">
			<div class="col-md-12">
				<form id="article" class="form" action="./#createarticle" method="post">
					<p>
						<input type="text" placeholder="Titel" value="" name="titel" />
					</p>
					<p>
						<textarea placeholder="Text" name="text" rows="15" cols="40"></textarea>
					</p>
					<input type="submit" style="position: absolute; left: -9999px"/>
					<p>
						<a class="submit" href="javascript:void(0)" onclick="$('#article').submit()">Veröffentlichen</a>
					</p>
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
