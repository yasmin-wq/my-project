<?php

namespace App\Http\Controllers;

use App\companies;
use App\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies  =  companies::all();

        return view('companies.companies', compact('companies'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manager  = User::where('roles_name', 'manager')->get();

        return view('companies.creatcompany', compact('manager'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'manager_id' => 'required|manager_id|unique:companies,manager_id',
        ]);
        $companies = companies::create([
            'name' => $request->name,
            'manager_id' => $request->manager_id,
        ]);

        session()->flash('Add', 'تم اضافة الشركة  بنجاح');
    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companies $companies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(companies $companies)
    {
        //
    }
}
