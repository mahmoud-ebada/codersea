@extends('layouts.app')

@section('content')

@container
    @row
        @col(['size' => 'md-10'])
           @card
            @cardHeader
                Company Profile
            @endcardHeader
            @cardBody
                @row
                    @col(['size' => 'md-4'])
                        @image(['src' => $company->logo, 'height' => 400, 'width' => 400])
                        @endimage
                    @endcol
                    @col(['size' => 'md-8'])
                        @readonly(['label' => 'Name', 'value' => $company->name])
                        @endreadonly
                        
                        @readonly(['label' => 'Email', 'value' => $company->email])
                        @endreadonly

                        @readonly(['label' => 'Website', 'value' => $company->website])
                        @endreadonly

                        @readonly(['label' => 'Address', 'value' => $company->address])
                        @endreadonly
                    @endcol
                @endrow

                @row
                    @col(['size' => 'md-12', 'align' => 'text-left'])
                        @link(['href' => route('company.index'), 'title' => 'Back', 'type' => 'default'])
                        @endlink
                    @endcol
                @endrow
            @endcardBody
           @endcard
        @endcol
    @endrow
@endcontainer

@endsection