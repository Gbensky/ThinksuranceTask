<?php
namespace Step\Acceptance;

class Action extends \AcceptanceTester
{

    public function closeModalPopup()
    {
        $I = $this;
        $I->waitForElement(".modal-body");
        $I->waitForText("Hinweis nicht erneut anzeigen");
        $I->seeElement('.modal-body');
        $I->click('.modal-body #auto-layover-btn');
    }

}