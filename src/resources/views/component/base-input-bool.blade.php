@php
    /** @var $element \SlavaWins\Formbuilder\Library\Struct\FData */
@endphp


<input type="checkbox"
       class="form-check-input {{$element->class}}  @error($element->name) is-invalid @enderror"
       id="id_{{$element->name}}"
       name="{{$element->name}}"
       @if($element->value) checked @endif>

@error($element->name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
