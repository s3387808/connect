<html>
<head>
<title> Sample Page </title>
</head>
<body>
<?php if ( !isset($_GET['name']) ): ?>
<script>

alert("Database Username required");
</script>

<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
Please enter your Username: <input type="text" name="name" />
<input type="submit" value="GO" />
</form>

<?php else: ?>
<p>Your Username: <?=$_GET['name']?></p>

<form action="answer.php?winename=<?=urlencode($_GET['winename'])?>" method="get">
Please enter a Winename or a partial Winename: <input type="text" name="winename" />
<input type="submit" value="GO" />
</form>
>
<?php endif; ?>
</body>
</html>