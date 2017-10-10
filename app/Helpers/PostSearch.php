<?php
/**
 * Created by PhpStorm.
 * User: sr
 * Date: 12/27/15
 * Time: 11:54 AM
 */

namespace app\Helpers;

use Illuminate\Support\Facades\DB;


class PostSearch
{
    /**
     * @param array $q :: array of Data
     * @param $model :: model
     * @return mixed
     */
    public static function search(array $q, $model){
        $model = $model;
        foreach ($q as $column => $term)
        {
            if (! empty($term))
            {
                $result = $model->where($column, 'LIKE', "$term%");
            }
        }
        $result = $result->get();

        return $result;
    }
}