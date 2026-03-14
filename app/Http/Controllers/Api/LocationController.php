<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Division;
use App\Models\District;
use App\Models\Thana;

class LocationController extends Controller
{
    public function countries()
    {
        return response()->json(Country::orderBy('name')->get());
    }

    public function divisions($countryId)
    {
        return response()->json(Division::where('country_id', $countryId)->orderBy('name')->get());
    }

    public function districts($divisionId)
    {
        return response()->json(District::where('division_id', $divisionId)->orderBy('name')->get());
    }

    public function thanas($districtId)
    {
        return response()->json(Thana::where('district_id', $districtId)->orderBy('name')->get());
    }
}
