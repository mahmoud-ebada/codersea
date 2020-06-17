@component('mail::message')
Hello, {{$company->name}}, this week {{$employees->count()}} employees had been enetered in your company.

@component('mail::table')
<table>
<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
    </tr>
</thead>
<tbody>
@foreach($employees as $employee)
    <tr>
        <td>{{$employee->name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
    </tr>
@endforeach
</tbody>
</table>
@endcomponent
Thanks,<br/>
Codersea.

@endcomponent