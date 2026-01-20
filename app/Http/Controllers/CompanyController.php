<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Resources\CompanyResource;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{

    public function index()
    {
        return CompanyResource::collection(
            Company::with('tasks.users')->get()
        );
    }
}
