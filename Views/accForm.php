<?php
include("admin_header.php");
?>
<div class="contentbox">
	<h2>Accommodations</h2>

<?php
if(isset($_GET['id'])){?>
<div class="pt">
	<p class="bold"> Now You're Editing the accommodation</p>
</div>
<?php
}else{	?>
	<div class="pt">
	<p class="bold"> Now You're add new accommodation</p>
</div>
<?php
}?>
<div class="line"></div>
<div class="callback"><a href="index.php?controller=admin&action=accommodations">< Back</a></div>

<form method="post" class="wrapperForm"action="index.php?controller=admin&action=accSave" enctype="multipart/form-data">
	<input type="hidden" name="pageID" value="<?=$data['id']?>">
	<div class="formstyle">
		<label>Accommodations</label>
		<input type="text" name="strName" value="<?=$data['strName']?>">
	</div>
	<div class="formstyle">
		<label>Locations</label>
		<select name="nLocation">
			<option>Choose location</option>
			<?php
			foreach($location as $locat){
				$selected = ($data["location"] == $locat["strName"])? "SELECTED":"";
				?>
				<option <?=$selected?> value="<?=$locat['id']?>"><?=$locat['strName']?></option>
			<?php
			}
			?>
				
		</select>
	</div>
	<div class="formstyle">
		<label>Type</label>
		<select name="nType">
			<option>Choose type</option>
			<?php
			foreach($type as $t){
				$selected = ($data["nTypeID"] == $t["id"])? "SELECTED":"";
				?>
				<option <?=$selected?> value="<?=$t['id']?>"><?=$t['strName']?></option>
			<?php
			}
			?>
				
		</select>
	</div>
	<div class="formstyle">
		<label>Price</label>
		<input type="text" name="price" value="<?=$data['nPrice']?>">

	</div>
	<div class="formstyle">
		<label>Address</label>
		<input type="text" name="address" value="<?=$data['strAddress']?>">
	</div>
	<div class="formstyle">
		<label>Check-in</label>
		<input type="text" name="checkin" value="<?=$data['checkInTime']?>">
	</div>
	<div class="formstyle">
		<label>Check-out</label>
		<input type="text" name="checkout" value="<?=$data['checkoutTime']?>">
	</div>
	<div class="formstyle">
		<label>Guests</label>
		<input type="text" name="guest" value="<?=$data['nGuests']?>">
	</div>
	<div class="formstyle">
		<label>Bedroom</label>
		<input type="text" name="bedroom" value="<?=$data['nBedroom']?>">
	</div>
	<div class="formstyle">
		<label>Bath</label>
		<input type="text" name="bath" value="<?=$data['nBath']?>">
	</div>
	<div class="formstyle">
		<label>Detail</label>
		<textarea name="detail"><?=$data['strDetails']?></textarea>
	</div>

	<div class="formstyle">
		<label>Cover Photo</label>
		<input type="file" id="ex" name="coverphoto" value="<?=$data['strCover']?>">
	</div>
	<div class="preview">
		<?php
		if($data['strCover']){?>
			<img src="assets/<?=$data["strCover"]?>" alt="best tourism online company"/>
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