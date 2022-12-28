<?php
namespace app\helper;


class SiteHelper
{
    /**
     * Сортировка
     * @param $sort
     * @param $query
     * @return mixed
     */
    public static function sort($sort, $query){
        if ($sort != 1) {
            if ($sort == 'name-asc') {
                $query->orderBy(['title' => SORT_ASC]);
            }
            if ($sort == 'name-desc') {
                $query->orderBy(['title' => SORT_DESC]);
            }
            if ($sort == 'date-asc') {
                $query->orderBy(['created_at' => SORT_ASC]);
            }
            if ($sort == 'date-desc') {
                $query->orderBy(['created_at' => SORT_DESC]);
            }
        }
        return $query;
    }

}