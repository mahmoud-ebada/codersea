<tr>
    <td>{{$employee->id}}</td>
    <td>
        <a href="{{route('employee.show', $employee->id)}}">{{$employee->name}}</a>
    </td>
    <td>{{$employee->company->name}}</td>
    <td>{{$employee->email}}</td>
    <td>{{$employee->phone}}</td>
    <td>
        @link(['href' => route('employee.edit', $employee->id), 'title' => 'Edit', 'type' => 'default'])
        @endlink

        @actionButton([
        'action' => route('employee.destroy', $employee->id), 
        'method' => 'DELETE', 
        'type' => 'danger', 
        'title' => 'Delete',
        'onsubmit' => 'return confirm("Are you sure you want to delete this employee?");'
        ])
        @endactionButton
    </td>
</tr>