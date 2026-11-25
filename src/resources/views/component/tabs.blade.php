@php
    /** @var $element \SlavaWins\Formbuilder\Library\FElement */
@endphp


<div class="company-details-navigation {{$element->class}}" id="id_{{$element->name}}">
    <ul class="nav nav-fill mx-n1 mb-2">

        @foreach($element->options as $K=>$V)
            @php
                // Любая относительная ссылка или http(s). Схемы javascript:, data:, vbscript: и т.п. — нельзя
                $tabHref = (string)$K;
                // браузер выкидывает пробелы/табы/переводы строк в схеме («java\tscript:»), поэтому проверяем без них
                $tabScheme = preg_match('~^([a-z][a-z0-9+.\-]*):~i', preg_replace('~[\x00-\x20]~', '', $tabHref), $m) ? strtolower($m[1]) : null;
                if ($tabScheme !== null && !in_array($tabScheme, ['http', 'https'], true)) $tabHref = '#';
            @endphp
            <li class="nav-item m-1">
                <a class="nav-link btn btn-outline-secondary px-2 py-1 @if($element->value==$K)active @endif  "
                   href="{{$tabHref}}">{{$V}}</a>
            </li>
        @endforeach

    </ul>
</div>
