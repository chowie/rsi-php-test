<div class="form-group" id="contact-{{$slot}}">
    <label for="{{$slot}}">{{ title_case($slot) }}</label>
    <input
           name="{{$slot}}"
           id="{{$slot}}"
           class="form-control{{ $errors->has($slot->__toString()) ? ' is-invalid' : '' }}"
           type="{{$type ?? 'text'}}" form="contact-form">

</div>

