<?php


    namespace PhpDie\Formbuilder\Library\Struct;

    use PhpDie\Formbuilder\Library\FElement;


    class VariantElement
    {
        public $felement;

        /**
         * TypeFElements constructor.
         * @param $felement FElement
         */
        function __construct($felement) {
            $this->felement = $felement;
        }
    }

