@php
    /** @var $element \PhpDie\Formbuilder\Library\Struct\FData */
@endphp

<div class=" {{$element->class}}" id="id_{{$element->name}}">

    {!! $element->content !!}
</div>
