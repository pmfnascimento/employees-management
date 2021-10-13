<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();

        return response()->json($countries);
    }

    public function states(Country $country)
    {
        $result = State::where('country_id',$country->id)->get();
        return response()->json($result);
    }

    public function cities(State $state)
    {
        $result = City::where('state_id',$state->id)->get();
        return response()->json($result);
    }

    public function departments()
    {
        $departments = Department::all();
        return response()->json($departments);
    }


}
