<?php
//
//
//namespace acceptance\frontend;
//
//
//use AcceptanceTester;
//use Codeception\Util\Fixtures;
//use Page\Acceptance\HomePage;
//use Step\Acceptance\Action;
//
//class AnalysisCest
//{
//    /**
//     * @param AcceptanceTester $I
//     * @param HomePageCest $homePageCest
//     * @param Action $user
//     */
//    public function _before(AcceptanceTester $I, HomePageCest $homePageCest, Action $user)
//    {
//        if(!Fixtures::exists('riskAnalysisUrl')){
//            $I->amOnPage(HomePage::$URL);
//            $homePageCest->landingView($I, $user);
//        }
//        $I->amOnUrl(Fixtures::get('riskAnalysisUrl'));
//    }
//
//
//    /**
//     * @param AcceptanceTester $I
//     * @param Action $user
//     * @throws \Exception
//     */
//    public function frontpageWorks(AcceptanceTester $I, Action $user)
//    {
//
//        $user->closeModalPopup();
//        $I->waitForText("RISIKOANALYSE FÜR CAFE");
//        $I->scrollTo('div[data-product-tag="vermoegen"] .col-xs-12 .product-link .btn');
//        $I->click('div[data-product-tag="vermoegen"] .col-xs-12 .product-link .btn');
//        $I->waitForText("VERMÖGENSSCHADENHAFTPFLICHT, CAFE");
//
//        $user->closeModalPopup();
//        $I->waitForText("VERMÖGENSSCHADENHAFTPFLICHT, CAFE");
//        $I->scrollTo('#questionnaire_submit');
//        $I->click("#questionnaire_submit");
//
//        $user->closeModalPopup();
//        $I->waitForText("VERMÖGENSSCHADENHAFTPFLICHT, CAFE");
//        $I->waitForText("Tätigkeiten im Ausland");
//        $I->scrollTo('#questionnaire_submit');
//        $I->click("#questionnaire_submit");
//
//        $user->closeModalPopup();
//        $I->waitForText("VERMÖGENSSCHADENHAFTPFLICHT, CAFE");
//        $I->waitForText("Gewünschter Versicherungsschutz");
//
//
//        $orgDate = date('d.m.y');
//        $I->executeJS('return $("#questionnaire_categories_9_questions_20001_inputAnswerString").val(arguments[0])', [$orgDate]);
//        $I->scrollTo("#questionnaire_categories_5_questions_10147_inputAnswerString");
//        $I->fillField("#questionnaire_categories_5_questions_10147_inputAnswerString", "1200");
//        $I->scrollTo('#questionnaire_submit');
//        $I->click("#questionnaire_submit");
//
//        $user->closeModalPopup();
//        $I->waitForText("VERMÖGENSSCHADENHAFTPFLICHT, CAFE");
//        $I->waitForText("Vielen Dank für die Eingaben!");
//
//    }
//}