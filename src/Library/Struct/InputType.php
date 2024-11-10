<?php


    namespace SlavaWins\Formbuilder\Library\Struct;

    use SlavaWins\Formbuilder\Library\FElement;


    class InputType extends VariantElement
    {


        /**
         * @return FElement
         */
        public function Text() {
            $this->felement->data->type = "text";

            return $this->felement;
        }


        /**
         * @return FElement
         */
        public function Number() {
            $this->felement->data->type = "number";

            return $this->felement;
        }


        /**
         * @return FElement
         */
        public function Int() {
            $this->felement->data->type = "int";

            return $this->felement;
        }

        /**
         * @return FElement
         */
        public function Date() {
            $this->felement->data->type = "date";

            return $this->felement;
        }

        /**
         * @return FElement
         */
        public function ListGenericClass() {
            $this->felement->data->type = "listGenericClass";

            return $this->felement;
        }


    }
