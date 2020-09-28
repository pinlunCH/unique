<?php
move_uploaded_file($_FILES["coverphoto"]["tmp_name"], "assets/".$_FILES["coverphoto"]["name"]);

$_POST['coverphoto'] = $_FILES["coverphoto"]["name"];


if (!$_POST["pageID"]) {

	$sql = "
	INSERT INTO 
	pages( strName, strMainContent, strMainPhoto, strGroupOfPhotoA,strGroupOfPhotoB,strGroupOfPhotoC,strIntroTitleA,strIntroTextA,strIntroTitleB,strIntroTextB, strIntroTitleC,strIntroTextC,nTemplatesID)
	VALUES('".$_POST['strName']."', '".$_POST['strMainContent']."', '".$_POST['strMainPhoto']."','".$_POST['strGroupOfPhotoA']."','".$_POST['strGroupOfPhotoB']."','".$_POST['strGroupOfPhotoC']."','".$_POST['strIntroTitleA']."','".$_POST['strIntroTextA']."','".$_POST['strIntroTitleB']."','".$_POST['strIntroTextB']."','".$_POST['strIntroTitleC']."','".$_POST['strIntroTextC']."','".$_POST['nTemplatesID']."')
	";

}else{
	$sql ="
	UPDATE `pages` 
	SET 
	`strName` = '".$_POST['strName']."', 	
	`strMainContent` = '".$_POST['strMainContent']."',	
	`strMainPhoto` = '".$_POST['strMainPhoto']."', 	
	`strGroupOfPhotoA` = '".$_POST['strGroupOfPhotoA']."', 
	`strGroupOfPhotoB` = '".$_POST['strGroupOfPhotoB']."',
	`strGroupOfPhotoC` = '".$_POST['strGroupOfPhotoC']."', 
	`strIntroTitleA` = '".$_POST['strIntroTitleA']."',
	`strIntroTextA` = '".$_POST['strIntroTextA']."',
	`strIntroTitleB` = '".$_POST['strIntroTitleB']."',	
	`strIntroTextB` = '".$_POST['strIntroTextB']."',
	`strIntroTitleC` = '".$_POST['strIntroTitleC']."',
	`strIntroTextC` = '".$_POST['strIntroTextC']."',
	`nTemplatesID` = '".$_POST['nTemplatesID']."'


	WHERE pages.id = '".$_POST["pageID"]."'
	";
}
//  print_r($sql);
//  print_r($_POST);
// print_r($_FILES);
 mysqli_query($con, $sql);
//  print_r($sql);
// die;


header("location: page.php?success=true");


?>

<!-- INSERT INTO `pages` (`id`, `strName`, `nTemplatesID`, `strPageHeader`, `strMainContent`, `strPrimaryImage`) VALUES (NULL, 'hello', '2', 'hello', 'this is hello page', ''); -->

<!-- UPDATE `pages` SET `strName` = 'homeagain', `nTemplatesID` = '2', `strPageHeader` = 'Welcome home', `strMainContent` = 'this is home page afer edit' WHERE `pages`.`id` = 1;  -->