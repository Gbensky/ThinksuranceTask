<?php
namespace acceptance\frontend;

use AcceptanceTester;
use Codeception\Util\Fixtures;
use Page\Acceptance\HomePage;
use Step\Acceptance\Action;


date_default_timezone_set('Africa/Lagos');

class HomePageCest
{

    private static $professionSearchText = "A";

    public function _before(\AcceptanceTester $I, Action $user)
    {
        $I->amOnPage(HomePage::$URL);
        $user->closeModalPopup();
    }

    public function shouldBeAbleToEnterTrade(AcceptanceTester $I)
    {

        $I->waitForText(HomePage::$LandingViewText);
        $I->see(HomePage::$LandingViewText);
        $I->seeElement(HomePage::$cmsModuleProfessionField);
        $I->seeElement(HomePage::$compareButton);
        $I->fillField(HomePage::$cmsModuleProfessionField, self::$professionSearchText);
        $I->seeElement(HomePage::$firstProfession);
        $I->click(HomePage::$firstProfession);
        $profession = $I->executeJS('return $("#cms_module_profession").val()');
        Fixtures::add('profession', strtoupper($profession));

        $nextUrl = $I->grabAttributeFrom(HomePage::$compareButton, 'href');
        Fixtures::add('riskAnalysisUrl', $nextUrl);
        //$I->click($homePage->compareButton);

    }
}