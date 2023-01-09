@php
    /** @var $element \PhpDie\Formbuilder\Library\Struct\FData */
@endphp


<input type="checkbox"
       class="form-control {{$element->class}}  @error($element->name) is-invalid @enderror"
       id="id_{{$element->name}}"
       name="{{$element->name}}"
       style="width: auto;"
       @if($element->value) checked @endif>

@error($element->name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
