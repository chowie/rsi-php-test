<span class="invalid-feedback">@{{ errors.first('{!!$name!!}') }}</span>
@if( $errors->has($name) )
    <p class="invalid-feedback">{{ array_first($errors->get($name)) }}</p>
@endif


