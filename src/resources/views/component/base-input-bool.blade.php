@php
    /** @var $element \SlavaWins\Formbuilder\Library\Struct\FData */
@endphp


<input type="checkbox"
       class="form-check-input {{$element->class}}  @error($element->name) is-invalid @enderror"

       name="{{$element->name}}"

       @if($element->valueLikeAttr)
           value="{{$element->valueLikeAttr}}"
       id="id_{{$element->name.'_'.$element->valueLikeAttr}}"
       @else
           id="id_{{$element->name}}"
       @endif

       @if($element->value) checked @endif>

@error($element->name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
