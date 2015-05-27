<h1 class="pageTitle"><?= $language["mod_country"]["add_title"]; ?></h1>
	<?php
	if (!isset($_POST["save"])) {
	?>
	<form method="post">
		<span id="label"><?= $language["form"]["label_iso2"]; ?></span>
		<input type="text" name="iso2" />
        <span id="label"><?= $language["form"]["label_iso3"]; ?></span>
		<input type="text" name="iso3" />
        <span id="label"><?= $language["form"]["label_short_name"]; ?></span>
		<input type="text" name="short_name" />
        <span id="label"><?= $language["form"]["label_long_name"]; ?></span>
		<input type="text" name="long_name" />
        <span id="label"><?= $language["form"]["label_numcode"]; ?></span>
		<input type="text" name="numcode" />
        <span id="label"><?= $language["form"]["label_un_member"]; ?></span>
		<input type="text" name="un_member" />
        <span id="label"><?= $language["form"]["label_calling_code"]; ?></span>
		<input type="text" name="calling_code" />
        <span id="label"><?= $language["form"]["label_cctld"]; ?></span>
		<input type="text" name="cctld" />
        <span id="label"><?= $language["form"]["label_email"]; ?></span>
		<input type="email" name="email" />
		<span id="label"><?= $language["form"]["label_status"]; ?></span>
		<select name="status">
			<option value="null"><?= $language["form"]["label_status_sel"]; ?></option>
			<option value="1"><?= $language["form"]["label_status_sel_enable"]; ?></option>
			<option value="0"><?= $language["form"]["label_status_sel_disable"]; ?></option>
		</select>
		<div class="separator30"></div>

		<div class="bottom-area">
			<button class="green" title="save" type="submit" name="save"><i class="fa fa-floppy-o"></i></button>
			<button class="red" title="cancel" type="reset" name="cancel"><i class="fa fa-times"></i></button>
		</div>
	</form>
	<?php
	} else {
		if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$country = new country();
			$country->setIso2($_POST["iso2"]);
			$country->setIso3($_POST["iso3"]);
			$country->setShortName($_POST["short_name"]);
			$country->setLongName($_POST["long_name"]);
			$country->setNumCode($_POST["numcode"]);
			$country->setUnMember($_POST["un_member"]);
			$country->setCallingCode($_POST["calling_code"]);
			$country->setEmail($_POST["email"]);
			$country->setStatus((bool)$_POST["status"]);


			if ($country->insert()){
				print $language["actions"]["success"];
			} else {
				print $language["actions"]["failure"];
			}
		} else {
			print $language["form"]["label_email_invalid"];
			print "<script type=\"text/javascript\">setTimeout(goBack(),2000);</script>";
		}
	}
