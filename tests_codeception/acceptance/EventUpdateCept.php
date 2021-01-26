<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Test update page');

$I->amOnPage('/login');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'a@a.a');
$I->fillField('password', 'a');

$I->click('Login');
$I->dontSeeCurrentUrlEquals('/login');

$name='Samurai';
$description='dobre dobre';
$place='Night city';

$datestart= new DateTime();
$interval = new DateInterval('P1M');
$datestart->add($interval);

$current_participants=0;
$max_participants=200;
$duration= new DateTime('02:30:00');
$latitude='10.00000000';
$longitude='10.00000000';
$price='99';

$id = $I->haveInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart->format('Y-m-d H:i'),'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration->format('H:i'),
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>1
]);


$I->amOnPage('/events/'.$id.'/edit');

$I->dontSee('Whoops! Something went wrong.');
$I->dontSee('The datestart date field is required.', 'li');
$I->dontSee('The datestart time field is required.', 'li');
$I->dontSee('The duration field is required.', 'li');
$I->dontSee('The name field is required.', 'li');
$I->dontSee('The description field is required.', 'li');
$I->dontSee('The place field is required.', 'li');
$I->dontSee('The latitude field is required.', 'li');
$I->dontSee('The longitude field is required.', 'li');
$I->dontSee('The max participants field is required.', 'li');
$I->dontSee('The price field is required.', 'li');



$I->wantTo("check validation on the edit page");
$datestart_old= new DateTime('1999-05-04 13:30');

$I->fillField('datestart_date', $datestart_old->format('Y-m-d'));

$I->click('UPDATE');

$I->see('The datestart date must be a date after or equal to');




$I->wantTo("check that error disappears after page refresh");
$I->amOnPage('/events/'.$id.'/edit');
$I->dontSee('Whoops! Something went wrong. ');




$I->wantTo("correctly edit the event");
$newName="A new event";

$I->fillField('name', $newName);

$I->click('UPDATE');

$I->haveInDatabase('events', ['name' => $newName, 'description' => $description,
    'datestart'=>$datestart->format('Y-m-d H:i'),'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration->format('H:i'),
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>1
]);
