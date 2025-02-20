@php
    /** @var $element \SlavaWins\Formbuilder\Library\FElement */
@endphp

<select class="form-control {{$element->class}}"

       @if($element->visibleRule<>null) visiblerule_key="{{$element->visibleRule['key']}}" visiblerule_val="{{$element->visibleRule['val']}}" @endif
@error($element->name) is-invalid @enderror"
        id="id_{{$element->name}}"
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
