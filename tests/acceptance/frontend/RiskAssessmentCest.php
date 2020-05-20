<?php


namespace acceptance\frontend;


use AcceptanceTester;
use Codeception\Util\Fixtures;
use Page\Acceptance\HomePage;
use Page\Acceptance\RiskAssessmentPage;
use Step\Acceptance\Action;

class RiskAssessmentCest
{
    private static $annualFee = "1200";

    /**
     * @param AcceptanceTester $I
     * @param HomePageCest $homePageCest
     * @param RiskAnalysisCest $riskAnalysisCest
     * @param Action $user
     * @throws \Exception
     */
    public function _before(AcceptanceTester $I, HomePageCest $homePageCest, RiskAnalysisCest $riskAnalysisCest, Action $user)
    {
        if (!Fixtures::exists('riskAssessmentUrl')) {
            $I->amOnPage(HomePage::$URL);
            $user->closeModalPopup();
            $homePageCest->shouldBeAbleToEnterTrade($I);
            $riskAnalysisCest->shouldBeAbleToSelectInsuranceOptions($I);
        }
        $I->amOnUrl(Fixtures::get('riskAssessmentUrl'));
    }


    /**
     * @param AcceptanceTester $I
     * @param Action $user
     * @throws \Exception
     */
    public function shouldBeToCompleteTheAssessmentQuestionnaire(AcceptanceTester $I, Action $user)
    {

        $user->closeModalPopup();
        $I->waitForText(RiskAssessmentPage::$operationInformationText);
        $I->see(RiskAssessmentPage::$operationInformationText);
        $I->see(Fixtures::get('profession'));
        $I->scrollTo(RiskAssessmentPage::$questionnaireSubmitButton);
        $I->click(RiskAssessmentPage::$questionnaireSubmitButton);

        $user->closeModalPopup();
        $I->waitForText(RiskAssessmentPage::$activitiesText);
        $I->see(RiskAssessmentPage::$activitiesText);
        $I->see(Fixtures::get('profession'));
        $I->scrollTo(RiskAssessmentPage::$questionnaireSubmitButton);
        $I->click(RiskAssessmentPage::$questionnaireSubmitButton);

        $user->closeModalPopup();
        $I->waitForText(RiskAssessmentPage::$insuranceCoverageText);
        $I->see(RiskAssessmentPage::$insuranceCoverageText);


        $orgDate = date('d.m.y');
        $I->executeJS('return $(arguments[0]).val(arguments[1])', [RiskAssessmentPage::$dateOfEstablishmentField, $orgDate]);
        $I->scrollTo(RiskAssessmentPage::$annualFeeField);
        $I->fillField(RiskAssessmentPage::$annualFeeField, self::$annualFee);
        $I->scrollTo(RiskAssessmentPage::$questionnaireSubmitButton);
        $I->click(RiskAssessmentPage::$questionnaireSubmitButton);

        $user->closeModalPopup();
        $I->waitForText(RiskAssessmentPage::$thanksText);
        $I->see(Fixtures::get('profession'));

    }

}