<?php
    $code = $_GET['code'];
    if($code!='complete')
        $code = '';
?>

<html lang="zh-cmn-Hans"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.0/dist/css/mdui.min.css">
    <style>
        body {
            background-color: #eee;
            display: flex;
            justify-content: center;
        }

        /* 加载状态遮罩 */
        .mc-loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999999;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, .65);
            opacity: 0;
            transition: opacity .2s ease;
            will-change: opacity;
        }

        .mc-loading-overlay-show {
            opacity: 1;
        }

        @media screen and (prefers-color-scheme: dark) {
            .mc-loading-overlay {
                background: rgba(255, 255, 255, .16);
            }
        }

        /* 设置表格样式 */
        .mdui-table-fluid,
        .mdui-table {
            box-shadow: none !important;
            border: none !important;
            margin-top: 8px !important;
            background-color: transparent !important;
        }

        .mdui-table-fluid {
            width: auto;
            margin-left: -8px;
            margin-right: -8px;
        }

        .mdui-table th,
        .mdui-table td {
            padding-top: 8px;
            padding-bottom: 8px;
            padding-right: 0;
        }

        .mdui-table td {
            border-bottom: none;
        }

        .mdui-table th:first-child,
        .mdui-table td:first-child {
            padding-left: 8px;
        }

        .mdui-table th:last-child,
        .mdui-table td:last-child {
            padding-right: 8px;
        }

        @media screen and (max-width: 600px) {
            .mdui-table-fluid {
                margin-left: -16px;
                margin-right: -16px;
            }

            .mdui-table-fluid .mdui-table {
                padding: 0 8px;
            }
        }

        /* 文本框 */
        @media screen and (prefers-color-scheme: dark) {
            .mdui-textfield-focus .mdui-textfield-label {
                color: #8ab4f8 !important;
            }

            .mdui-textfield-focus .mdui-textfield-input {
                border-bottom-color: #8ab4f8 !important;
                box-shadow: 0 1px 0 0 #8ab4f8 !important;
            }
        }

        /* 环境满足与否的 */
        .success,
        .error {
            font-size: 20px;
            margin-right: 4px;
        }

        .success {
            color: #4CAF50;
        }

        .error {
            color: #F44336;
        }

        /* 底部按钮 */
        .actions {
            display: flex;
            align-items: center;
            margin-top: 24px;
            height: 36px;
        }

        .next-step {
            background-color: #1a73e8;
            color: #fff;
            border-radius: 4px;
        }

        .next-step:hover {
            background-color: rgba(26, 115, 232, .87);
        }

        .next-step:active {
            background-color: rgba(26, 115, 232, .72) !important;
        }

        .next-step-disabled {
            color: #F44336;
        }

        @media screen and (prefers-color-scheme: dark) {
            .next-step {
                background-color: #8ab4f8;
            }

            .next-step:hover {
                background-color: rgba(138, 180, 248, .87) !important;
            }

            .next-step:active {
                background-color: rgba(138, 180, 248, .72) !important;
            }
        }

        /* 显示 tooltip 的小图标 */
        .notice {
            font-size: 18px;
            margin-left: 4px;
        }

        .main {
            background-color: #fff;
            border-radius: 4px;
            width: 100%;
            max-width: 640px;
            margin: 16px auto;
        }

        @media screen and (max-width: 600px) {
            .main {
                margin: 0;
                border-radius: 0;
                box-shadow: none;
            }
        }

        @media screen and (prefers-color-scheme: dark) {
            .main {
                background-color: #424242;
            }
        }

        @media screen and (max-width: 600px) and (prefers-color-scheme: dark) {
            .main {
                background-color: #303030;
            }
        }

        /* 步进器 */
        .steppers {
            display: flex;
            align-items: center;
            height: 72px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .2);
        }

        .steppers .item {
            display: flex;
            align-items: center;
            height: 100%;
            padding: 0 8px;
        }

        .steppers .item:first-child {
            padding-left: 24px;
        }

        .steppers .item:last-child {
            padding-right: 24px;
        }

        .steppers .divider {
            display: flex;
            flex-grow: 1;
            height: 1px;
            height: .5px;
            background-color: #E0E0E0;
        }

        .steppers i {
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            font-size: 12px;
            font-style: normal;
            border-radius: 50%;
            color: #fff;
            background-color: rgba(0, 0, 0, .38);
        }

        .steppers .check {
            font-size: 16px;
            display: none;
        }

        .steppers label {
            font-size: 14px;
            color: rgba(0, 0, 0, .38);
            padding-left: 8px;
        }

        .steppers .active i,
        .steppers .done i {
            background-color: #1a73e8;
        }

        .steppers .done .number {
            display: none;
        }

        .steppers .done .check {
            display: block;
        }

        .steppers .active label,
        .steppers .done label {
            color: rgba(0, 0, 0, .87);
        }

        .steppers .active label {
            font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            .steppers .item:first-child {
                padding-left: 16px;
            }

            .steppers .item:last-child {
                padding-right: 16px;
            }
        }

        @media screen and (prefers-color-scheme: dark) {
            .steppers {
                box-shadow: 0 1px 2px 0 rgba(255, 255, 255, .16);
            }

            .steppers .divider {
                background-color: #606060;
            }

            .steppers i {
                background-color: rgba(255, 255, 255, .54);
            }

            .steppers label {
                color: rgba(255, 255, 255, .7);
            }

            .steppers .active i,
            .steppers .done i {
                background-color: #8ab4f8;
            }

            .steppers .active label,
            .steppers .done label {
                color: rgba(255, 255, 255, 1);
            }
        }

        /* 正文部分 */
        .section + .section {
            margin-top: 36px;
        }

        .content {
            padding: 24px;
        }

        @media screen and (max-width: 600px) {
            .content {
                padding: 16px;
            }
        }

        /* 环境检查 */
        @media screen and (max-width: 600px) {
            .environment th:nth-child(3),
            .environment td:nth-child(3) {
                display: none;
            }
        }

        /* 导入数据库，创建管理员 */
        .database .form {
            margin-top: 16px;
        }

        /* 安装完成 */
        .complete {
            padding-top: 48px;
            padding-bottom: 48px;
            height: calc(100vh - 72px);
            box-sizing: border-box;
        }

        .complete .mdui-typo-headline {
            text-align: center;
            margin-bottom: 40px;
        }

        .complete .mdui-typo-body-2 {
            line-height: 32px;
        }
    </style>
    <title>安装 A Sentence</title>
</head>
<body class="mdui-theme-accent-blue mdui-theme-layout-auto mdui-loaded">
<div class="main mdui-shadow-2">
    <div class="steppers">
        
        <div class="item item-1 active">
            <i class="number">1</i>
            <i class="mdui-icon material-icons check">check</i>
            <label>安装 A Sentence</label>
        </div>
    </div>
    <div class="container">
        <?php if($code != 'complete')
        echo ('
        <form class="content database" style="display: block;" action="install.php" method="post">
            <div class="section">
                <div class="title mdui-typo-title">设置数据库信息</div>
                <div class="form">
                    <div class="mdui-textfield mdui-textfield-not-empty">
                        <label class="mdui-textfield-label">服务器地址</label>
                        <input class="mdui-textfield-input" name="dbhost" value="localhost">
                    </div>
                    <div class="mdui-textfield mdui-textfield-not-empty">
                        <label class="mdui-textfield-label">数据库名称</label>
                        <input class="mdui-textfield-input" name="dbname" value="asentence">
                    </div>
                    <div class="mdui-textfield mdui-textfield-not-empty">
                        <label class="mdui-textfield-label">用户名</label>
                        <input class="mdui-textfield-input" name="dbuser" value="asentence">
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">密码</label>
                        <input class="mdui-textfield-input" name="dbpasswd" autocomplete="off">
                    </div>
                    <div class="mdui-textfield mdui-textfield-not-empty mdui-textfield-has-bottom">
                        <label class="mdui-textfield-label">表前缀</label>
                        <input class="mdui-textfield-input" name="dbprefix" value="ast_" autocomplete="off">
                        <div class="mdui-textfield-helper">如果您希望在同一个数据库安装多个A Sentence, 请修改前缀</div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="title mdui-typo-title">设置站点信息</div>
                <div class="form">
                
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">站点名称</label>
                        <input class="mdui-textfield-input" name="sitetitle" value="A Sentence"/>
                    </div>
                    
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">站点描述</label>
                        <input class="mdui-textfield-input" name="describe" value="一句话，感动人心"/>
                    </div>
                    
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">高级管理员用户名(默认为root，将在未来更新多用户时启用)</label>
                        <input class="mdui-textfield-input" name="adminusername" value="root" />
                    </div>
                
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">密码</label>
                        <input class="mdui-textfield-input" name="adminpasswd" autocomplete="off">
                    </div>
                    
                </div>
            </div>
            <div class="actions">
                <button class="mdui-btn next-step next-step-1" type="submit">安装</button>
            </div>
        </form>');
        
        if($code == 'complete')
        {
            if(file_exists('./userdata.php'))
                unlink('./userdata.php');
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ?
            "https://": "http://";
            
            $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $url = substr($url, 0, -22);
            
            echo('
            <div class="content complete">
                <div class="mdui-typo-headline">恭喜你完成安装</div>
                <div class="mdui-typo">
                    <p>现在，你可以前往 <a href="'.$url.'">'.$url.'</a> 访问网站首页</p>
                    <p>更多信息请查看网页根目录 <strong>./config/siteinfo.php</strong> 进行更改 ， UI搭建中....</p>
                </div>
            </div>
            ');
        }
        ?>
        
        
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/mdui@1.0.0/dist/js/mdui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/mdclub-sdk-js@1.0.4/dist/mdclub-sdk.min.js"></script>
</body></html>