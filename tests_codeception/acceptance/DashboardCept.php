<?php
$I = new AcceptanceTester($scenario);
$I->wantTo("login");
$I->amOnPage('/dashboard');
$I->seeInCurrentUrl('/login');
$I->fillField('email', 'a@a.a');
$I->fillField('password', 'a');
$I->click('Login');
$I->seeInCurrentUrl('/dashboard');

$I->wantTo('See empty dashboard page');
$I->see("No events! Go observe some cool events and come back");
$I->dontSee("SAMURAI");

$I->wantTo('See existing event');
$I->haveInDatabase('events', [
    'id' => 1,
    'datestart' => '2021-01-25 20:00',
    'duration' => '2:30',
    'name' => 'SAMURAI',
    'description' => '...',
    'place' => 'Night City',
    'latitude' => 10,
    'longitude' => 10,
    'max_participants' => 100,
    'current_participants' => 12,
    'price' => 1,
    'user_id' => 10
]);
$I->haveInDatabase('observers', [
    'id' => 1,
    'event_id' => 1,
    'user_id' => 1
]);

$I->seeInDatabase('events', ['id' => 1]);
$I->amOnPage('/dashboard');

$I->see('SAMURAI');
$I->see('25-01-2021 20:00');
$I->see('100');
$I->see('12');
$I->see('Night City');
$I->see('2:30 h');
