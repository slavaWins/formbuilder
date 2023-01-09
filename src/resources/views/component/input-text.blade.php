@php
    /** @var $element \SlavaWins\Formbuilder\Library\FElement */
@endphp

<div class="form-group  ">

    @if($element->label<>null)
        <label for="id_{{$element->name}}" class=" col-form-label">{{$element->label}}</label>
    @endif

    @include("formbuilder::component.base-input-text")
    <small class="form-text text-muted">
        {{$element->descr}}
    </small>

</div>
