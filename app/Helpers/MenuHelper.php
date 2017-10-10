<?php
/**
 * Created by PhpStorm.
 * User: sr
 * Date: 12/29/15
 * Time: 10:37 AM
 */

namespace App\Helpers;

use App\Menu;


class MenuHelper
{

    public static function getMenu()
    {
        $menu_type_id = 1;
        $parent = 3;
        $result = static::getMenuRecursive($menu_type_id, $parent);
        return $result;
    }

    private static function getMenuRecursive($menu_type_id, $parent)
    {
        $items = Menu::where('menu_type_id',$menu_type_id)
            ->where('parent',$parent)
            ->orderBy('order', 'ASC')
            ->get();


        $result = [];
        foreach ($items as $item) {
            $result[] = [
                'name' => $item->name,
                'url' => $item->url,
                //'<li class="divider"></li>',
                //'items' => static::getMenuRecursive($item['id']),
                'items' => static::getMenuRecursive($menu_type_id, $item->id),
            ];
        }
        print_r($result);
        exit();

        #return $result;
    }

}