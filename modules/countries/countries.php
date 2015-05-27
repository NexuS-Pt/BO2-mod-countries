<div class="countries">
    <?php
    if ($a != null) {
        switch ($a) {
            case "add": include "modules/countries/add.php";
				break;
            case "delete": include "modules/countries/delete.php";
				break;
            case "edit": include "modules/countries/edit.php";
                break;
            default: include "modules/countries/list.php";
        }
    } else {
        include "modules/countries/list.php";
    }
    ?>
</div>
