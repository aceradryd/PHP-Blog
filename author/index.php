<?php
include($_SERVER['DOCUMENT_ROOT']."/_include/php/header.php");
include($_SERVER['DOCUMENT_ROOT']."/_include/html/header.html");
include($_SERVER['DOCUMENT_ROOT']."/_include/php/config.php");
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
					$("#nav-author").attr('class', 'current');
				} else {
					$(window.location.hash.replace("#","#nav-")).attr('class', 'current');
				}
				$('#nav-author').html('<a href="#author1">Autoren</a>');
			</script>
        </nav>
        
    </div>
</header>
<?php
$stmt = $dbh->prepare("SELECT * FROM uni.autor;");
$stmt->execute();
$result = $stmt->fetchAll();

$i = 1;

function getColor($number){
	if ($number % 2 == 1){
		return "page";
	} else {
		return "page-alternate";
	}
}

foreach ($result as $row){
	?>
	<div id="author<?php echo $i?>" class="<?php echo getColor($i)?>">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title-page">
						<h2 class="title"><?php echo $row["nutzername"]?></h2>
						<h3 class="title-description">E-Mail: <?php echo $row["email"]?></h3>
					</div>
				</div>
			</div>
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