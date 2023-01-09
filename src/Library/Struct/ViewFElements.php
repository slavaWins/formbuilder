<?php


    namespace PhpDie\Formbuilder\Library\Struct;

    use PhpDie\Formbuilder\Library\FElement;


    class ViewFElements extends VariantElement
    {


        public function ContainerEmptyHtml() {
            $this->felement->data->view = "formbuilder.container.empty";

            return $this->felement;
        }

        public function ContainerCardSettings() {
            $this->felement->data->view = "formbuilder.container.settings-card";

            return $this->felement;
        }

        public function Tabs() {
            $this->felement->data->view = "formbuilder.component.tabs";

            return $this->felement;
        }

        public function H() {
            $this->felement->data->view = "formbuilder.component.h";

            return $this->felement;
        }


        public function InputText() {
            $this->felement->data->view = "formbuilder.component.input-text";

            return $this->felement;
        }

        public function InputTextRow() {
            $this->felement->data->view = "formbuilder.component.input-text-row";

            return $this->felement;
        }

        public function InputBoolRow() {
            $this->felement->data->view = "formbuilder.component.input-bool-row";

            return $this->felement;
        }

        public function InputSelect() {
            $this->felement->data->view = "formbuilder.component.input-select";

            return $this->felement;
        }

        public function InputSelectRow() {
            $this->felement->data->view = "formbuilder.component.input-select-row";

            return $this->felement;
        }

        public function BtnSubmit() {
            $this->felement->data->view = "formbuilder.component.btn-submit";

            return $this->felement;
        }


    }
