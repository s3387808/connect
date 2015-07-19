<?php 

include ('answer.php');
if(isset($_SESSION['winename'])){
header("location: results.php");}

?>

<html>
<head>
<title> Sample Page </title>
</head>
<body>

<form action="answer.php" method="GET">
Enter a Winename or a partial name of a wine: <input type="text" name="winename" /><br>
Enter a Winery name or a partial name of a winery: <input type="text" name="winery" /><br>

Select a Wine region
<select value="tableregion"name= region>	
<option value="" > </option>
    <?php if (!isset($_GET['region']))
	{
	require_once('db.php');
	//Connect to DB
	$conn = mysql_connect (DB_HOST, DB_USER, DB_PW);
	mysql_select_db(DB_NAME, $conn);	
	$sql="SELECT region_name FROM region; ";
	$result_region = mysql_query($sql, $conn);	
	
	if (isset($_POST['region']))
	{
			$region = $_GET['region'];	
	 		echo "<option value='$region'> $tableregion </option> ";	
	}
	elseif (!isset($_POST['region']))
	{
		while($row = mysql_fetch_row($result_region))
		{
	 		$tableregion = $row[0];	
	 		echo "<option value='$tableregion'> $tableregion </option> ";	
		}}}
	?>
</select><br>
Select a Wine variety
<select value="tablevariety"  name=variety >	
<option value=""> </option>
    <?php if (!isset($_GET['variety']))
	{
	require_once('db.php');
	//Connect to DB
	$conn = mysql_connect (DB_HOST, DB_USER, DB_PW);
	mysql_select_db(DB_NAME, $conn);	
	$sql="SELECT variety FROM grape_variety; ";
	$result_variety = mysql_query($sql, $conn);	
	
	if (isset($_POST['variety']))
	{
			$region = $_GET['variety'];	
	 		echo "<option value='$variety'> $tablevariety </option> ";	
	}
	elseif (!isset($_POST['variety']))
	{
		while($row = mysql_fetch_row($result_variety))
		{
	 		$tablevariety = $row[0];	
	 		echo "<option value='$tablevariety'> $tablevariety </option> ";	
		}}}
	?>
</select>

<br>

<input type="submit"value="GO" />
</form>



<span><?php echo $error; ?></span>


</body>
</html>