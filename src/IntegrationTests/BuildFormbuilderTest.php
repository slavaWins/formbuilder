<?php


namespace SlavaWins\AuthSms\IntegrationTests;


use SlavaWins\Formbuilder\Library\FElement;
use Tests\TestCase;

class BuildFormbuilderTest extends TestCase
{


    public function test_BuildingHtml()
    {
        $this->withViewErrors([]);

        $element =  FElement::NewInputText()->SetName("game")->SetLabel("LabXX");

        $html = $element->RenderHtml(false);
        $this->assertStringContainsString("LabXX", $html);
        $this->assertStringContainsString("id_game", $html);


        $element->SetPlaceholder("xPlaceXhloder");
        $html = $element->RenderHtml(false);
        $this->assertStringContainsString("xPlaceXhloder", $html);


        $element->SetDataMask("XX-XX");
        $html = $element->RenderHtml(false);
        $this->assertStringContainsString('data-mask="XX-XX"', $html);


    }

}
