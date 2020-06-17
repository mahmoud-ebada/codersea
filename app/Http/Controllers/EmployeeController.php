<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = \App\Employee::paginate(10);
        return view('employee.index')->withEmployees($employees);
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
            'action' => route('employee.store'),
            'button' => [
                'title' => 'Create',
                'type' => 'primary'
            ],
            'employee' => null,
            'companies' => \App\Company::all()->pluck('name', 'id')
        ];
        return view('employee.create')->withForm($form);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $data = $request->only('first_name', 'last_name', 'phone', 'email', 'company_id');
        $new = Employee::create($data);
        return redirect(route('employee.show',$new->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show')->with(['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = \App\Employee::findOrFail($id);
        $form = [
            'type' => 'edit',
            'action' => route('employee.update', $id),
            'button' => [
                'title' => 'Update',
                'type' => 'default'
            ],
            'employee' => $employee,
            'companies' => \App\Company::all()->pluck('name', 'id')
        ];
        return view('employee.create')->withForm($form);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->company_id = $request->get('company_id');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('phone');
        $employee->save();
        return redirect(route('employee.show',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee  = Employee::find($id);
        if($employee){
            $employee->delete();
        }
        return redirect(route('employee.index'));
    }
}
