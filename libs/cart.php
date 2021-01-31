<?php


class Cart
{



    static function set($obj)
    {
        setcookie("p_cart", json_encode($obj), time() + (86400 * 7), '/');
    }


    static function get()
    {
        if (isset($_COOKIE["p_cart"])) {
            $result =  $_COOKIE["p_cart"];
            return json_decode($result);
        } else {
            return [];
        }
    }

    static function add($item)
    {
        $list = [];
        if (isset($_COOKIE["p_cart"])) {
            $list = json_decode($_COOKIE["p_cart"]);

            $check = false;
            foreach ($list as $value) {
                if ($value->Id == $item->Id) {
                    $check = true;
                    $value->Number = $item->Number;
                }
            }

            if (!$check) {
                $list[] = $item;
            }
        } else {
            $list[] = $item;
        }


        setcookie("p_cart", json_encode($list), time() + (86400 * 7), '/');
    }

    static function update($item)
    {
        $newList = array();
        $oldList =  json_decode($_COOKIE["p_cart"]);
        foreach ($oldList as $value) {
            if ($value->Id == $item->Id) {
                $newList[] = $item;
            } else {
                $newList[] = $value;
            }
        }

        setcookie("p_cart", json_encode($newList), time() + (86400 * 7), '/');
    }

    static function delete($id)
    {
        $newList = array();
        $oldList =  json_decode($_COOKIE["p_cart"]);
        foreach ($oldList as $value) {
            if ($value->Id != $id) {
                $newList[] =  $value;
            }
        }

        setcookie("p_cart", json_encode($newList), time() + (86400 * 7), '/');
    }
}
