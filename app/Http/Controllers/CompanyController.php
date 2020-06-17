<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Notifications\CompanyCreated;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = \App\Company::latest()->paginate(10);
        return view('company.index')->withCompanies($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = [
            'type' => 'create',
            'action' => route('company.store'),
            'button' => [
                'title' => 'Create',
                'type' => 'primary'
            ],
            'company' => null
        ];
        return view('company.create')->withForm($form);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $data = $request->only('name', 'email', 'website', 'logo', 'address');

        // upload logo image 
        if($request->hasFile('logo')){
            $logoPath = $request->file('logo')->store('public');
            $data['logo'] = $logoPath;
        }

        $new = Company::create($data);
        $new->notify(new CompanyCreated());
        return redirect(route('company.show',$new->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company.show')->with(['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $form = [
            'type' => 'edit',
            'action' => route('company.update', $id),
            'button' => [
                'title' => 'Update',
                'type' => 'default'
            ],
            'company' => $company
        ];
        return view('company.edit')->with(['form' => $form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->website = $request->get('website');
        $company->address = $request->get('address');
        
        // update image if user upload a new one
        if($request->hasFile('logo')){
            $company->logo = $request->file('logo')->store('public');
        }

        $company->save();
        return redirect(route('company.show',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company  = Company::find($id);
        if($company){
            $company->delete();
        }
        return redirect(route('company.index'));
    }
}
