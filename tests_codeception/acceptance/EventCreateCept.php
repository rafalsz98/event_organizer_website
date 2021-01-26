<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Test create page');

$I->amOnPage('/login');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'a@a.a');
$I->fillField('password', 'a');

$I->click('Login');
$I->dontSeeCurrentUrlEquals('/login');

$name='Samurai';
$description='dobre dobre';
$place='Night city';
$datestart='2021-05-05 11:30:00';
$current_participants=10;
$max_participants=200;
$duration='02:30:00';
$latitude='10.00000000';
$longitude='10.00000000';
$price='99';

$I->dontSeeInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart,'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration,
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>1]);

$I->amOnPage('/events/create');

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

$I->see('Name');
$I->see('Date');
$I->see('Time');
$I->see('Duration');
$I->see('Number of tickets');
$I->see('Price for a ticket');
$I->see('Description');
$I->see('Placename');
$I->see('Now point it on the map:');
$I->see('Choose images for your event');

$I->click('Create');

$I->seeCurrentUrlEquals('/events/create');

$I->see('Whoops! Something went wrong. ');
$I->see('The datestart date field is required.', 'li');
$I->see('The datestart time field is required.', 'li');
$I->see('The duration field is required.', 'li');
$I->see('The name field is required.', 'li');
$I->see('The description field is required.', 'li');
$I->see('The place field is required.', 'li');
$I->see('The latitude field is required.', 'li');
$I->see('The longitude field is required.', 'li');
$I->see('The max participants field is required.', 'li');
$I->see('The price field is required.', 'li');

$I->wantTo("check that error disappears after page refresh");
$I->amOnPage("/events/create");
$I->dontSee('Whoops! Something went wrong.');

$I->fillField('name', $name);
$I->fillField('datestart_date', '05-05-2021');
$I->fillField('datestart_time', '11:30' );
$I->fillField('duration', '02:30');
$I->fillField('max_participants', $max_participants);
$I->fillField('price', $price);
$I->fillField('description', $description);
$I->fillField('place', $place);
$I->fillField('latitude', $latitude);
$I->fillField('longitude', $longitude);

$I->click('Create');

$I->seeInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart,'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration,
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>1
]);
