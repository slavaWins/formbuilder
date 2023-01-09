<?php


    namespace SlavaWins\Formbuilder\Library\Struct;

    use SlavaWins\Formbuilder\Library\FElement;


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

