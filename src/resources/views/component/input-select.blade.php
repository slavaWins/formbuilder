@php
    /** @var $element \SlavaWins\Formbuilder\Library\FElement */
@endphp

<div class="form-group  blankInputTextGrup blankInputTextGrupSelect mb-2">
    @if($element->label<>null)
        <label for="id_{{$element->name}}" class=" col-form-label">{{$element->label}}</label>
    @endif
    @include("formbuilder::component.base-select")
    <span class="arrowSelect"><svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
<path d="M1 1L5.00005 5L9 1" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</span>
    <small class="form-text text-muted">
        {{$element->descr}}
    </small>

</div>
