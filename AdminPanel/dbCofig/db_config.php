<?php

 mysql_connect("localhost","root","") or die("Error in connection");
 mysql_select_db("beauty") or die("Database not found");

class db_config
{
	public function nonExecute($ins)
	{	
		echo $ins;
        mysql_query($ins) or die("Error in insert");
		return true;
	}
	
	public function SelectData($tablename)
	{
		$strSel = "SELECT * FROM ".$tablename;
		$Data = mysql_query($strSel) or die("Error in Select");
		$num = mysql_num_rows($Data);
		if($num>0)
		{
			$Rows = array();
			while($rows = mysql_fetch_assoc($Data))
			{
				$Rows[] = $rows;
			}
			return $Rows;
		}
		else
		{
			return 0;
		}
	}
}
?>