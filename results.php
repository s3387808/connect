<html>
<head>
<title> Sample Page </title>
</head>
<body>

<p>Your Winename: <?=$_GET['winename']?></p>

	<?php
	require_once('db_pdo.php');

	try {
			$dsn = 'mysql:host=localhost;dbname=winestore';
  			$pdo = new PDO($dsn, $_GET['name'], DB_PW);
  
  			// all errors will throw exceptions
 			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  			$query = 'SELECT * FROM wine WHERE wine_id > ?';
  			$statement = $pdo->prepare($query);
  			$values = array('1000');
  			$statement->execute($values);
  			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

  			echo '<pre>';
  			print_r($result);
 	 		echo '</pre>';

  			// close the connection by destroying the object
 		 	$pdo = null;
		} catch (PDOException $e)
		 {
 	 		echo $e->getMessage();
  			exit;
		}
		?>


</body>
</html>