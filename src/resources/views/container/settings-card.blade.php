@php
    /** @var $element \SlavaWins\Formbuilder\Library\Struct\FData */
@endphp

<div class="card card--outsider mt-3 {{$element->class}}" id="id_{{$element->name}}">
    <div class="card-body">
        <h4 class="card-title">{{$element->label}}</h4>
        <p>{{$element->descr}}</p>
        {!! $element->content !!}
    </div>
</div>
