<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();

        return response()->json($countries);
    }
}
