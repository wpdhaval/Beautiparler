<?php

	class QueryClass
	{
		private function getCon()
		{
			$con = mysql_connect("localhost","root","") or die("Error : Connection not Establish.");
			mysql_select_db("beauty") or die("Error : Database not found.");
		}
		
		public function Redirect($URL, $Msg = NULL)
		{
			$MessageString = '<script language="javascript" type="text/javascript">';
			if($Msg != NULL)
			{
				$MessageString .= "alert('".$Msg."');";
			}
			$MessageString .= " document.location.href='".$URL."'; </script>";
			return $MessageString;	
		}
	
		public function Insert($TableName,$FieldValues)
		{
			$con = $this->getCon();
			$FieldArray = array();
			$ValueArray = array();
			foreach($FieldValues as $Field=>$Value)
			{
				array_push($FieldArray,$Field);
				array_push($ValueArray,"'".mysql_real_escape_string($Value)."'");
			}
			
			$fieldString = implode(",",$FieldArray);
			$valueString = implode(",",$ValueArray);
			
			$str = "INSERT INTO $TableName($fieldString) VALUES($valueString)";
			
			mysql_query($str) or die("Error : Insert Query Problem.<br>".$str);
			$Id = mysql_insert_id();
			return $Id;
		}		

		public function NonQuery($query)
		{
			$con = $this->getCon();
			
			mysql_query($query) or die("Error : Insert Query Problem.<br>".$query);
			$Id = mysql_insert_id();
			return $Id;
		}		

		
		public function UPDATE($TableName,$FieldValues,$DataId)
		{
			$con = $this->getCon();
			
			$ValueArray = array();
			foreach($FieldValues as $Field=>$Value)
			{
				array_push($ValueArray,$Field."='".mysql_real_escape_string($Value)."'");
			}
			
			$valueString = implode(",",$ValueArray);
			
			$str = "UPDATE $TableName SET $valueString WHERE ".$DataId;
			
			mysql_query($str) or die("Error : Update Query Problem.<br>".$str);
			return 1;
		}		
		
		public function SELECTBYId($TableName,$IdArray)
		{
			$con = $this->getCon();
			$Field = array_keys($IdArray);
			$value = "'".$IdArray[$Field[0]]."'";
			$DelStr = "SELECT * FROM $TableName WHERE ".$Field[0]."=$value";
			$EdData = mysql_query($DelStr) or die("Error : select By ID Problem");
			$EdRows = mysql_fetch_assoc($EdData);
			return $EdRows;
		}
		
		public function SELECT($TableName,$FieldArr=NULL)
		{
			$con = $this->getCon();
			$Fields = "*";
			if($FieldArr != NULL)
			{
				$FieldArray = array();
				foreach($FieldArr as $Field)
				{
					array_push($FieldArray,$Field);
				}
				
				$Fields = implode(",",$FieldArray);
			}
			$str = "SELECT ".$Fields." FROM ".$TableName;
			$data = mysql_query($str) or die("Error : Select query Problem");
			$Num = mysql_num_rows($data);
			if($Num > 0)
			{
				$DataArray = array();
				while($Rows = mysql_fetch_assoc($data))
				{
					$DataArray[] = $Rows;
				}
				return $DataArray;
			}
			else
			{
				return 0;
			}
		}	

		public function SELECTbyJOIN($strQuery)
		{
			$con = $this->getCon();
			$data = mysql_query($strQuery) or die("Error : Select query Problem");
			$Num = mysql_num_rows($data);
			if($Num > 0)
			{
				$DataArray = array();
				while($Rows = mysql_fetch_assoc($data))
				{
					$DataArray[] = $Rows;
				}
				return $DataArray;
			}
			else
			{
				return 0;
			}
		}	

		public function DELETE($TableName,$Delarray)
		{
			$con = $this->getCon();
			$Field = array_keys($Delarray);
			$value = "'".$Delarray[$Field[0]]."'";
			$DelStr = "DELETE FROM $TableName WHERE ".$Field[0]."=$value";
			mysql_query($DelStr) or die("Error : Delete Problem");
			return 1;
		}
		
	}

?>