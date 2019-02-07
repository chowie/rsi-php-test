<div class="form-group" id="contact-{{$name}}">
    <label for="{{$name}}">{{ title_case($name) }}</label>
    <input
           name="{{$name}}"
           id="{{$name}}"
           class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           type="{{$type ?? 'text'}}" form="contact-form">

    @component('components.contact-invalid-feedback', [ 'name' => $name ]) @endcomponent

</div>

