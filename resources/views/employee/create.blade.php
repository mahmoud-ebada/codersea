@extends('layouts.app')

@section('content')

@container
    @row
        @col(['size' => 'md-10'])
            @card
                @cardHeader
                    Create a new Employee
                @endcardHeader

                @cardBody
                    @employeeForm($form)
                    @endemployeeForm
                @endcardBody
            @endcard
        @endcol
    @endrow
@endcontainer

@endsection