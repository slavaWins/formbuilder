@php
    use MrProperter\Helpers\ReadAttributesConfig;
      /** @var $element \SlavaWins\Formbuilder\Library\FElement */
      /** @var $classExample */


   $value = $element->value;
   //$value = [];
   $attrList =    ReadAttributesConfig::ReadClass(  $element->exampleModelClass);
   $idRand = 'x'.rand(111,9999999);

@endphp

<div class="form-group  blankInputTextGrup blankInputTextGrupSelect mb-2 {{$idRand}}">

    <label class=" col-form-label">{{$element->label ?? "NA"}}</label>


    <table class="table">
        <tr>
            @foreach($attrList as $key=>$struct)
                <td>
                    {{$struct['Name']}}
                    <BR>
                    {{$key}}
                    <small> {{$struct['Description']}} </small>
                </td>
            @endforeach
        </tr>

        @foreach($value as $valueKey => $item)
            <tr class="@if(isset($item['__templateData'])) hidden _lineData __templateData @endif   " @if(isset($item['__templateData']))  style="display: none;" @endif>
                @foreach($attrList as $key=>$struct)
                    @if(isset($struct['Options']))
                        <td>
                            <select type="text" class="form-control noclass is-invalid" id="id_message"
                                    name="{{(isset($item['__templateData'])  ? "__templateKey__" : "").$element->name .'__'.$key.'['.$valueKey.']'}}">
                                @foreach($struct['Options'] as $_k=>$_v)
                                    <option
                                        @if($item[$key] == $_k) selected @endif
                                    value="{{$_k}}"> {{$_v}} </option>
                                @endforeach
                                <option value="643626">Не валидный int</option>
                                <option value="asfasfs">Не валидный string</option>
                            </select>
                        </td>
                    @else
                        <td>
                            <input type="text" class="form-control noclass is-invalid" id="id_message"
                                   name="{{(isset($item['__templateData'])  ? "__templateKey__" : "").$element->name .'__'.$key.'['.$valueKey.']'}}"
                                   value="{{$item[$key]}}"
                                   inputvalidatorvalues="String"
                                   @if(isset($struct['Lengh']))
                                       inputvalidatorvalues-maxlen="{{$struct['Lengh'][1]}}"
                                   inputvalidatorvalues-minlen="{{$struct['Lengh'][0]}}"
                                @endif
                            >
                        </td>
                    @endif

                @endforeach
            </tr>
        @endforeach
    </table>
    <a class="btn  btn-primary " onclick="InputListGenericClassAction_AddRow('.{{$idRand}}')"> + Добавить

    </a>

    <small class="form-text text-muted">
        Описание поля
    </small>

</div>

<script>
    function InputListGenericClassAction_AddRow(selector) {
        var inp = $(selector);
        var tbl = inp.find("table");

        var tpl = tbl.find(".__templateData");

        var count = tbl.find("._lineData").length - 1;

        var e = tpl.clone();

        var html = e.html();
        html = html.replaceAll("[0]", "["+count+"]")
        html = html.replaceAll("__templateKey__", "")
        e.html( html);
        e.removeClass('__templateData');
        e.removeClass('hidden');
        e.show();

        tbl.append(e);
    }
</script>
