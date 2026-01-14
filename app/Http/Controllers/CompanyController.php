<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::with('tasks.user')->get();
        return response()->json($companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $companies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $companies)
    {
        //
    }
}
