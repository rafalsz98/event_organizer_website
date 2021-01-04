<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('make early tests for database');

$I->dontSeeInDatabase('users', [
    'id' => '1'
]);

$I->dontSeeInDatabase('events', [
    'id' => '1'
]);

$I->dontSeeInDatabase('images', [
    'id' => '1'
]);

$I->dontSeeInDatabase('observers', [
    'id' => '1'
]);

$I->dontSeeInDatabase('tickets', [
    'id' => '1'
]);
