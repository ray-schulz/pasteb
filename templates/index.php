<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<title>paste bucket</title>

<script>
function ctrl_enter(e) {
	if (e.keyCode == 13 && e.ctrlKey) {
		document.getElementById("paste_button").click();
	}
}
</script>

</head>

<body style="text-align: center;">

<a href="<?php echo $PASTE_SOURCE; ?>"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>

<p>You can use the form below to submit, or you may use curl:</p>

<pre>&lt;command&gt; | curl -F 'paste=&lt;-' <?php echo $PASTE_URL; ?></pre>

<p>Or you may use the script:</p>

<p><a href="<?php echo $PASTE_URL; ?>/1"><?php echo $PASTE_URL; ?>/1</a></p>

<form action="/" method="post">
<p><textarea autofocus name="text" rows="32" cols="120" onkeydown="ctrl_enter(event);"></textarea></p>
<p><button id="paste_button">paste</button><br>
<small>or hit ctrl+enter</small></p>
</form>

</body>
</html>
