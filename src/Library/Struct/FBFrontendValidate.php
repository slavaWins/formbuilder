<?php


    namespace PhpDie\Formbuilder\Library\Struct;


    use PhpDie\Formbuilder\Library\FElement;


    class FBFrontendValidate extends VariantElement
    {


        /**
         * @return FElement
         */
        public function String($minLen = 1, $maxLen = 999) {
            $this->felement->data->frontendValidate = "String";
            $this->felement->data->frontendValidateMinLen = $minLen;
            $this->felement->data->frontendValidateMaxLen = $maxLen;

            return $this->felement;
        }

        /**
         * @return FElement
         */
        public function Digital($minLen = 1, $maxLen = 999) {
            $this->felement->data->frontendValidate = "Digital";
            $this->felement->data->frontendValidateMinLen = $minLen;
            $this->felement->data->frontendValidateMaxLen = $maxLen;

            return $this->felement;
        }

        /**
         * @return FElement
         */
        public function Money() {
            $this->felement->data->frontendValidate = "Money";

            return $this->felement;
        }

    }
