<?php
include("admin_header.php");
?>
		<div class="contentbox">
			<h2>Accommodations</h2>
			<div class="pt">
				<p>Here's the list of accommodations</p>
				<p>Click add new accommodations to add a new accommodation</p>
				<p>You can edit accommodation by click on edit icon</p>
			</div>
			<div class="line"></div>

			<?php
			if(isset($_GET['success'])){?>
			<h3 class="mesbox yougotit"><span>Yes! accommodation saved!</span></h3>
			<?php
			}
			?>
			<?php
			if(isset($_GET['successdelete'])){?>
			<h3 class="mesbox yougotit"><span>The page was deleted</span></h3>
			<?php
			}
			?>

			<div class="buts">
				<a href="index.php?controller=admin&action=accForm" class="button">Add New</a>
			</div>
			<div class="listing">
				<div class="listheader">
					<div class="header">
						<span>Name</span>
					</div>
					<div class="header">
						<span>Location</span>
					</div>
					<div class="header">
						<span>Type</span>
					</div>
					<div class="header">
						<span>Price</span>
					</div>
					<div class="header">
						<span>Address</span>
					</div>
					<div class="header">
						<span>Ckeckin</span>
					</div>
					<div class="header">
						<span>Ckeckout</span>
					</div>
					<div class="header">
						<span>Guests</span>
					</div>
					<div class="header">
						<span>Bedroom</span>
					</div>
					<div class="header">
						<span>Bath</span>
					</div>
					<div class="header">
						<span>Detail</span>
					</div>
					<div class="header">
						<span>Cover</span>
					</div>
					<div class="header">
						<span>Edit</span>
					</div>
				</div>
				<?php
				foreach($data as $accommodation){
				?>
				<div class="listrow">
					<div class="data" id="radiusa">
						<a href="index.php?controller=admin&action=accForm&id=<?=$accommodation['id']?>"><?=$accommodation['strName']?></a>
					</div>
					<div class="data">
						<?=$accommodation['location']?>
					</div>
					<div class="data">
						<?=$accommodation['type']?>
					</div>
					<div class="data">
						<?=$accommodation['nPrice']?>
					</div>
					<div class="data">
						<?=$accommodation['strAddress']?>
					</div>
					<div class="data">
						<?=$accommodation['checkInTime']?>
					</div>
					<div class="data">
						<?=$accommodation['checkoutTime']?>
					</div>
					<div class="data">
						<?=$accommodation['nGuests']?>
					</div>
					<div class="data">
						<?=$accommodation['nBedroom']?>
					</div>
					<div class="data">
						<?=$accommodation['nBath']?>
					</div>
					<div class="data longconent">
						<?=$accommodation['strDetails']?>
					</div>
					<div class="data">
						<?=$accommodation['strCover']?>
					</div>
					<div class="data">
						<a href="index.php?controller=admin&action=accForm&id=<?=$accommodation["id"]?>"><img src="imgs/editicon.png" alt="edit"></a>
					</div>
				</div>	
				<div class="edage"></div>
				<?php		
			}
			?>
				<div class="edage"></div>
			</div>
		</div>
	</div><!--end of wrapper-->	
</div><!--end of outter-->	
<script src="js/showMenu.js"></script>
<script>
</script>
</body>
</html>