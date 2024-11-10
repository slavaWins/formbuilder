<?php


    namespace SlavaWins\Formbuilder\Library;

    use SlavaWins\Formbuilder\Library\Struct\FBFrontendValidate;
    use SlavaWins\Formbuilder\Library\Struct\FData;
    use SlavaWins\Formbuilder\Library\Struct\InputType;
    use SlavaWins\Formbuilder\Library\Struct\ViewFElements;


    class FElement
    {

        public static function NewInputTextRow():FElement {
            $e =  new FElement();
            $e->SetView()->InputTextRow();
            return  $e;
        }

        public static function NewInputText():FElement {
            $e =  new FElement();
            $e->SetView()->InputText();
            return  $e;
        }

        public static function New():FElement {
            return  new FElement();
        }


        function __construct() {
           $this->data=new FData();
        }


        /** @var $data FData */
        public  $data ;


        /**
         * @return FElement
         */
        public function SetLabel($val) {
            $this->data->label = $val;
            return $this;
        }

        /**
         * @return FElement
         */
        public function SetName($val) {
            $this->data->name = $val;
            return $this;
        }
        /**
         * @return FElement
         */
        public function AddValueAttributeCheckbox($val) {
            $this->data->valueLikeAttr = $val;
            return $this;
        }

        /**
         * @return FElement
         */
        public function SetPlaceholder($val) {
            $this->data->placeholder = $val;
            return $this;
        }

        /**
         * @return FElement
         */
        public function SetExampleModel($val) {
            $this->data->exampleModelClass = $val;
            return $this;
        }

        /**
         * @return FElement
         */
        public function SetDescr($val) {
            $this->data->descr = $val;
            return $this;
        }


        /**
         * @return FElement
         */
        public function SetClass($val) {
            $this->data->class = $val;
            return $this;
        }


        /**
         * @return FElement
         */
        public function SetValue($val) {
            $this->data->value = $val;
            return $this;
        }

        /**
         * @return FElement
         */
        public function SetDataMask($val, $isReverce=false) {
            $this->data->dataMask = $val;
            $this->data->dataMaskReverse = $isReverce;
            return $this;
        }


        /**
         * Подключаем этот инпут к чекбоксу. Что бы скрывать или показывать если чекбокс меняет состояние
         * @return FElement
         */
        public function CheckboxAttachHideDiv($chekboxName, $isReverce=false) {
            $this->data->CheckboxAttachHideDiv = $chekboxName;
            $this->data->CheckboxAttachHideDivReverse = $isReverce;
            return $this;
        }

        /**
         * @return FElement
         */
        public function SetForm($link, $method="POST") {
            $this->data->formData_Link = $link;
            $this->data->formData_Method = $method;
            return $this;
        }

        /**
         * @return ViewFElements
         */
        public function SetView() {
            $variants =  new  ViewFElements($this);
            return $variants;
        }

        /**
         * @return InputType
         */
        public function SetType() {
            $variants =  new  InputType($this);
            return $variants;
        }

        public function FrontendValidate() {
            $variants =  new  FBFrontendValidate($this);
            return $variants;
        }

        /**
         * @return FElement
         */
        public function AddOption($key, $text, $isSelectedValue=false) {
            $this->data->options[$key] = $text;
            if($isSelectedValue)$this->data->value=$key;
            return $this;
        }



        /**
         * @return FElement
         */
        public function AddOptionFromArray($array, $selectKey = false) {

            $this->data->options = $array;
            if($selectKey)$this->data->value=$selectKey;
            return $this;
        }





        /**
         * @var FElement[]
         */
        public $inners=[];


        public function  RenderHtml(bool $isEcho=false){
            $innerHtml = "";

            foreach ($this->inners as $element ){
                $innerHtml.=  $element->RenderHtml();
            }


            $element = $this->data;
            $element ->content = $innerHtml;

//            $viewInd = "formbuilder::".$element->view;
            $viewInd = $element->view;
            $viewInd= str_replace("formbuilder::", "",$viewInd);


            if(!view()->exists($viewInd)){
                $viewInd =    "formbuilder::".str_replace('formbuilder.','',$viewInd);
            }


            $resHtml = view($viewInd, compact('element'))->render();

            if($this->data->formData_Link<>null){
                $resHtml='<form method="'.$this->data->formData_Method.'" action="'.$this->data->formData_Link.'">' . $resHtml;
                $resHtml=$resHtml . '</form>';
            }

            if($isEcho){
                echo $resHtml;
            }

            return $resHtml;
        }

        /**
         * @param $element FElement
         */
        public  function AddElement($element){
            $this->inners[]=$element;
        }


        /**
         * @return FElement
         */
        public  function NewElement(){
            $elementNew = new FElement();
            //$elementNew->view= "formbuilder.component.input-text";
            $this->AddElement($elementNew);
            return $elementNew;
        }


    }



