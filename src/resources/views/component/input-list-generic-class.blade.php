@php
    use MrProperter\Helpers\ReadAttributesConfig;
      /** @var $element \SlavaWins\Formbuilder\Library\FElement */
      /** @var $classExample */


   $value = $element->value;
   //$value = [];
   $attrList =    ReadAttributesConfig::ReadClass(  $element->exampleModelClass);
   $idRand = 'x'.rand(111,9999999);



@endphp

<div class="form-group  blankInputTextGrup blankInputTextGrup_GenericList blankInputTextGrup_GenericList_{{$element->name}} blankInputTextGrupSelect mb-2 {{$idRand}}">

    <label class=" col-form-label">{{$element->label ?? "NA"}}</label>


    <table class="table table_GenericList">
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
                        <a  style="cursor: pointer" onclick="InputListGenericClassAction_MoveUp(this)">
                            <svg width="23"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.29289 10.7071C3.90237 10.3166 3.90237 9.68342 4.29289 9.29289L11.2929 2.29289C11.6834 1.90237 12.3166 1.90237 12.7071 2.29289L19.7071 9.29289C20.0976 9.68342 20.0976 10.3166 19.7071 10.7071C19.3166 11.0976 18.6834 11.0976 18.2929 10.7071L13 5.41421L13 21C13 21.5523 12.5523 22 12 22C11.4477 22 11 21.5523 11 21L11 5.41421L5.70711 10.7071C5.31658 11.0976 4.68342 11.0976 4.29289 10.7071Z" fill="white"/>
                            </svg>

                        </a>
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
    <a class="btn  btn-primary _btnAdd " onclick="InputListGenericClassAction_AddRow('.{{$idRand}}')"> + Добавить строчку  </a>

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
