@form(['action' => $action, 'method' => 'POST', 'enctype' => 'multipart/form-data'])
    @if($type == 'edit')
        {{ method_field('PUT') }}
    @endif
    @input(['label' => 'Name','id' => 'company_name', 'type' => 'text', 'name' => 'name', 'placeholder' => 'Enter company name please', 'value' => (isset($company) && $company->name) ? $company->name : (isset($company) && $company->name) ? $company->name : old('name'), 'required' => true]) 
    @endinput

    @input(['label' => 'Email','id' => 'company_email', 'type' => 'email', 'name' => 'email', 'placeholder' => 'Enter company email please', 'value' => (isset($company) && $company->email) ? $company->email : (isset($company) && $company->email) ? $company->email : old('email') ]) 
    @endinput

    @input(['label' => 'Website','id' => 'company_website', 'type' => 'text', 'name' => 'website', 'placeholder' => 'Enter company website please', 'value' => (isset($company) && $company->website) ? $company->website : (isset($company) && $company->website) ? $company->website : old('website')]) 
    @endinput

    @textarea(['label' => 'address', 'id' => 'company_address', 'name' => 'address', 'placeholder' => 'Enter company address please', 'value' => (isset($company) && $company->address) ? $company->address : (isset($company) && $company->address) ? $company->address : old('address')])
    @endtextarea

    @imageFile(['label' => 'Logo', 'id' => 'company_logo', 'name' => 'logo', 'title' => 'Choose Logo'])
    @endimageFile
    
    @if($type == 'edit' && $company->logo)
        @thumb(['src' => $company->logo])
        @endthumb
    @endif

    @row
        @col(['size' => 'md-6', 'align' => 'text-left'])
            @link(['href' => route('company.index'), 'title' => 'Back', 'type' => 'default'])
            @endlink
        @endcol

        @col(['size' => 'md-6', 'align' => 'text-right'])
            @button(['title' => $button['title'], 'type' => $button['type']])
            @endbutton
        @endcol
    @endrow
@endform