<?php
include("admin_header.php");
?>
<div class="contentbox">
	<h2>Type</h2>

<?php
if(isset($_GET['id'])){?>
<div class="pt">
	<p class="bold"> Now You're Editing the type</p>
</div>
<?php
}else{	?>
	<div class="pt">
	<p class="bold"> Now You're add new type</p>
</div>
<?php
}?>
<div class="line"></div>
<div class="callback"><a href="index.php?controller=admin&action=type">< Back</a></div>

<form method="post" class="wrapperForm"action="index.php?controller=admin&action=typeSave" enctype="multipart/form-data">
	<input type="hidden" name="pageID" value="<?=$data['id']?>">
	<div class="formstyle">
		<label>Type Name</label>
		<input type="text" name="strName" value="<?=$data['strName']?>">
    </div>
	<div class="formstyle">
		<label>Cover Photo</label>
		<input type="file" id="ex" name="coverphoto" value="<?=$data['strCover']?>">
	</div>
	<div class="preview">
		<?php
		if($data['strCover']){?>
			<img src="assets/<?=$data["strCover"]?>" alt="best tourism company"/>
		<?php
		}
		?>
	</div>
		
		<div class="formstyle">
		<input type="submit" class="button" value="Save">
	</div>
</form>

	</div><!--end of wrapper-->	
</div><!--end of outter-->	
<script src="libs/showMenu.js"></script>
<script src="libs/modal.js"></script>
</body>
</html>