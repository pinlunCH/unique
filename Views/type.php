<?php
include("admin_header.php");
?>
		<div class="contentbox">
			<h2>Type</h2>
			<div class="pt">
				<p>Here's the list of accommodation's type</p>
				<p>Click add new add new type</p>
				<p>You can edit type by click on edit icon</p>
			</div>
			<div class="line"></div>

			<?php
			if(isset($_GET['success'])){?>
			<h3 class="mesbox yougotit"><span>Yes! Type saved!</span></h3>
			<?php
			}
			?>


			<div class="buts">
				<a href="index.php?controller=admin&action=typeForm" class="button">Add New</a>
			</div>
			<div class="listing">
				<div class="listheader">
					<div class="header">
						<span>Name</span>
					</div>
					<div class="header">
						<span>Cover</span>
					</div>
					<div class="header">
						<span>Edit</span>
					</div>
				</div>
				<?php
				foreach($type_data as $type){
				?>
				<div class="listrow">
					<div class="data" id="radiusa">
						<a href="index.php?controller=admin&action=typeForm&id=<?=$type['id']?>"><?=$type['strName']?></a>
					</div>
					<div class="data">
						<?=$type['strCover']?>
					</div>
					<div class="data">
						<a href="index.php?controller=admin&action=typeForm&id=<?=$type["id"]?>"><img src="imgs/editicon.png" alt="edit"></a>
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