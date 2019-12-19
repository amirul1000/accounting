<?php
/**
 * Multi-files upload class
 * 
 */
class Upload {
	var $max_upload_size = "268435456";	//max upload file byte (256M)
	var $_FILES          = "";		    //post files
	var $overwrite       = "1";		    //is over write
	var $mode            = 0777;	    //upload file mode
		
	var  $error           = "";
	
	function Upload($_FILES) {
		$this->FILES = $_FILES;
	}
	
	function uploadFile($srcfile, $dstfile) {
		if (is_file($dstfile)) {
			if ($this->overwrite) {
				@unlink($dstfile) or $this->error .= "unable to overwrite $dstfile<br>";
			} else { 
			    return 1;
			}
		}
		@copy($srcfile, $dstfile) or $this->error .= "unable to upload $srcfile to $dstfile<br>";
		$isok = @chmod($dstfile, $this->mode) or $this->error .= is_file($dstfile)."change permissions for:$dstfile<br>";
		if ($isok) {
		    return $isok;
		} 
	}
	
	function error() {
		return $this->error;
	}
	
	function save($field, $dir, $file_name="") {
		$size = $this->FILES[$field]['size'];
		if (is_array($size)) {
			$size = 0;
		}
		if ($size > 0 && $size <= $this->max_upload_size) {
			$this->error = $this->FILES[$field]['error'];
			$tmp_file  = $this->FILES[$field]['tmp_name'];
			$file_type = $this->FILES[$field]['type'];
			//echo $file_name;
			if (!$file_name) { 
				$file_name = $this->FILES[$field]['name'];
			    $save_path_file = $dir."/".strtolower($file_name);
			}
			$isok = $this->uploadFile($tmp_file, $save_path_file);
			if ($isok) {
				return $isok;
			}
		} else if ($size > $this->max_upload_size) {
			$this->error .= "file size($size) exceeds max file size: $this->max_upload_size<br>";
		} else if ($size == 0) {
			$this->error .= "File size is 0 bytes<br>";
		    return 0;
		}
	}
	
	function multiSave($field, $dir) {
		$field_names = $this->FILES[$field]['name'];
		if (is_array($field_names)) {
			while(list($key, $file_name) = each($field_names)) {
				if (!$file_name) continue;
				$tmp_file = $this->FILES[$field]['tmp_name'][$key];
				$file_name = strtolower($file_name);
				$file_size = $this->FILES[$field]['size'][$key];
				//echo $file_size;
				if ($file_size > 0 && $file_size <= $this->max_upload_size) {
					$isok = $this->uploadFile($tmp_file,"$dir/$file_name");
				} 
				else if ($file_size > $this->max_upload_size) {
					$this->error .= "$file_name:file size exceeds max file size: $this->max_upload_size<br>";
				} 
				else {
					$this->error .= "$file_name:File size is 0 bytes<br>";
				}
				
			}
		} else {
			return $this->save($field, $dir);
		}
		return $isok;
	}
}

?>
