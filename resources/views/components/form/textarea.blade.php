<div class="form-group row">
    <label for="{{$id}}" class="col-sm-2 col-form-label">{{$label}}</label>
    <div class="col-sm-10">
    <textarea class="form-control-plaintext" name="{{$name}}" id="{{$id}}" cols="30" rows="3" placeholder="{{$placeholder}}" {{(isset($required) && $required) ? 'required': ''}}>
        {{$value}}
    </textarea>
    </div>
</div>