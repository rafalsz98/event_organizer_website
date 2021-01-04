<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('Check event controller');

$I->amOnPage('/events');
$I->seeCurrentUrlEquals('/events');

$name = "Event";
$datestart='2021-05-04 18:00';
$duration='04:35';
$description='Event desc';
$place='Krakow';
$latitude='12.12345678';
$longtitude='123.12345678';
$max_participants='32';
$current_participants='0';
$price='10.50';

$I->dontSeeInDatabase('events', [
    'datestart' => $datestart,
    'duration' => $duration,
    'name' => $name,
    'description' => $description,
    'place' => $place,
    'latitude' => $latitude,
    'longtitude' => $longtitude,
    'max_participants' => $max_participants,
    'current_participants' => $current_participants,
    'price' => $price
]);

$I->click('Create Event');

$I->seeCurrentUrlEquals('/events/create');

$I->click('Create');

$I->seeCurrentUrlEquals('/events/create');

$I->see('The name field is required.', 'li');
$I->see('The datestart field is required.', 'li');
$I->see('The duration field is required.', 'li');
$I->see('The description field is required.', 'li');
$I->see('The place field is required.', 'li');
$I->see('The latitude field is required.', 'li');
$I->see('The longtitude field is required.', 'li');
$I->see('The max_participants field is required.', 'li');
$I->see('The price field is required.', 'li');


$I->fillField('name', $name);
$I->fillField('datestart', $datestart);
$I->fillField('duration', $duration);
$I->fillField('description', $description);
$I->fillField('place', $place);
$I->fillField('latitude', $latitude);
$I->fillField('longtitude', $longtitude);
$I->fillField('max_participants', $max_participants);
$I->fillField('price', $price);

$I->click('Create');

$I->SeeInDatabase('events', [
    'datestart' => $datestart,
    'duration' => $duration,
    'name' => $name,
    'description' => $description,
    'place' => $place,
    'latitude' => $latitude,
    'longtitude' => $longtitude,
    'max_participants' => $max_participants,
    'current_participants' => $current_participants,
    'price' => $price
]);

$id = $I->grabFromDatabase('events', 'id', [
    'name' => $name
]);

$I->seeCurrentUrlEquals('/events/' . $id);

$I->see($name);
$I->see($description);
$I->see($price);


$I->amOnPage('/events');

$I->click($name);

$I->seeCurrentUrlEquals('/events/' . $id);

$I->amOnPage('/events');
$I->click('Edit Event');

$I->seeCurrentUrlEquals('/books/' . $id . '/edit');

$I->seeInField('name', $name);
$I->seeInField('datestart', $datestart);
$I->seeInField('duration', $duration);
$I->seeInField('description', $description);
$I->seeInField('place', $place);
$I->seeInField('latitude', $latitude);
$I->seeInField('longtitude', $longtitude);
$I->seeInField('max_participants', $max_participants);
$I->seeInField('price', $price);


$I->fillField('description', "");

$I->click('Update');

$I->seeCurrentUrlEquals('/books/' . $id . '/edit');
$I->see('The description field is required.', 'li');

$new_description = 'New Event Description';

$I->fillField('description', $new_description);
$I->click('Update');

$I->seeCurrentUrlEquals('/events/' . $id);

$I->see($new_description);

$I->dontSeeInDatabase('events', [
    'name' => $name,
    'description' => $description
]);

$I->seeInDatabase('books', [
    'name' => $name,
    'description' => $new_description
]);

$I->amOnPage('/events');
$I->click('Delete');

$I->seeCurrentUrlEquals('/events');

$I->dontSeeInDatabase('events', [
    'name' => $name,
    'description' => $new_description
]);
