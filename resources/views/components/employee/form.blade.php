@form(['action' => $action, 'method' => 'POST', 'enctype' => 'multipart/form-data'])
    @if($type == 'edit')
        {{ method_field('PUT') }}
    @endif
    @input(['label' => 'First Name','id' => 'employee_first_name', 'type' => 'text', 'name' => 'first_name', 'placeholder' => 'Enter employee first name please', 'value' => (isset($employee) && $employee->first_name) ? $employee->first_name : old('first_name'), 'required' => true]) 
    @endinput

    @input(['label' => 'Last Name','id' => 'employee_last_name', 'type' => 'text', 'name' => 'last_name', 'placeholder' => 'Enter employee last name please', 'value' => (isset($employee) && $employee->last_name) ? $employee->last_name : old('last_name'), 'required' => true]) 
    @endinput

    @input(['label' => 'Email','id' => 'employee_email', 'type' => 'email', 'name' => 'email', 'placeholder' => 'Enter employee email please', 'value' => (isset($employee) && $employee->email) ? $employee->email : old('email') ]) 
    @endinput

    @input(['label' => 'Phone','id' => 'employee_phone', 'type' => 'text', 'name' => 'phone', 'placeholder' => 'Enter employee phone please', 'value' => (isset($employee) && $employee->phone) ? $employee->phone : old('phone')]) 
    @endinput

    @select(['id'=> 'employee_company', 'label' => 'Company', 'name' => 'company_id', 'data' => $companies, 'selected_value' => (isset($employee) && $employee->company_id) ? $employee->company_id : old('company_id')])
    @endselect
    
    @row
        @col(['size' => 'md-6', 'align' => 'text-left'])
            @link(['href' => route('employee.index'), 'title' => 'Back', 'type' => 'default'])
            @endlink
        @endcol

        @col(['size' => 'md-6', 'align' => 'text-right'])
            @button(['title' => $button['title'], 'type' => $button['type']])
            @endbutton
        @endcol
    @endrow
@endform