<?php session_start();
$error='';

$winename = $_SESSION['winename'];
$_SESSION['winename'] = $_GET['winename'];

$winery = $_SESSION['winery'];
$_SESSION['winery'] = $_GET['winery'];

$region = $_SESSION['region'];
$_SESSION['region'] = $_GET['region'];

$variety = $_SESSION['variety'];
$_SESSION['variety'] = $_GET['variety'];

echo ("Wine search entered = $winename<br>");
echo ("Winery search entered = $winery<br>");
echo ("Region selected = $region<br>");
echo ("Grape variety selected = $variety<br>");

$result = $_SESSION['result'];
?>

<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
<title> Sample Page </title>
</head>
<body>

<?php
 $length = count ($result);
 echo ("Found $length match/es <br><br><br>");

			 echo "<table><tr><th>Wine_Name</th><th>Grape_Variety</th><th>Year</th><th>Winery_Name</th><th>Region_Name</th><th>Cost_Price</th><th>Bottles in stock</th><th>Bottles_Sold</th><th>Sales_Revenue</th></tr>";

		foreach ($result as $row)
		{
        echo "<tr><td>" . $row["wine_name"]. "</td><td>" . $row["variety"]. "</td><td>" . $row["year"]. "</td><td>" . $row["winery_name"]. "</td><td>" . $row["region_name"]. "</td><td>" . "$".$row["cost"]. "</td><td>" . $row["on_hand"]. "</td><td>" . $row["qty"]. "</td><td>" . $row["price"]. "</td></tr>";
     	}
    
		 echo "</table>";

		?>
</body>

</html>