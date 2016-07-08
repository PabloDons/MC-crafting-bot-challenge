<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$recipes = json_decode(file_get_contents('./core/recipes.json',true));
$recipe = $recipes[array_rand($recipes)];
$all_items = scandir("items/");
$inventory = Array();
for ($i=0; $i<9*3; $i++) {
    if ($i < 9 and $recipe[$i]) {
        $items[] = $recipe[$i];
    } else {
        $items[] = array_rand($all_items);
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/master.css" charset="utf-8">
        <script src="scripts/jquery-migrate-1.4.1.min.js"></script>
        <script src="scripts/jquery-3.0.0.min.js"></script>
    </head>
    <body>
        <div id="main">
            <?php
            echo '<table id="inventory">';
            $last_iteration = false;
            for ($i=0; $i < count($inventory); $i++) {
                switch ($i) {
                    case 0:
                        echo '<tr>';
                        break;
                    case 1*9:
                        echo '</tr><tr>';
                        break;
                    case 2*9:
                        echo '</tr><tr>';
                        break;
                    case 3*9-1:
                        $last_iteration = true;
                        break;
                }
                echo "<td>{$inventory[$i]}</td>";
            }
            echo '</table>';
            ?>
        </div>
    </body>
</html>
