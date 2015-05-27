# HOW TO INSTALL

1 - Add this code to your backoffice **includes.php** file:

``case "logout": include "modules/logout/logout.php"; break;``

2 - Add this code to backoffice > modules > menu > **menu.php** file:

``<a href="{c2r-path-bo}/0/country/">{c2r-menu-country}</a>``

3 - Add this code to your backoffice > backoffice.php file, to array in line 137:

``"{c2r-menu-country}"``

4 - Add this code to your backoffice **language (eg.: en.ini)** file:

```
[mod_country]
add_title = "Add Country"
edit_title = "Edit Country"
delete_title = "Delete Country"
list_title = "Countries List"
table_id = "#"
table_iso3 = "ISO3"
table_short_name = "Short Name"
table_email = "Email"
table_status = "Status"
table_sel = "Sel."
```

4-1 - In item **[menu]**:

``menu_country = "Countries"``

!IMPORTATNT! Verify the position of the point 3, need to be the same.

5 - Add this code to your backoffice **header** file:

``include "class/class.country.php";``

6 - Import the **prefix_countries.sql** file to your Data Base
