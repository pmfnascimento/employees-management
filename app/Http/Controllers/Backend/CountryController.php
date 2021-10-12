<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;

class CountryController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $countries = Country::all();

        if($request->has('search')){
            $countries = Country::where('country_code','like',"%{$request->search}%")->orWhere('name','like',"%{$request->search}%")->get();
        }

        return view('countries.index',compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Store in database country
     *
     * @param CountryStoreRequest $request
     * @return void
     */
    public function store(CountryStoreRequest $request)
    {

        Country::create([
            'country_code' => $request['country_code'],
            'name' => $request['name'],
        ]);

        return redirect()->route('countries.index')->with('message', 'Country Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUpdateRequest $request, Country $country)
    {
        $country->update([
            'country_code' => $request['country_code'],
            'name' => $request['name'],
        ]);

        return redirect()->route('countries.index')->with('message','Country Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {

        $country->delete();
        return redirect()->route('countries.index')->with('message','Country Deleted Succesfully');
    }
}
