@php
    /** @var $element \SlavaWins\Formbuilder\Library\Struct\FData */
@endphp


<input type="{{$element->type}}"
       class="form-control {{$element->class}}  @error($element->name) is-invalid @enderror"
       id="id_{{$element->name}}"
       name="{{$element->name}}"
       value="{{$element->value}}"
       @if($element->placeholder<>null) placeholder="{{$element->placeholder}}" @endif
       @if($element->frontendValidate<>null) InputValidatorValues="{{$element->frontendValidate}}" @endif
       @if($element->frontendValidateMaxLen<>null) InputValidatorValues-maxlen="{{$element->frontendValidateMaxLen}}"
       @endif
       @if($element->frontendValidateMinLen<>null) InputValidatorValues-minlen="{{$element->frontendValidateMinLen}}"
       @endif
       @if($element->dataMask) data-mask="{{$element->dataMask}}" @endif
       @if($element->dataMaskReverse) data-mask-reverse="true" @endif
>

@error($element->name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
