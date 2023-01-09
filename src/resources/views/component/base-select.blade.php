@php
    /** @var $element \PhpDie\Formbuilder\Library\FElement */
@endphp

<select class="form-control {{$element->class}}  @error($element->name) is-invalid @enderror" id="id_{{$element->name}}"
        name="{{$element->name}}">
    @foreach($element->options as $K=>$V)

        <option
                @if($element->value==$K)selected @endif
        value="{{$K}}">{{$V}}</option>

    @endforeach

</select>
@error($element->name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
