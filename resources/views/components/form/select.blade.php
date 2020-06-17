<div class="form-group row">
    <label for="{{$id}}" class="col-sm-2 col-form-label">{{$label}}</label>
    <div class="col-sm-10">
    <select class="form-control" id="{{$id}}" name="{{$name}}">
        <option value="">Please Select {{$label}}</option>
        @foreach($data as $value => $title)
            <option value="{{$value}}" {{(isset($selected_value) && $value == $selected_value) ? 'selected':''}}>{{$title}}</option>
        @endforeach
    </select>
    </div>
</div>