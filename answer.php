<?php
session_start();
$error='';

$_SESSION['winename'] = $_GET['winename'];
$_SESSION['winery'] = $_GET['winery'];
$_SESSION['region'] = $_GET['region'];
$_SESSION['variety'] = $_GET['variety'];

?>
<?php if (isset($_SESSION['winename'])): ?>
<?php
	require_once('db_pdo.php');

	try {
			$dsn = 'mysql:host=localhost;dbname=winestore';
  			$pdo = new PDO($dsn,DB_USER, DB_PW);
  
  			// all errors will throw exceptions
 			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$winename=$_SESSION['winename'];
			$winery=$_SESSION['winery'];
			$region=$_SESSION['region'];
			$variety=$_SESSION['variety'];

			$query = "SELECT wine_name,winery_name,year,variety FROM grape_variety,";
			
			if(!empty($_SESSION['winename'])){
				if(!empty($_SESSION['winery'])){
					$query .=" winery LEFT JOIN wine ON (winery.winery_id = wine.winery_id) WHERE wine_name like '$winename%'and winery_name like '$winery%' ";
					
				}else{
					 $query .=" winery LEFT JOIN wine ON (winery.winery_id = wine.winery_id) WHERE wine_name like '$winename%' ";
											 }}
											
			elseif(!empty($_SESSION['winery'])){		   									
											 $query .=" wine LEFT JOIN winery ON (winery.winery_id = wine.winery_id) WHERE winery_name like '$winery%' ";
											 }
											 elseif(!empty($_SESSION['region'])){
													 $query = "SELECT wine_name,year,variety,region_name FROM grape_variety,region LEFT JOIN wine ON (wine.winery_id = region.region_id ) WHERE region_name like '$region' limit 1100";
												 }
											elseif(!empty($_SESSION['variety'])){
													 $query = "SELECT wine_name,year,variety FROM grape_variety LEFT JOIN wine ON (wine.winery_id = grape_variety.variety_id ) WHERE variety like '$variety' limit 1100";
												 }
												 else{
												 	$query = "SELECT wine_name,winery_name,year,region_name FROM region, winery LEFT JOIN wine ON winery.winery_id = wine.winery_id  WHERE wine_name like '$winename%' limit 1100";
												 }
			
  			$statement = $pdo->prepare($query);
  			$values = array('1000');
  			$statement->execute($values);
  			$result = $statement->fetchAll(PDO::FETCH_NAMED);
			$_SESSION['result']=$result;
			header("location:results.php");

 		 	$pdo = null;
		} catch (PDOException $e)
		 {
 	 		echo $e->getMessage();
  			exit;
		}
		?>
        <?php else: ?>

        
        <?php endif; ?>

