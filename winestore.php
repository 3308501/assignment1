<html>
<title>Winestore</title>
<body>
<form method="get" action="query.php" id="myform" >
	Wine name: <input type="text" name="wname"id="wname"/><br/>
	Wineryname: <input type="text" name="wyname" id="wyname" /><br/>
	
	
  
<?php 
    $link = mysql_connect("127.0.0.1:3306","cuijinhe","cuijinhe");
	$select_db=mysql_select_db("winestore",$link);
	
    $query=("select region_name from region");
	$query1=("select variety from grape_variety");
	$query2=("SELECT DISTINCT  `year` FROM  `wine` ORDER BY  `year` ");
	$query3=("SELECT DISTINCT  `year` FROM  `wine` ORDER BY  `year` ");
	$result=mysql_query($query);
	$result1=mysql_query($query1);
	$result2=mysql_query($query2);
	$result3=mysql_query($query3);
	echo "Region:";
	echo " <select id='sel_region_name' name='region_name' >";
	while ($row = mysql_fetch_array($result)) {
	echo   "<option value='".$row["region_name"]."'>".$row["region_name"]."</option>";
	}
	echo	" </select><br/>";
	
	echo "Grape Variety:";
	echo " <select id='sel_variety' name='variety'>";
	echo "<option>All</option>";
	while ($row=mysql_fetch_array($result1)){
	echo "<option value='".$row["variety"]."'>".$row["variety"]."</option>";
	}
	echo	" </select><br/>";
	
	echo "Year:";
	echo " <select id='year' name='year'>";
	while ($row=mysql_fetch_array($result2)){
	echo "<option value='".$row["year"]."'>".$row["year"]."</option>";
	}
	echo " </select>";
	
	echo "to";
	echo " <select id='year1' name='year1'>";
	while ($row=mysql_fetch_array($result3)){
	echo "<option value='".$row["year"]."'>".$row["year"]."</option>";
	}
	echo	" </select><br/>";
	
	
	mysql_close($link);
	?> 
	
	Cost range ,minimum : <input type="text" name="minicost" value=""id="minicost"size="3"/>$ ---
	            maximum : <input type="text" name="maxicost" value=""id="maxicost"size="3"/>$<br/>

	Minimum number of wines in stock:<input type="text" name="instock" value=""id="instock"size="2" /><br/>
	Minimum number of wines	ordered:<input type="text" name="ordered" value=""id="ordered"size="2" /><br/>		
				


	
	</form>
	<input type="button" onclick="checkFunction();" value="Search"/>
	
	
	<script type="text/javascript">
	function checkFunction()
	{
	
		
		
		
		var i=document.getElementById("minicost").value.trim();
		var j=document.getElementById("maxicost").value.trim();
		if(i!=""&&j!=""&&i>=j)
		{
			alert("The minimaum price must lower than maximum!");
		
			return;
			
		}
		var c=document.getElementById("instock").value.trim();
		var d=document.getElementById("ordered").value.trim();
		if(c!=""&&d!=""&&c<1&&d<1)
		{
		
			alert("The number must equal or higher than 1");
			return;
		
		
		}
		var e=parseInt(document.getElementById("year").value.trim());
		var f=parseInt(document.getElementById("year1").value.trim());
		if(e>f)
		{
			alert("The range of year msut appropriate");
			
			return;
		}
		
		
		else
		{
		var form=document.getElementById("myform");
		
	
		 form.onsubmit=function(){};
		 form.submit();
		 
			}
	}
	</script>







</body>
</html>