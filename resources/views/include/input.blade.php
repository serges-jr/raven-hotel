@php
    $label ??= null;
    $type ??= 'text';
    $name ??= null;
    $class ??= null;
    $value ??= null;

@endphp

<div @class(['mb-1', $class])>
    <input type="{{$type}}" id="{{$name}}" name="{{$name}}" class="form-control" value="{{$value}}">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
</div>
