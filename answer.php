
	<?php
	require_once('db_pdo.php');

	try {
			$dsn = 'mysql:host=localhost;dbname=winestore';
  			$pdo = new PDO($dsn,DB_USER, DB_PW);
  
  			// all errors will throw exceptions
 			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$winename=$_GET['winename'];
			echo "<p> $winemane </p>";
  			$query = "SELECT wine_name FROM wine WHERE wine_name like '%$winename%'";
  			$statement = $pdo->prepare($query);
  			$values = array('1000');
  			$statement->execute($values);
  			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

  			echo '<pre>';
			print_r($winename);
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

