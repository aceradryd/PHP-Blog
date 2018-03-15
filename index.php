<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/php/header.php");
include($_SERVER['DOCUMENT_ROOT']."/_include/html/header.html");
include($_SERVER['DOCUMENT_ROOT']."/_include/php/config.php");

if (isset($_REQUEST["username"]) and isset($_REQUEST["kommentar"]) and isset($_REQUEST["artikel"])){
	$stmt = $dbh->prepare("INSERT INTO kommentare (`artikel_id`, `username`, `kommentar`) VALUES (:artikel_id, :username, :kommentar);");
	$stmt->bindParam(":artikel_id",$_REQUEST["artikel"]);
	$stmt->bindParam(":username",$_REQUEST["username"]);
	$stmt->bindParam(":kommentar",$_REQUEST["kommentar"]);
	$stmt->execute();
}
?>
<body>

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
					$("#nav-article").attr('class', 'current');
				} else {
					$(window.location.hash.replace("#","#nav-")).attr('class', 'current');
				}
				$('#nav-article').html('<a href="#article1">Start</a>');
			</script>
        </nav>
        
    </div>
</header>
<?php
$stmt = $dbh->prepare("SELECT * FROM uni.blogeintrag;");
$stmt->execute();
$result = $stmt->fetchAll();

$i = 1;

function getColor($number, $type){
	if ($type == 1){
		if ($number % 2 == 1){
			return "page";
		} else {
			return "page-alternate";
		}
	} elseif ($type == 2){
		if ($number % 2 == 1){
			return "#26292E";
		} else {
			return "#2F3238";
		}
	}
}

foreach ($result as $row){
	?>
	<div id="article<?php echo $i?>" class="<?php echo getColor($i,1)?>">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-page">
						<h2 class="title"><?php echo $row["titel"]?></h2>
						<h3 class="title-description">Geschrieben von <?php echo $row["nutzername"]?> (<?php echo $row["date"]?>)</h3>
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
			<h3 class="spec">Kommentare</h3>
			<?php
			$kommentare_stmt = $dbh->prepare("SELECT * FROM uni.kommentare WHERE artikel_id=:artikel_id ORDER BY id DESC;");
			$kommentare_stmt->bindParam(":artikel_id", $row["id"]);
			$kommentare_stmt->execute();
			$kommentare_result = $kommentare_stmt->fetchAll();
			foreach ($kommentare_result as $kommentar){
				?>
					<blockquote>
						<p><?php echo $kommentar["kommentar"]?></p>
						<small>
							<cite title="<?php echo $kommentar["username"]?>"><?php echo $kommentar["username"]?></cite>
						</small>
					</blockquote>
				<?php
			}
			?>
			<form id="kommentar_<?php echo $i?>" class="form" action="./#article<?php echo $i?>" method="post">
				<p>
					<input type="text" placeholder="Nutzername" value="" name="username" style="background-color:<?php echo getColor($i,2)?>"/>
				</p>
				<p>
					<textarea placeholder="Kommentar" name="kommentar" rows="2" cols="40" style="background-color:<?php echo getColor($i,2)?>"></textarea>
				</p>
				<input type="hidden" value="<?php echo $row["id"]?>" name="artikel" />
				<input type="submit" style="position: absolute; left: -9999px"/>
				<p>
					<a class="submit" href="javascript:void(0)" onclick="$('#kommentar_<?php echo $i?>').submit()">Absenden</a>
				</p>
			</form>
		</div>
	</div>
	<?php
	$i++;
}
?>

<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/html/credits.html");
?>

<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>

</body>
</html>