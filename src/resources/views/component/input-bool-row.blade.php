@php
    /** @var $element \SlavaWins\Formbuilder\Library\FElement */
@endphp

<div class="form-group mt-2 mb-2 row inpDiv__{{$element->name}}">

    @if($element->label<>null)
        <label for="id_{{$element->name}}" >
    @endif

            @include("formbuilder::component.base-input-bool")

   @if($element->label<>null)
                {{$element->label}}
                <small class="form-text text-muted">
                    {{$element->descr}}
                </small>
        </label>
    @endif


</div>

