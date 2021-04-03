<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ?
            "https://": "http://";
?>
<!doctype html>
<html>
<head>
<meta charset='UTF-8'><meta name='viewport' content='width=device-width initial-scale=1'>
<title>README</title>
<link rel="stylesheet" href="./md.css?v=1.0">
</head>
<body class='typora-export os-windows'>
<div id='write'  class=''><h1>API使用说明</h1>
<h2>版权说明</h2>
<p>本API 文档参照<a href='https://zigzagk.top/OIerdictum/API.php' target='_blank' class='url'>https://zigzagk.top/OIerdictum/API.php</a> 完成</p>
<h2>输出格式</h2>
<p><strong>1.Json格式</strong></p>
<pre><code><?php echo $protocol.$_SERVER['HTTP_HOST']?>/api/?encode=json
</code></pre>
<p>随机输出一条语录，包含完整的语录信息：编号(id)，大佬名(dalao)，语录(text)，上传者(author)。</p>
<p><strong>2.纯文本</strong></p>
<pre><code><?php echo $protocol.$_SERVER['HTTP_HOST']?>/api/?encode=text
</code></pre>
<p>随机输出一条语录，只含纯文本。</p>
<p><strong>3.Javascript格式</strong></p>
<pre><code><?php echo $protocol.$_SERVER['HTTP_HOST']?>/api/?encode=js
</code></pre>
<p>随机输出一条语录，只含纯文本的js代码。</p>
<p>将下面的代码插入任意位置，将自动替换为语录：</p>
<pre><code class='language-html' lang='html'>&lt;script src=&quot;<?php echo $protocol. $_SERVER['HTTP_HOST']?>/api/?encode=js&quot;&gt;&lt;/script&gt;&lt;script&gt;AMessage();&lt;/script&gt;
</code></pre>
</div>
</body>
</html>