<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo("test project's database");

$I->amOnPage('/login');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'a@a.a');
$I->fillField('password', 'a');

$I->click('Login');
$I->dontSeeCurrentUrlEquals('/login');



$I->wantTo("test users table");

$I->dontSeeInDatabase('users', [
    'id' => '2'
]);

$password = password_hash("b", PASSWORD_DEFAULT);

$I->haveInDatabase('users', [
    'name' => 'b', 'email' => 'b@b.b',
    'password' => $password, 'id' => '2'
]);

$I->seeInDatabase('users', [
    'id' => '2'
]);




$I->wantTo("test events table");

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

$I->dontSeeInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart->format('Y-m-d H:i'),'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration->format('H:i'),
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>2
]);

$event_id = $I->haveInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart->format('Y-m-d H:i'),'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration->format('H:i'),
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>2
]);

$I->seeInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart->format('Y-m-d H:i'),'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration->format('H:i'),
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>2
]);




$I->wantTo("test images table");

$image = base64_encode(file_get_contents('public/images/ticket.png'));

$I->dontSeeInDatabase('images', [
    'id' => '1'
]);

$I->haveInDatabase('images', ['image' => $image, 'event_id' => $event_id]);

$I->seeInDatabase('images', ['image' => $image, 'event_id' => $event_id]);





$I->wantTo("test observers table");

$I->dontSeeInDatabase('observers', ['id' => '1']);

$I->amOnPage('/events/'.$event_id);
$I->seeCurrentUrlEquals('/events/'.$event_id);

$I->see($name);
$I->click('Observe event');

$I->seeInDatabase('observers', ['id' => '1']);




$I->wantTo("test tickets table");

$I->dontSeeInDatabase('tickets', ['id' => '1']);

$I->amOnPage('/events/'.$event_id);
$I->seeCurrentUrlEquals('/events/'.$event_id);

$I->see($name);
$I->click('Buy ticket for only');

$I->seeInDatabase('tickets', ['id' => '1']);
