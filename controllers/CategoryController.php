<?php
namespace controllers;

class categoryController
{
    public function index()
    {
        function get_cat() {
            $db = new \core\db();
            $arr_cat = [];

            $sql = "SELECT * FROM subcategories";
            $result = mysqli_query($db->connect, $sql);
            if (!$result) {
                return NULL;
            }

            if (mysqli_num_rows($result) !== null) {
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                    if (empty($arr_cat[$row['parent_id']])) {
                        $arr_cat[$row['parent_id']] = [];
                    }
                    $arr_cat[$row['parent_id']][] = $row;
                }
                return $arr_cat;
            }
        }
        $result = get_cat();
        $view = new \core\view('main', ['result' => $result]);
        $view->render();
    }

    public function show()
    {
        $db = new \core\db();
        $arr_new = [];
        $id = $db->escape($_GET['category_id']);

        $query = "SELECT * FROM `subcategories` WHERE id = '" . $id . "'";
        $result = mysqli_query($db->connect, $query) or die(mysqli_error($db->connect));
        $output = mysqli_fetch_assoc($result) or die(mysqli_error($db->connect));

        $arr_new[] = ['name' => $output['name'], 'id' => $output['id']];
        while (isset($output['parent_id'])) {
            $query = "SELECT * FROM `subcategories` WHERE id = '" . $output['parent_id'] . "'";
            $result = mysqli_query($db->connect, $query) or die(mysqli_error($db->connect));
            $output = mysqli_fetch_assoc($result) or die(mysqli_error($db->connect));
            $arr_new[] = ['name' => $output['name'], 'id' => $output['id']];
        }
        $view = new \core\view('/cat', ['arr_new' => array_reverse($arr_new)]);
        $view->render();
    }
}
