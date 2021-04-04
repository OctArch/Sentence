<?php
    include '../config/siteinfo.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			A Sentence 管理面板
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
					站点信息
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
						站点信息
					</div>
				</a>
				<a href="./insert.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe145;
					</i>
					<div class="mdui-list-item-content">
						添加语句
					</div>
				</a>
				<a href="./delete.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-brown">
						&#xe872;
					</i>
					<div class="mdui-list-item-content">
						删除语句
					</div>
				</a>
				<a href="./list.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">
						&#xe88e;
					</i>
					<div class="mdui-list-item-content">
						列表
					</div>
				</a>
			</div>
		</div>
		<div class="mdui-container mdui-typo">
			<h1 class="mdui-text-color-theme">
				站点信息
			</h1>
			<form class="content database" action="data.php" method="post">
    			<div class="mdui-textfield mdui-textfield-floating-label" style ="display:none">
                  <label class="mdui-textfield-label"></label>
                  <input class="mdui-textfield-input" value="4" name="code"/>
                </div>
    			
    			<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点标题</label>
                  <input class="mdui-textfield-input" value='<?php echo $sitename ?>' name="title"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点描述</label>
                  <input class="mdui-textfield-input" value="<?php echo $describe ?>" name="describe"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点投稿地址</label>
                  <input class="mdui-textfield-input" value="<?php echo $tg ?>" name="tg"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点关键字(用半角逗号 , 隔开)</label>
                  <input class="mdui-textfield-input" value="<?php echo $keyword ?>" name="keywords"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">管理员密码</label>
                  <input class="mdui-textfield-input" value="" name="passwd"/>
                </div>
                
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">添加</button>
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