<?php
include("admin_header.php");
?>
		<div class="contentbox">
			<h2>Hi,</h2>
			<h2><?=$user["strFirstName"]?></h2>
			<div class="line"></div>
			<h3>Welcome to content manage system</h3>
			<h3 id="mag">Few things to know before you start.</h3>
			<div class="teach">
				<div id="conicona"></div><p>Minimizing the Menu.</p>
			</div><!--end of teach-->
			<div class="teach">
				<div id="coniconb"></div><p>Intro of CMS.</p>
			</div><!--end of teach-->
			<div class="teach">
				<div id="coniconc"></div><p>Where you can manage your website pages.</p>
			</div><!--end of teach-->
			<div class="teach">
				<div id="conicond"></div><p>Manage your navigation for web pages.</p>
			</div><!--end of teach-->
			<div class="teach">
				<div id="conicone"></div><p>Update or delete the dog infomation for adoption</p>
			</div><!--end of teach-->
			<div class="teach">
				<div id="coniconf"></div><p>Have a question? Find your answers here. </p>
			</div><!--end of teach-->
			<div class="teach">
				<div id="conicong"></div><p>User, when you hover over will
				show the link to your profile and message logout bottom.</p>
			</div><!--end of teach-->
			<div class="line"></div>
			<h3 id="al">Alright! <?=$eachUser["strFirstname"]?> You're all set!</h3>  
			
		</div><!--end of contentbox-->	
	</div><!--end of wrapper-->	
</div><!--end of outter-->	

<script src="js/showMenu.js"></script>
</body>
</html>