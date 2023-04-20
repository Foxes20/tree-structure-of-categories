<?php

define("CUR_DIR", __DIR__.'./../');

require CUR_DIR . 'core/db.php';

    $db = new \core\db();

    for ($i = 0; $i <= 5000; $i++) {
        $rand = (rand(1, 99));
        $sql = "INSERT INTO `subcategories` (`parent_id`, `name`)
                                                    VALUES ($rand, ('category{$i}'))";

        mysqli_query($db->connect, $sql) or die (mysqli_error($db->connect));
    }
