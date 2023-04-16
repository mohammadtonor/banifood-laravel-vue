<?php

namespace App\Lib;

use App\Location;
use App\Menu;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function ParentLocationName($id)
    {
        $location = Location::find($id) ;

        return $id== 0?  "ستاد مرکزی" : $location->title;
    }

    public static function getParentLocName($id)
    {
        $loc = Location::find($id);
        $locParent = Location::find($loc->parent_id);
        return $locParent->title;

    }

    public static function getLocationName($id)
    {
        $location = Location::find($id);

        return $location->title;
    }


    public static function date($date )
    {
        $d = new Verta($date);
        return $d->year. '-' .$d->month. '-' .$d->day ;
        //return Verta::createJalaliDate($date);
    }

    public static function week($date)
    {
        $d = new Verta($date);
        return $d->formatWord('l');
    }

    public static function mergeMealTdd(int $id)
    {
        $search = [];
        $j = 0;
        $menus = Menu::all();
        $item = Menu::find($id);
        $result = 0;
        foreach ($menus as $menu)
        {
            if ($menu->date == $item->date && $menu->meal_id == $item->meal_id) {
                $search[$j] = $menu->id;
                $j++;
            }
       }
        if (count($search)== 1)
        {
            return 0;
        }
        elseif (count($search) > 1)
        {
            for ($i = 0; $i < count($search); $i++)
            {
                if ($search[$i] == $item->id)
                    $result = $i+1;
            }
        }
        return $result;
    }
}
