<?php

function view_cat($arr, $parent_id = null)
{
    if (empty($arr[$parent_id])) {
        return;
    }
    echo '<ul>';

    for ($i = 0; $i < count($arr[$parent_id]); $i++) {
        echo '<li><a href="/cat?category_id=' . $arr[$parent_id][$i]['id'] .
            '&parent_id='.$parent_id.'">'
            . $arr[$parent_id][$i]['name'] . '</a>';
        view_cat($arr, $arr[$parent_id][$i]['id']);
        echo '</li>';
    }
    echo '</ul>';
}

function getRequestPath() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return ltrim(str_replace('index.php', '', $path), '/');
}
