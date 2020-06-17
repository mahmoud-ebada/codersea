<tr>
    <td>{{$company->id}}</td>
    <td>
        <a href="{{route('company.show', $company->id)}}">{{$company->name}}</a>
    </td>
    <td>{{$company->address}}</td>
    <td>{{$company->website}}</td>
    <td>{{$company->email}}</td>
    <td>
        @thumb(['src' => $company->logo])
        @endthumb
    </td>
    <td>
        @link(['href' => route('company.edit', $company->id), 'title' => 'Edit', 'type' => 'default'])
        @endlink

        @actionButton([
        'action' => route('company.destroy', $company->id), 
        'method' => 'DELETE', 
        'type' => 'danger', 
        'title' => 'Delete',
        'onsubmit' => 'return confirm("Are you sure you want to delete this company?");'
        ])
        @endactionButton
    </td>
</tr>