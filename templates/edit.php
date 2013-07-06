<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<title>paste bucket <?php echo $PASTE_ID; ?></title>

</head>

<body>

<ul style="font-family: monospace;list-style: none;padding: 0">
	<li style="display: inline;padding: 0em 2em 0em 0em"><a href="/">paste bucket</a>
	<li style="display: inline;padding: 0em 2em 0em 0em"><a href="<?php echo "$PASTE_URL/$PASTE_ID"; ?>"><?php echo "$PASTE_ID"; ?></a>
	<li style="display: inline;padding: 0em 2em 0em 0em"><a href="<?php echo "$PASTE_URL/$PASTE_ID/raw"; ?>">raw</a>
	<li style="display: inline;padding: 0em 2em 0em 0em"><a href="<?php echo "$PASTE_URL/$PASTE_ID/edit"; ?>">edit</a>
	<li style="display: inline;float: right"><?php echo $PASTE_DATE; ?>
</ul>

<hr>

<div style="text-align: center">
<form action="/" method="post">
<p><textarea autofocus name="text" rows="32" style="width: 100%" onkeydown="ctrl_enter(event);"><?php echo $PASTE_TEXT; ?></textarea></p>
<p><button id="paste_button">paste</button><br>
<small>or hit ctrl+enter</small></p>
</form>
</div>

</body>
</html>
