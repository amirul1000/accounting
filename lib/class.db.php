<?php

	class Db {
	
		var $hostname 		= '';		// Database host name 
		var $username 		= ''; 		// Database user name 
		var $password 		= '';		// Database Password
		var $databasename 	= '';		// Db database name
		var $linkid 		= false;	// Db connection handle
		var $result 		= false;	// boolean
		var $Errno 			= 0;
		var $Error 			= "";
		var $Record 		= array();
		var $Row;

		/* Constructor */
		function Db($hostname, $username, $password, $databasename, $linkid = false) {
			$this->hostname     = $hostname;
			$this->username     = $username;
			$this->password     = $password;
			$this->databasename = $databasename;
			$this->linkid       = $linkid;			
			$this->connect();	// Auto connect to the server
		}
	
		/* Establish connection with the server & database and return resource on success else boolean */
		function connect() {
			$this->linkid = @mysql_connect($this->hostname, $this->username, $this->password);
			if(!$this->linkid){
				$this->error("Could not connect with server!");
				return false;
			} else {
				$check = @mysql_select_db($this->databasename, $this->linkid);
				if ($check) {
					return $this->linkid;
				} else {
					$this->error("Could not connect with database!");
					return false;
				}
			}
		}
	
		/* */
		function f($Name) {
			return HTMLSpecialChars($this->Record[$Name]);
		}		
		
		/* public: walk result set */
		function next_record() {
			if (!$this->result) {
				//$this->halt("next_record called with no query pending.");
				return 0;
			}		
			$this->Record = @mysql_fetch_array($this->result);
			$this->Row += 1;
			$this->Errno = mysql_errno();
			$this->Error = mysql_error();
		
			$stat = is_array($this->Record);
			if (!$stat && $this->Auto_Free) {
				$this->free();
			}
			return $stat;
		}
		
		/* exeute sql statement */
		function execQuery($query) {
			$this->result = mysql_query($query,$this->linkid);
			if (!$this->result) {
				$this->error("Query execution failed!");
			}
			if ($this->result)
				return $this->result;
			else
				return NULL;
		}
		
		/* */
		function num_rows() {
			return @mysql_num_rows($this->result);
		}

		/* */
		function free() {
			@mysql_free_result($this->result);
			$this->result = 0;
		}
		
	
		/* */
		function resultArray() {
			$arinfo = array();
			$i = 0;
			while($data = mysql_fetch_assoc($this->result)) {
				while(list($key,$value) = each($data))
					$arinfo[$i][$key] = $value;
				$i++;
			}
			$this->freeResult($this->result);
			return $arinfo;
		}
		
		/* get last record, return int */
		function lastInsert($result){
			$insertid = NULL;
			$insertid = @mysql_insert_id($this->linkid);
			return $insertid;
		} 
		
		/* Release all memory associated with resultset, return int */
		function freeResult() {
			return @mysql_free_result($this->result);
		}
		
		/**
		* Closes non persistent link
		* @return boolean
		*/
		function close() {
			return @mysql_close($this->linkid);
		} //End function close()
		
		/**
		* Display error message
		* @param string $message
		*/
		function error($message) {
			$this->error = $message.' '.mysql_error().'.';
			echo $this->error;
		} // End function error
		
		function num_fields() {
			return @mysql_num_fields($this->result);
		}

		
		################Delete Record
		# Parameter : Table Name, $ Where clause
		####		
		function delete($info = null)
		{
			  if (isset($info['table']))
				  $table = $info['table'];
			  else
				  return null;
		
			  if (isset($info['where']))
				 $where = $info['where'];
			  else
				 $where = '1';
			
			$sql = "delete from ".$table." where ".$where;
			
			if($info['debug']==true)
				  echo $sql; 
				  
			$this->execQuery($sql);
		}
		
		
		 function select($info = null)
		   {
						 
			  if (isset($info['table']))
				  $table = $info['table'];
			  else
				  return null;
		
			  if (isset($info['fields']))
				 $fields = implode(',', $info['fields']);
			  else
				 $fields = '*';
		
			  if (isset($info['where']))
		
				 $where = $info['where'];
		
			  else
				 $where = '1';
				 
			
			  $sql = "SELECT $fields FROM $table WHERE $where";
              
			 if($info['debug']==true)
				  echo $sql; 

			  
			  
			  $this->execQuery($sql);
			  $arinfo = $this->resultArray();
			  return $arinfo;	
			}
		
		
		
		 function insert($info = null)
          {
				 $table   =  $info['table'];
				 $fields  =  $info['data'];
				 $where   =  $info['where'];
				 
				 foreach($fields as $key=>$value)
				 {
					$fieldsParam[] = $key;
					$fieldsValue[] = $value;
					
				 }
         
				 foreach ($fieldsValue as $key=>$value)
				 {
				  
				   $fieldsValue[$key] = $this->q($value);
					
				 }
      
				$fieldsParamStr  =  implode(',',$fieldsParam);
				$fieldsValueStr  =  implode(',',$fieldsValue);
        
				$sql     = 'INSERT INTO ' . $table . " ($fieldsParamStr) VALUES($fieldsValueStr)";
				
				if($info['debug']==true)
				    echo $sql; 

				
				return $this->execQuery($sql);
		}
		
		function   update($info)
          {

			  $table = (isset($info['table'])) ? $info['table'] : null;
			  $where = (isset($info['where'])) ? $info['where'] : 1;
			  $data  = (isset($info['data']))  ? $info['data']  : null;

		   // If table name or data not provided return false
			  if (! $table || ! $data)
				 return false;
		
			  $updateStr = array();
		
				 foreach($data as $key=>$value)
				 {
				  $updateStr[] = " $key =".$this->q($value);
				 }
		
				 $keyVal = implode(', ', $updateStr);
		  
				 $sql = "UPDATE $table  SET $keyVal WHERE $where";
				 
				
				 
				 if($info['debug']==true)
				    echo $sql; 
				  
				return $this->execQuery($sql);
	     }
		
		 function q($str = null)
	     {
		   return "'" . mysql_escape_string($str) . "'";
	     }
		
	}
?>