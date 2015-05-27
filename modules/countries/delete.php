<h1 class="pageTitle"><?= $language["mod_country"]["delete_title"]?></h1>
<?php
	if ($id !== null) {
		$country = new country();
		$country->setId($id);
		$country_data = $country->returnOneCountry();

		if ($country->delete()) {
			print  $language["actions"]["success"];
		} else {
			print  $language["actions"]["failure"];
		}
	}else{
		print  $language["actions"]["error"];
	}
