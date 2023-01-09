@php
    /** @var $element \PhpDie\Formbuilder\Library\FElement */
@endphp

<div class="form-group  ">
    <label for="id_{{$element->name}}" class=" col-form-label">{{$element->label}}</label>

    @include("formbuilder::component.base-select")
    <small class="form-text text-muted">
        {{$element->descr}}
    </small>

</div>
