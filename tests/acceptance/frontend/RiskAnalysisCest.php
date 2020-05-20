<?php

namespace acceptance\frontend;

use Page\Acceptance\RiskAnalysisPage;
use AcceptanceTester;
use Codeception\Util\Fixtures;
use Page\Acceptance\HomePage;
use Step\Acceptance\Action;

date_default_timezone_set('Africa/Lagos');

class RiskAnalysisCest
{
    /**
     * @param AcceptanceTester $I
     * @param HomePageCest $homePageCest
     * @param Action $user
     */
    public function _before(AcceptanceTester $I, HomePageCest $homePageCest, Action $user)
    {
        if (!Fixtures::exists('riskAnalysisUrl')) {
            $I->amOnPage(HomePage::$URL);
            $user->closeModalPopup();
            $homePageCest->shouldBeAbleToEnterTrade($I);
        }
        $I->amOnUrl(Fixtures::get('riskAnalysisUrl'));
        $user->closeModalPopup();
    }


    /**
     * @param AcceptanceTester $I
     * @throws \Exception
     */
    public function shouldBeAbleToSelectInsuranceOptions(AcceptanceTester $I)
    {

        $I->waitForText(RiskAnalysisPage::$HeaderText . Fixtures::get('profession'));
        $I->see(RiskAnalysisPage::$HeaderText . Fixtures::get('profession'));
        $I->scrollTo(RiskAnalysisPage::$productLinkButton);
        $I->seeElement(RiskAnalysisPage::$productLinkButton);
        $nextUrl = $I->grabAttributeFrom(RiskAnalysisPage::$productLinkButton, 'href');
        Fixtures::add('riskAssessmentUrl', $nextUrl);
        //$I->click('div[data-product-tag="vermoegen"] .col-xs-12 .product-link .btn');

    }
}