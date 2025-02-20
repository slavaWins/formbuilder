@php
    /** @var $element \SlavaWins\Formbuilder\Library\FElement */

if(empty($element->placeholder))$element->placeholder= "Введите текст...";
@endphp

<div class="col  mb-3">
    <div class="form-group blankInputTextGrup  mb-0">

        @if($element->label<>null)
            <label for="id_{{$element->name}}" class=" col-form-label">{{$element->label}}</label>
        @endif

        @include("formbuilder::component.base-input-text")


    </div>
    <div class="col p-2" style="font-size: 13px;">
        {{$element->descr}}
    </div>
</div>
