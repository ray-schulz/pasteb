<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<title>paste bucket <?php echo $PASTE_ID; ?></title>
<link rel="stylesheet" href="<?php echo $PASTE_URL; ?>/highlight/styles/default.css">
<script src="<?php echo $PASTE_URL; ?>/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

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

<pre><code><?php echo htmlspecialchars($PASTE_TEXT); ?></code></pre>

</body>
</html>
