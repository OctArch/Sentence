<?php include './config/siteinfo.php'; include './check.php'; ?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>
			<?php
			if($sitename!='')
			echo $sitename ;
			else echo 'A Sentence | 一句';
			?>
		</title>
		<link rel="icon" href="./icons/favicon.png">
		<meta name="description" content=
		<?php
		    if($describe != '' )
		        echo "\"".$describe."\"";
		    else echo "\"一句 | 一句话，感动人心\""
		 ?>
		    
		>
		<meta name="keywords" content="<?php echo $keyword ?>">
		<meta name="theme-color" content="#ffffff">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="msapplication-TileImage" content="icons/logo.png">
		<meta name="msapplication-TileColor" content="#000000">
		<link rel="stylesheet" href="./css/styles.css?v=1.1">
	</head>
	<body>
		<div id="app">
			<div class="theme-container no-sidebar">
				<header class="navbar">
						<span class="site-name">
							<?php
			if($sitename!='')
			echo $sitename ;
			else echo 'A Sentence | 一句';
			?>
						</span>
					<div class="links">
					    
					</div>
				</header>
				<main class="home">
					<header class="hero">
						<img src="./icons/logo.png?v=1.0">
						<h1 id="main-title">
						<script src="./api/?encode=js"></script><script>AMessage();</script>
						</h1>
						<p class="description">
							<?php
		    if($describe != '' )
		        echo $describe;
		    else echo "\"一句话，感动人心\""
		 ?>
						</p>
						<p class="action">
							<a href="
							<?php
							    echo $tg;
							?>"
							     class="nav-link action-button">
								我要投稿
							</a>
							<a href="./api?encode=help"
							     class="nav-link action-button">
								开放接口
							</a>
							<a href="./admin"
							     class="nav-link action-button">
								管理面板
							</a>
						</p>
					</header>
					<div class="footer">
						Copyright © 2020 <?php echo $sitename ?> | Powered By <a href="https://github.com/imjinglan/sentence">A Sentence
					</div>
				</main>
			</div>
		</div>
	</body>

</html>