@extends('layouts.app')

@section('content')

@container
    @row
        @col(['size' => 'md-10'])
            @card
                @cardHeader
                    Create a new Company
                @endcardHeader

                @cardBody
                    @companyForm($form)
                    @endcompanyForm
                @endcardBody
            @endcard
        @endcol
    @endrow
@endcontainer

@endsection