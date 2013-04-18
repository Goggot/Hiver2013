<div class="logo"></div>

<div class="searchStart">
	<form action="index.php" method="get">
		<input type="text" style="width:200px" name="url" /> <input type="submit" value="Lire" />
	</form>
</div>
<div>
	<?php
		if (isset($_GET["url"])){
			$rss = $action->getListe();
			foreach ($rss as $one){
				echo $one->title;
				?></br><?php
				echo $one->description;
				?></br><?php
				echo $one->link;
				?></br><?php
				echo $one->pubDate;
				?></br></br><?php
			}
		}
	?>
</div>
