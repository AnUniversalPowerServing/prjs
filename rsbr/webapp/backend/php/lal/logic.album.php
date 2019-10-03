<?php
class Album {
	function get_listOfAlbums($folderpath) {
		$StringData='';
		$contentArry=scandir($folderpath);
		for($index=0;$index<count($contentArry);$index++) {
			if($contentArry[$index]!='.' && $contentArry[$index]!='..') {
				$StringData.=$contentArry[$index].'|';
			}
		}
		$StringData=chop($StringData,'|');
	   return $StringData;
	}
	
	function get_listOfFiles($folderpath) {
		// $files1=scandir($folderpath);
		$content='';
		$files1=array_diff(scandir($folderpath), array('..', '.'));
		for($index=2;$index<count($files1)+2;$index++) {
			$content.=$files1[$index].'|'; // 
		}
		$content=chop($content,'|');
		/* if (is_dir($folderpath)) {
			if ($dh = opendir($folderpath)) {
				while (($file = readdir($dh)) !== false) {
					if(is_file($file)) {
						echo "filename: .".$file."<br />";
					}
					else if(!is_dir($file)) {
						echo "folder: .".$file."<br />";
					}
					
				}
				closedir($dh);
			}
		} */
		return $content;
	}
	
	function check_albumExistOrnot($folderpath,$albumName) {
		$status='NOT_EXISTS';
		
			
		$contentArry=scandir($folderpath);
		for($index=0;$index<count($contentArry);$index++) {
			if($contentArry[$index]!='.' && $contentArry[$index]!='..') {
				if($albumName==$contentArry[$index]) {
					$status='EXISTS';
				}
			}
		}
		return $status;
	}
	
	function delete_album($folderpath,$albumName) {
		$status='ALBUM_NOT_DELETED';	
		if(rmdir($folderpath.'/'.$albumName)) {
			$status='ALBUM_DELETED';
		}
	}
}
?>