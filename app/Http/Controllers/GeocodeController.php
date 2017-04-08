<?php

namespace App\Http\Controllers;

use App\Models\Geoname;
use App\Helpers\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeocodeController extends Controller
{
    use Country;

    public function reverse_geocoding(Request $request)
    {
        $geoname = Geoname::select(DB::raw('*,(3959
                    * acos(cos(radians(' . $request->lat . '))
                    * cos(radians(latitude))
                    * cos(radians(' . $request->log . ') - radians(longitude))
                    + sin(radians(' . $request->lat . '))
                    * sin(radians(latitude)))
                    ) AS distance'))
            ->orderBy('distance')
            ->first();
        return redirect('/')->withCity($geoname->name)->withCountry($this->code_to_country($geoname->country_code));
    }

    function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $kilometers = $miles * 1.609344;
        return $kilometers;
    }

    // mysql query
    /*24.931051, 67.035055
    SELECT *,
    (3959
    * acos(
    cos(radians(24.931051))
    * cos(radians(latitude))
    * cos(radians(67.035055) - radians(longitude))
    + sin(radians(24.931051))
    * sin(radians(latitude))
    )
    ) AS distance
    FROM geonames
    ORDER BY distance LIMIT 20;*/
}
