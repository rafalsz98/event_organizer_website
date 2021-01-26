<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Test events page');

$I->amOnPage('/events');
$I->seeCurrentUrlEquals('/events');

$name = "Testowany";
$name2 = "Event2";
$datestart='2021-05-04 18:00';
$duration='04:35';
$description='Event desc';
$place='Krakow';
$place2='Rybnik';
$latitude='12.12345678';
$longtitude='123.12345678';
$max_participants='32';
$current_participants='0';
$price='11';

$I->dontSeeInDatabase('events', [
    'datestart' => $datestart,
    'duration' => $duration,
    'name' => $name,
    'description' => $description,
    'place' => $place,
    'latitude' => $latitude,
    'longitude' => $longitude,
    'max_participants' => $max_participants,
    'current_participants' => $current_participants,
    'price' => $price
]);

$I->dontSee($name);
$I->dontSee($description);
$I->dontSee($place);
$I->dontSee($price);


$id = $I->haveInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart,'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration,
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>1]);

$I->amOnPage('/events');

$I->see($name);
$I->see($description);
$I->see($place);
$I->see($price);

$I->dontSee($name2);
$I->dontSee($place2);

$id2 = $I->haveInDatabase('events', ['name' => $name2, 'description' => $description,
    'datestart'=>$datestart,'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place2,'duration'=>$duration,
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>1]);

$I->amOnPage('/events');

$I->see($name2);
$I->see($place2);
