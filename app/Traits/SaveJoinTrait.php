<?php
namespace App\Traits;

trait SaveJoinTrait
{

    private function addId($str_ids, $id)
    {
        $redundant = false;

        if ($str_ids == '0') {
            $str_ids = $id;
        } else {
            $str_id_arr = explode(',', $str_ids);

            foreach ($str_id_arr as $str_id) {
                if ($str_id == $id) {
                    $redundant = true;
                }
            }

            if (!$redundant) {
                $str_ids = $str_ids . "," . $id;
            }
        }
        return $str_ids;

    }

    private function deleteId($str_ids, $id)
    {

        $pattern_1 = "/^$id,/";
        $pattern_2 = "/,$id,/";
        $pattern_3 = "/,$id$/";

        if (!strpos($str_ids, ",")) {
            $str_ids = '0';
        } elseif (preg_match($pattern_1, $str_ids)) {
            $str_ids = preg_replace($pattern_1, "", $str_ids);
        } elseif (preg_match($pattern_2, $str_ids)) {
            $str_ids = preg_replace($pattern_2, ",", $str_ids);
        } elseif (preg_match($pattern_3, $str_ids)) {
            $str_ids = preg_replace($pattern_3, "", $str_ids);
        }

        return $str_ids;
    }
}
