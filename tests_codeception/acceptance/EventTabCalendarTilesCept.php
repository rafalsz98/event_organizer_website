<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check if shortTab.Big displays correct info');

$I->amOnPage('/debug/test-eventTab-calendarTileBig');
$I->see('SAMURAI', 'strong');
$I->see('15:30 [2:30h]', 'p');
$I->click('SAMURAI');
$I->amOnPage('/events/1');

$I->wantTo('check if shortTab.Small displays correct info');
$I->amOnPage('/debug/test-eventTab-calendarTileSmall');
$I->see('SAMURAI', 'strong');
$I->dontSee('15:30 [2:30h]', 'p');
$I->click('SAMURAI');
$I->amOnPage('/events/1');
