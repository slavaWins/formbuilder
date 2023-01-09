@php
    /** @var $element \PhpDie\Formbuilder\Library\FElement */
@endphp


<div class="company-details-navigation {{$element->class}}" id="id_{{$element->name}}">
    <ul class="nav nav-fill mx-n1 mb-2">

        @foreach($element->options as $K=>$V)
            <li class="nav-item m-1">
                <a class="nav-link btn btn-outline-secondary px-2 py-1 @if($element->value==$K)active @endif  "
                   href="{{$K}}">{{$V}}</a>
            </li>
        @endforeach

    </ul>
</div>
