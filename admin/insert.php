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
					添加语句
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="./" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe88a;
					</i>
					<div class="mdui-list-item-content">
						首页
					</div>
				</a>
				<a href="./insert.php" class="mdui-list-item mdui-list-item-active mdui-ripple">
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
				添加语句
			</h1>
			<form class="content database" action="data.php" method="post">
    			<div class="mdui-textfield mdui-textfield-floating-label" style ="display:none">
                  <label class="mdui-textfield-label"></label>
                  <input class="mdui-textfield-input" value="1" name="code"/>
                </div>
    			
    			<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">投稿者</label>
                  <input class="mdui-textfield-input" value="游客" name="author"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">投稿语句</label>
                  <input class="mdui-textfield-input" value="" name="text"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">作者</label>
                  <input class="mdui-textfield-input" value="佚名" name="speaker"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">管理密码</label>
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