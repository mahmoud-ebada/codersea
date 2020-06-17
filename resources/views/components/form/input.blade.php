<div class="form-group row">
    <label for="{{$id}}" class="col-sm-2 col-form-label">{{$label}}</label>
    <div class="col-sm-10">
      <input type="{{$type}}" name="{{$name}}" class="form-control-plaintext" id="{{$id}}" value="{{$value}}" placeholder="{{$placeholder}}" {{(isset($required) && $required) ? 'required': ''}}/>
    </div>
</div>