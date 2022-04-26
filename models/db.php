<?php
class DB
{
	var $host = 'localhost';
	var $user = 'root';
	var $password = '';
	var $database = 'book3';
	private $con;
	
	
	public function __construct()
	{
		$this->con = new mysqli($this->host, $this->user,$this->password,$this->database);

		return $this->con;	 
	}
		

	 function save($table, $fields, $condition = '')
	{
		$sql = "INSERT INTO $table SET ";

		if($condition != '')
		{
			$sql = "UPDATE $table SET ";
		}
		
		$table_fields = $this->get_table_fields($table);

		foreach($fields as $field=>$value)
		{
			if(in_array($field,$table_fields))
			{
				$sql .= "$field = '".addslashes($value)."', ";
			}
		}

		$sql = substr($sql, 0 ,-2);
		
		if($condition != '')
		{
			$sql .= " WHERE $condition";
		}
		
		$result = mysqli_query($this->con,$sql);

		if(mysqli_affected_rows($this->con))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	 function delete($table, $condition)
	{
		$sql = "DELETE FROM $table WHERE $condition";
		$result = mysqli_query($this->con,$sql);

		if(mysqli_affected_rows($this->con))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	 function select($table, $fields = array(), $condition = '',$order = '')
	{
		$data = array();
		$sql = "SELECT ";

		if(is_array($fields) && count($fields) > 0)
		{	
			$sql .= implode(", ",$fields);		
		}
		else
		{
			$sql .= "*";
		}

		$sql .= " FROM $table";

		if($condition != '')
		{
			$sql .= " WHERE $condition";
		}

		if($order != '')
		{
			$sql .= " ORDER BY $order";
		}

		$result = mysqli_query($this->con,$sql);

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$data[] = $row;
		}
		
		return $data	;
	}


	function get_table_fields($table)
	{
		$fields = array();
		$result = mysqli_query($this->con,"SHOW COLUMNS FROM $table");
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$fields[] = $row['Field'];
		}

		return $fields;
	}
}
?>