@php
    /** @var $element \PhpDie\Formbuilder\Library\FElement */
@endphp

<div class="form-group row  inpDiv__{{$element->name}}">

    @if($element->label<>null)
        <label for="id_{{$element->name}}" class="col-md-3 col-lg-2 col-form-label">{{$element->label}}</label>
    @endif

    <div class="col">
        @include("formbuilder::component.base-input-text")
        <small class="form-text text-muted">
            {{$element->descr}}
        </small>
    </div>

    @if($element->CheckboxAttachHideDiv<>null)
        <script>
            $(document).ready(function () {
                CheckboxAttachHideDiv($('#id_{{$element->CheckboxAttachHideDiv}}'), $('.inpDiv__{{$element->name}}'));
            });
        </script>
    @endif
</div>

