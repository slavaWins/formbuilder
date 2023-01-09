@php
    /** @var $element \PhpDie\Formbuilder\Library\FElement */
@endphp


<input type="submit" class="btn btn-primary {{$element->class}}" id="id_{{$element->name}}"
       value="{{$element->value ?? $element->label}}">

<small class="form-text text-muted">
    {{$element->descr}}
</small>
