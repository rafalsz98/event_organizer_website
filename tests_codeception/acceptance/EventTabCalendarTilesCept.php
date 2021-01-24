<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check if shortTab.Big displays correct info');

$I->amOnPage('/debug/test-eventTab-calendarTileBig');
$I->see('SAMURAI', 'strong');
$I->click('SAMURAI');
$I->seeInCurrentUrl('/events/1');

$I->wantTo('check if shortTab.Small displays correct info');
$I->amOnPage('/debug/test-eventTab-calendarTileSmall');
$I->see('SAMURAI', 'strong');
$I->click('SAMURAI');
$I->seeInCurrentUrl('/events/1');
