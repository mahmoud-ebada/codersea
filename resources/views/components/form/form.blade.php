<form action="{{$action}}" method="{{$method}}" enctype="{{isset($enctype) ? $enctype  : ''}}" onsubmit="{{isset($onsubmit) ? $onsubmit : ''}}">
    @csrf
    {{ $slot }}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>