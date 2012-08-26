<!DOCTYPE HTML PUBLIC
"-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html401/loose.dtd">

<html>
<head>
   <title>Web Database Applications Part B - Wine Store Database</title>
</head>
<body>
   <form action="query.php" method="GET" id="my_form">
      
	  Wine Name: <input type="text" name="winename" id="winename" /><br /> 
	  Winery Name: <input type="text" name="wineryname" id="wineryname" /><br />
      
	 <?php
		
		$connect = mysql_connect("yallara.cs.rmit.edu.au:55327", "winestore", "1234qwer");
		$database = mysql_select_db("winestore", $connect);
		
		$query_region=("SELECT region_name from region");
		$query_variety=("SELECT variety from grape_variety");
		$query_year=("SELECT DISTINCT year from wine ORDER BY year ");
		$query_year1=("SELECT DISTINCT year from wine ORDER BY year ");
		
		$result=mysql_query($query_region);
		$result2=mysql_query($query_variety);
		$result3=mysql_query($query_year);
		$result4=mysql_query($query_year1);
		
		echo "Region: ";
		echo "<select id='region' name = 'region'>";
		while($row = mysql_fetch_array($result))
		{
			echo "<option value ='".$row["region"]."'>".$row["region"]."</option>";
		}
		echo "</select><br/>";
		
		echo "Grape Variety: ";
		echo "<select id='variety' name = 'variety'>";
		echo "<option> ALL </option>";
		while($row = mysql_fetch_array($result2))
		{
			echo "<option value ='".$row["variety"]."'>".$row["variety"]."</option>";
		}
		echo "</select><br/>";
	 
		echo "Year: ";
		echo "<select id='year' name ='year'>";
		while($row = mysql_fetch_array($result3))
		{
			echo "<option value ='".$row["year"]."'>".$row["year"]."</option>";
		}
		echo "</select>";
		
		echo "to ";
		echo "<select id='year1' name = 'year1>";
		while($row = mysql_fetch_array($result4))
		{
			echo "<option value ='".$row["year"]."'>".$row["year"]."</option>";
		}
		echo "</select><br/>";
		
		mysql_close($connect);
		?>
      
	  
      Minimum number of stock: <input type="text" name="stock" id="stock" size="2" /><br />
      
	  Minimum number of wines ordered: <input type="text" name="order" id="order" size="2" /><br />
	  
	  Cost:<br/>
		Min<input type="text" name="min_cost" id="min_cost" size="3" />
		Max<input type="text" name="max_cost" id="max_cost" size="3" /><br />
		
      <input type="submit" value="Submit" onclick ="validation()" />
   </form>
   
   <script type= "text/javascript">
   function validation()
   {
		var a=document.getElementById("winename").value;
		if(a==null || a=="")
		{
			alert("Enter wine name");
			return false;
		}
		
		var b=document.getElementById("wineryname").value;
		if(b==null || b=="")
		{
			alert("Enter winery name");
			return false;
		}
		
		var c=document.getElementById("min_cost").value.trim();
		var d=document.getElementById("max_cost").value.trim();
		if( c!=""&& d!="" && c>=d)
		{
			alert("Maximum cost must be higher than minimum cost");
			return;
		}
		
		var e=document.getElementById("stock").value.trim();
		var f=document.getElementById("order").value.trim();
		if( e!=""&& f!="" && e < 1 && f < 1)
		{
			alert("The number must be greater or equal to 1");
			return;
		}
		
		var g=document.getElementById("year").value.trim();
		var h=document.getElementById("year1").value.trim();
		if (g==""&& h="" && c>=d)
		{
			alert("Select approriate range of years");
			return;
		}
		
		else
		{
			var form=document.getElementById("my_form");
			
			form.onsubmit = function(){};
			form.submit();
		}
		
		
   }
   </script>
   
</body>
</html>

