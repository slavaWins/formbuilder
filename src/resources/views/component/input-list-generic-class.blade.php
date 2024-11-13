@php
    use MrProperter\Helpers\ReadAttributesConfig;
      /** @var $element \SlavaWins\Formbuilder\Library\FElement */
      /** @var $classExample */


   $value = $element->value;
   //$value = [];
   $attrList =    ReadAttributesConfig::ReadClass(  $element->exampleModelClass);
   $idRand = 'x'.rand(111,9999999);

   function GetOptionsInList($struct) {
        return $struct['Options'];
    }
@endphp

<div class="form-group  blankInputTextGrup blankInputTextGrupSelect mb-2 {{$idRand}}">

    <label class=" col-form-label">{{$element->label ?? "NA"}}</label>


    <table class="table">
        <tr style="font-size: 0.9em;">
            <td>   <BR>
                <small> Порядок </small>
            </td>
            @foreach($attrList as $key=>$struct)
                <td>
                    {{$struct['Name']}}
                    <BR>
                    <small> {{$struct['Description']}} </small>
                </td>
            @endforeach
            <td>   <BR>
                <small> Удаление </small>
            </td>
        </tr>

        <tbody class="_contentList">
        @foreach($value as $valueKey => $item)
            @if(!empty($item))
                <tr class="@if(isset($item['__templateData'])) hidden _lineData __templateData @endif   "
                    @if(isset($item['__templateData']))  style="display: none;" @endif >

                    <td>
                        <a  style="cursor: pointer" onclick="InputListGenericClassAction_MoveUp(this)"> ⬆️</a>
                    </td>

                    @foreach($attrList as $key=>$struct)
                        @if(isset($struct['Options']))
                            <td>
                                <select type="text" class="form-control noclass is-invalid" id="id_message"
                                        name="{{(isset($item['__templateData'])  ? "__templateKey__" : "").$element->name .'__'.$key.'[]'}}">
                                    @foreach($struct['Options'] as $_k=>$_v)
                                        <option
                                            @if($item[$key] == $_k) selected @endif
                                        value="{{$_k}}"> {{$_v}} </option>
                                    @endforeach 
                                </select>
                            </td>
                        @else
                            <td>
                                <input type="text" class="form-control noclass is-invalid" id="id_message"
                                       name="{{(isset($item['__templateData'])  ? "__templateKey__" : "").$element->name .'__'.$key.'[]'}}"
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

                    <td>
                        <a  style="cursor: pointer" onclick="InputListGenericClassAction_DeleteRow(this)">Удалить</a>
                    </td>

                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <a class="btn  btn-primary " onclick="InputListGenericClassAction_AddRow('.{{$idRand}}')"> + Добавить  </a>

    <small class="form-text text-muted">
        Описание поля
    </small>

</div>

<script>
    function InputListGenericClassAction_MoveUp(self) {
        var tr = $(self).closest("tr");
        var prevTr = tr.prev();

        // Проверяем, существует ли предыдущая строка
        if (prevTr.length) {
            // Перемещаем текущий tr перед предыдущим
            tr.insertBefore(prevTr);
        }
    }

    function InputListGenericClassAction_DeleteRow(self) {
        $(self).closest("tr").remove();
    }

    function InputListGenericClassAction_AddRow(selector) {
        var inp = $(selector);
        var tbl = inp.find("._contentList");

        var tpl = tbl.find(".__templateData");


        var e = tpl.clone();

        var html = e.html();
        html = html.replaceAll("__templateKey__", "")
        e.html(html);
        e.removeClass('__templateData');
        e.removeClass('hidden');
        e.show();

        tbl.append(e);
    }
</script>
