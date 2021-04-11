<?php
    $code=$_GET['code'];
    session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    header('Location: ./admin');
} else {
    $_SESSION["login"] = false;
    
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			A Sentence | 一句 管理登录
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/css/mdui.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/js/mdui.min.js">
		</script>
	</head>
	<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-blue">
		<div class="mdui-appbar mdui-appbar-fixed">
			<div class="mdui-toolbar mdui-color-theme">
				<button class="mdui-btn mdui-btn-icon" mdui-drawer="{target:'#sidebar'}">
					<i class="mdui-icon material-icons">
						&#xe5d2;
					</i>
				</button>
				<a href="./" class="mdui-typo-headline">
					管理登录
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="./" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe88a;
					</i>
					<div class="mdui-list-item-content">
						管理登录
					</div>
				</a>
			</div>
		</div>
		<div class="mdui-container mdui-typo">
			<h1 class="mdui-text-color-theme">
				管理登录
			</h1>
			<?php
			if($code=='1')
			echo("<script>mdui.alert('用户名或密码错误, 请检查后重试', '用户名或密码错误');</script>");
			?>
			
			<form class="content database" action="./admin/login.php" method="post">
    			
    			<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">用户名</label>
                  <input class="mdui-textfield-input" value='' name="username"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">密码</label>
                  <input class="mdui-textfield-input" value="" name="passwd"/>
                </div>
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">登录</button>
			</form>
			
		</div>
		<script>
			$(function() {});
		</script>
		<style>
			.dictumanchor{position:relative;top:-56px}@media (min-width:600px){.dictumanchor{top:-64px!important}}@media
			(orientation:landscape) and (max-width:959px){.dictumanchor{top:-48px!important}}
		</style>
	</body>

</html>