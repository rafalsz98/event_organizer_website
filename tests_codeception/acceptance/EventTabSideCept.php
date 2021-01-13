<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('testing <x-event-tab.side component');

$I->amOnPage('/debug/test-sideTab');
$I->see('Power Rangers');
$I->see('15-01-2021 15:30', 'p');
$I->see('Event duration: 2 h', 'p');
$I->see('27/199', 'p');
$I->click('Details');
$I->amOnPage('/events/1');
