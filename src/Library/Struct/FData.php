<?php


    namespace SlavaWins\Formbuilder\Library\Struct;


    class FData
    {

        public $view = "formbuilder.component.base-input-text";

        public $name = "not";
        public $placeholder = null;
        public $content = "";
        public $label = null;
        public $descr = null;
        public $class = "noclass";
        public $type = "text";
        public $value = null;


        /** @var null|string Валидация на js */
        public $frontendValidate = null;
        public $frontendValidateMaxLen = null;
        public $frontendValidateMinLen = 0;

        public $options = [];


        public $formData_Link = null;
        public $formData_Method = null;

        public $dataMask = null;
        public $dataMaskReverse = false;


        public $CheckboxAttachHideDiv = null;
        public $CheckboxAttachHideDivReverse = false;

    }
