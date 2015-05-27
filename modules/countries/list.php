<?php
	$object_country = new country();
	$country_list = $object_country->returnAllCountries();
?>
<h1 class="pageTitle"><?= $language["mod_country"]["list_title"]?></h1>
<div class="user-list">
	<div class="button-area">
		<a href="<?= $configuration["path-bo"] ?>/0/country/0/add" class="green"><i class="fa fa-plus"></i></a>
	</div>

	<table class="db-list">
		<tr>
			<th><?= $language["mod_country"]["table_id"]?></th>
			<th><?= $language["mod_country"]["table_iso3"]?></th>
			<th><?= $language["mod_country"]["table_short_name"]?></th>
			<th><?= $language["mod_country"]["table_email"]?></th>
			<th><?= $language["mod_country"]["table_status"]?></th>
			<th><?= $language["mod_country"]["table_sel"]?></th>
		</tr>
		<?php
		if (count($country_list) != 0) {
			$line_tpl = file_get_contents("modules/countries/templates-e/line.html");

			foreach($country_list as $country){
				if ($country["status"]) {
					$enable = sprintf("<img src=\"%s/site-assets/images/icon_on.png\" alt=\"on\" title=\"publicado\"/>", $configuration["path-bo"]);
				} else {
					$enable = sprintf("<img src=\"%s/site-assets/images/icon_off.png\" alt=\"off\"  title=\"não publicado\"/>", $configuration["path-bo"]);
				}
				print str_replace(
					array(
						"{c2r-id}",
						"{c2r-iso3}",
						"{c2r-short-name}",
						"{c2r-email}",
						"{c2r-status}",
						"{c2r-path-bo}",
						"{c2r-confirm}"
					),
					array(
						$country["id"],
						$country["iso3"],
						$country["short_name"],
						(!empty($country["email"])) ? $country["email"] : "##null##",
						$enable,
						$configuration["path-bo"],
						$language["template"]["areyousure"]
					),
					$line_tpl
				);
			}
		}else {
			print str_replace(
					"{c2r-noresults}",
					$language["template"]["noresults"],
					file_get_contents("modules/countries/templates-e/line-noresults.html")
				);
		}
		?>
	</table>

	<div class="button-area">
		<a href="<?= $configuration["path-bo"] ?>/0/country/0/add" class="green"><i class="fa fa-plus"></i></a>
	</div>

</div>
