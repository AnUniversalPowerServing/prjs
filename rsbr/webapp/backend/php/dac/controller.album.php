<?php
require_once '../lal/logic.album.php';

class delete_album {
	function deleteAlbum($path) {
	  $status='FOLDER_NOT_DELETED';
			 foreach(glob("{$path}/*") as $file) {
				if(is_dir($file)) { 
					deleteAlbum($file);
				} else {
					unlink($file);
				}
			}
			rmdir($path);
			$status='FOLDER_DELETED';
	  return $status;
	}
}

 $folderpath="../../../uploads/gallery";
 
 if(isset($_GET["action"])) {
     if($_GET["action"]=='moveAlbum'){ 
		if(isset($_GET["fromAlbum"]) && isset($_GET["toAlbum"])) {
		  $fromAlbum=$_GET["fromAlbum"];
		  $toAlbum=$_GET["toAlbum"];
		  $albumList=$_GET["albumList"];
		  $albumObj=new Album();
		  $status=$albumObj->check_albumExistOrnot($folderpath, $toAlbum);
		  if($status=='NOT_EXISTS') { mkdir($folderpath."/".$toAlbum); }
		  for($index=0;$index<count($albumList);$index++){
		   $source=$folderpath.'/'.$fromAlbum.'/'.$albumList[$index];
		   $dest=$folderpath.'/'.$toAlbum.'/'.$albumList[$index];
		   echo $source." ".$dest;
		   if(copy($source, $dest)){ echo 'Copied';unlink($source); }
		   else { echo 'Failed to Copy'; }
		  }
		} else { echo 'MISSING_FROMTO_ALBUM'; }
	}
	else if($_GET["action"]=='createAlbum') {
		if(isset($_GET["albumName"])) {
			$albumName=$_GET["albumName"];
			$albumObj=new Album();
			$status=$albumObj->check_albumExistOrnot($folderpath, $albumName);
			if($status=='NOT_EXISTS') {
				mkdir($folderpath."/".$albumName);
				echo 'CREATED_NEW_ALBUM';
			}
			else {
				echo 'ALBUM_ALREADY_EXISTS';
			}
		} else {
			echo "MISSING_ALBUM_NAME";
		}
	}
	else if($_GET["action"]=='viewlistOfAlbum') {
		$albumObj=new Album();
		echo $albumObj->get_listOfAlbums($folderpath);
	}
	else if($_GET["action"]=='checkAlbumExists') {
		if(isset($_GET["albumName"])) {
			$albumName=$_GET["albumName"];
			if (is_dir($folderpath.'/'.$albumName)) {
				echo "ALBUM_EXISTS";
			} else {
				echo "ALBUM_NOT_EXISTS";
			}
			// $albumObj=new Album();
			//echo $albumObj->check_albumExistOrnot($folderpath, $albumName);
			
		} else {
			echo "MISSING_ALBUM_NAME";
		}
	}
	else if($_GET["action"]=='deleteAlbum') {
		if(isset($_GET["albumName"])) {
			$albumName=$_GET["albumName"];
			$albumObj=new Album();
			echo delete_album($folderpath,$albumName);
		} else {
			echo "MISSING_ALBUM_NAME";
		}
	}
	else if($_GET["action"]=='deleteAfileInMainFolder') {
			if(isset($_GET["fileName"])) {
				$status="FILE_NOT_DELETED";
				$fileName=$_GET["fileName"];
				$dir=$folderpath;
				if($dh = opendir($dir)){
					while(($file = readdir($dh)) !== false) {
						 if($file==$fileName) {
						     unlink($dir.'/'.$file);
							 $status="FILE_DELETED";
						 }
					}
				}
			} else {
				echo "MISSING_FILE_NAME";
			}
		
	}
	else if($_GET["action"]=='albumFileNames') {
		if(isset($_GET["albumName"])) {
			$stringfile='';
			$albumName=$_GET["albumName"];
			$dir=$folderpath.'/'.$albumName;
			if(is_dir($dir)){
				if($dh = opendir($dir)){
					while(($file = readdir($dh)) !== false){
						$stringfile=$file."|";
					}
					$stringfile=chop(stringfile,'|');
					closedir($dh);
				}
			}
			echo $stringfile;
		} else {
			echo "MISSING_ALBUM_NAME";
		}
	}
	else if($_GET["action"]=='deleteAfolder') {
		if(isset($_GET["albumName"])) {
			$path=$folderpath.'/'.$_GET["albumName"];
			$albumObj=new delete_album();
			$status=$albumObj->deleteAlbum($path);
			echo $status;
		}
	}
	else if($_GET["action"]=='deleteAfile') {
		if(isset($_GET["albumName"])) {
			if(isset($_GET["fileName"])) {
				$status="FILE_NOT_DELETED";
				$albumName=$_GET["albumName"];
				$fileName=$_GET["fileName"];
				$dir=$folderpath.'/'.$albumName;
				if($dh = opendir($dir)){
					while(($file = readdir($dh)) !== false) {
						 if($file==$fileName) {
						     unlink($dir.'/'.$file);
							 $status="FILE_DELETED";
						 }
					}
				}
			} else {
				echo "MISSING_FILE_NAME";
			}
		} else {
			echo "MISSING_ALBUM_NAME";
		}
	}
	else if($_GET["action"]=='viewFilesInFolder') {
		$albumName=$_GET["albumName"];
		$dir=$folderpath.'/'.$albumName;
		$albumObj=new Album();
		echo $albumObj->get_listOfFiles($dir);
	}
	else {
		echo "INVALID_ACTION_INPUT";
	}
	
	
 }
 else {
	echo "MISSING_ACTION_INPUT";
 }
?>