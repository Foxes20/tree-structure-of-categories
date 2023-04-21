<?php

define("CUR_DIR", __DIR__.'./../');

require CUR_DIR . 'core/db.php';
$db = new \core\db();

for ($i = 0; $i <= 100; $i++) {
    $rand = (rand(1, 99));

    if ($i % $rand == 0) {

        $sql = "INSERT INTO `subcategories` (`parent_id`, `name`)
                                                    VALUES (NULL, 'category{$i}')";
        mysqli_query($db->connect, $sql) or die (mysqli_error($db->connect));

    } else {

        $sql = "INSERT INTO `subcategories` (`parent_id`, `name`)
                                                    VALUES ($rand, 'category{$i}')";
        mysqli_query($db->connect, $sql) or die (mysqli_error($db->connect));
    }
}
