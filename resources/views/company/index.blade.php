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
                    @link(['href' => route('company.create'), 'title' => 'Create new Company', 'type' => 'success'])
                    @endlink
                    
                    @card
                        @cardHeader
                            Compaines list
                        @endcardHeader

                        @cardBody
                            @table
                                @header
                                    @companyheader
                                    @endcompanyheader
                                @endheader

                                @body
                                    @forelse($companies as $company)
                                        @companyrow(['company' => $company])
                                        @endcompanyrow
                                    @empty
                                        @nodatarow(['span' => 7, 'message' => 'The system has not any companies yet!'])
                                        @endnodatarow
                                    @endforelse
                                @endbody
                            @endtable
                        @endcardBody
                        {{$companies->links()}}
                    @endcard

                @endcardBody
           @endcard
        @endcol
    @endrow
@endcontainer

@endsection