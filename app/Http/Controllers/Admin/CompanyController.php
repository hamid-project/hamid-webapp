<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchConditions = $request->search_conditions ?? [];
        foreach (['keywords', 'company_id', 'order_by'] as $name) {
            $searchConditions[$name] = $searchConditions[$name] ?? '';
        }

        $q = Company::query();

        if ($searchConditions['keywords']) {
            $k = sprintf('%%%s%%', $searchConditions['keywords']);
            $q->where('name', 'LIKE', $k);
            $q->orWhere('address', 'LIKE', $k);
            $q->orWhere('website', 'LIKE', $k);
        }

        if ($searchConditions['order_by']) {
            $column = strtok($searchConditions['order_by'], ':');
            $ascDesc = strtok('');
            $q->orderBy($column, $ascDesc);
        }

        $companies = $q->get();

        return view('admin.companies.index', [
            'searchConditions' => $searchConditions,
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company;

        return view('admin.companies.create', [
            'company' => $company,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|min:1|max:30',
            'address' => 'string|min:10|max:100',
            'website' => 'url|min:7|max:100',
        ]);

        $company = new Company;
        foreach (['name', 'address', 'website'] as $name) {
            $company->$name = $request->$name === null ? '' : $request->$name;
        }
        $company->save();

        return redirect()->route('admin.companies.edit', ['id' => $company->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
	return view('admin.companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
	return view('admin.companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name'=> 'required|min:1|max:30',
            'address' => 'string|min:10|max:100',
            'website' => 'url|min:7|max:100',
        ]);

        foreach (['name', 'address', 'website'] as $name) {
            $company->$name = $request->$name === null ? '' : $request->$name;
        }
        $company->save();

        return redirect()->route('admin.companies.show', ['id' => $company->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $company->delete();

        return redirect()->route('admin.companies.index');
    }
}
