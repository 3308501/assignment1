<!DOCTYPE HTML PUBLIC
"-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html401/loose.dtd">

<html>
<title> WineStore </title>

<?php

	$winename = $_GET["winename"];
	$wineryname = $_GET["wineryname"];
	$region = $_GET["region"];
	$year = $_GET["year"];
	$year1 = $_GET["year1"];
	$variety = $_GET["variety"];
	$min_cost = $_GET["min_cost"];
	$max_cost = $_GET["max_cost"];
	$stock = $_GET["stock"];
	$order = $_GET["order"];
	
	$connect = mysql_connect("yallara.cs.rmit.edu.au:55327", "s3308501", "1234qwer");
	
	$database = mysql_select_db("winestore", $connect);
	
	$query("SELECT distinct wine_name,winery_name,region_name,variety,year,price,on_hand,qty,cost
			FROM wine,winery,region,grape_variety,wine_variety,items,inventory
			where wine.winery_id = winery.winery_id and winery.region_id = region.region_id 
			and grape_variety.variety_id = wine_variety.variety_id and wine.wine_id = wine_variety.wine_id 
			and inventory.wine_id = wine.wine_id 
			");