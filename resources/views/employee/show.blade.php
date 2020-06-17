@extends('layouts.app')

@section('content')

@container
    @row
        @col(['size' => 'md-10'])
           @card
            @cardHeader
                Employee Profile
            @endcardHeader

            @cardBody
                @row
                    @col(['size' => 'md-8'])
                        @readonly(['label' => 'Name', 'value' => $employee->name])
                        @endreadonly
                        
                        @readonly(['label' => 'Email', 'value' => $employee->email])
                        @endreadonly

                        @readonly(['label' => 'Website', 'value' => $employee->phone])
                        @endreadonly

                        @readonly(['label' => 'Company', 'value' => $employee->company->name])
                        @endreadonly
                    @endcol
                @endrow

                @row
                    @col(['size' => 'md-12', 'align' => 'text-left'])
                        @link(['href' => route('employee.index'), 'title' => 'Back', 'type' => 'default'])
                        @endlink
                    @endcol
                @endrow
            @endcardBody
           @endcard
        @endcol
    @endrow
@endcontainer

@endsection