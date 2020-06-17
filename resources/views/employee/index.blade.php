@extends('layouts.app')

@section('content')

@container
    @row
        @col(['size' => 'md-10'])
           @card
                @cardHeader
                    Companies
                @endcardHeader

                @cardBody
                    @link(['href' => route('employee.create'), 'title' => 'Create a new Employee', 'type' => 'success'])
                    @endlink
                    
                    @card
                        @cardHeader
                            Employees list
                        @endcardHeader

                        @cardBody
                            @table
                                @header
                                    @employeeheader
                                    @endemployeeheader
                                @endheader

                                @body
                                    @forelse($employees as $employee)
                                        @employeerow(['employee' => $employee])
                                        @endemployeerow
                                    @empty
                                        @nodatarow(['span' => 7, 'message' => 'The system has not any employees yet!'])
                                        @endnodatarow
                                    @endforelse
                                @endbody
                            @endtable
                        @endcardBody
                        {{$employees->links()}}
                    @endcard

                @endcardBody
           @endcard
        @endcol
    @endrow
@endcontainer

@endsection