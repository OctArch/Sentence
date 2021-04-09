<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ?
            "https://": "http://";
?>
<!doctype html>
<html>
<head>
<meta charset='UTF-8'><meta name='viewport' content='width=device-width initial-scale=1'>
<title>API使用说明</title>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
  integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
  crossorigin="anonymous"
/>
</head>
<body class="mdui-drawer-body-left mdui-theme-primary-indigo mdui-theme-accent-blue mdui-loaded">
<div class="mdui-container">
<div id="content" class="mdui-typo">
<h1 class="mdui-text-color-theme">API使用说明</h1>
<h2 class="mdui-text-color-theme">输出格式</h2>

<p><strong>1.Json格式</strong></p>
<p><code><?php echo $protocol.$_SERVER['HTTP_HOST'] ?>/api</code></p>
<p>随机输出一条语录，包含完整的语录信息：语句ID(id)，创建者(creator)，一句(text)，作者(author)</p>

<p><strong>2.纯文本</strong></p>
<p><code><?php echo $protocol.$_SERVER['HTTP_HOST'] ?>/api/?encode=text</code></p>
<p>随机输出一条语录，包含<strong>作者(author)</strong>曰: <strong>一句(text)</strong>。</p>

<p><strong>3.JS格式</strong></p>
<p><code><?php echo $protocol.$_SERVER['HTTP_HOST'] ?>/api/?encode=js</code></p>
<p>随机输出一条语录，包含<strong>作者(author)</strong>曰: <strong>一句(text)</strong>的js代码。</p>
<p>将下面的代码插入任意位置，将自动替换为一句：</p>
<p><code>&lt;script src=&quot;<?php echo $protocol.$_SERVER['HTTP_HOST'] ?>/api/?type=dictum&amp;encode=js&quot;&gt;&lt;/script&gt;&lt;script&gt;Orz();&lt;/script&gt;</code></p>

<p><strong>4.自定义格式</strong></p>
<p><code><?php echo $protocol.$_SERVER['HTTP_HOST'] ?>/api/?encode=custom</code></p>
<p>随机输出一条语录，可自定义格式。</p>
<table class="mdui-table mdui-table-hoverable">
    <thead>
      <tr>
        <th>关键字</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <tr>
        <td><strong>[uid]</strong></td>
        <td>语句ID(id)</td>
      </tr><tr>
        <td><strong>[text]</strong></td>
        <td>语句(text)</td>
      </tr><tr>
        <td><strong>[author]</strong></td>
        <td>作者(author)</td>
      </tr><tr>
        <td><strong>[creator]</strong></td>
        <td>上传者(creator)</td>
      </tr> </tbody>
  </table>
<p><code>实例: <?php echo $protocol.$_SERVER['HTTP_HOST'] ?>/api/?encode=custom&custom=来自 [creator] 的第 [uid] 条嘲讽: [author]说过: [text]</code></p>
<a href='../'><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">返回主页</button></a>
<h2 class="mdui-text-color-theme"></h2>

</div>
</div>
<script
  src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
  integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
  crossorigin="anonymous"
></script>
</body>
</html>