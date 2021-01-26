<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Test show page and methods from event controller');

$I->amOnPage('/login');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'a@a.a');
$I->fillField('password', 'a');

$I->click('Login');
$I->dontSeeCurrentUrlEquals('/login');

$name='Samurai';
$description='dobre';
$place='Night city';
$datestart='2021-05-04 18:00:00';
$current_participants=10;
$max_participants=200;
$duration='02:30:00';
$latitude='10.00000000';
$longitude='10.00000000';
$price='0';

$id = $I->haveInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart,'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration,
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>1]);

$id2 = $I->haveInDatabase('events', ['name' => $name, 'description' => $description,
    'datestart'=>$datestart,'current_participants'=>$current_participants,
    'max_participants'=>$max_participants,'place'=>$place,'duration'=>$duration,
    'latitude'=>$latitude,'longitude'=>$longitude,'price'=>$price,'user_id'=>5]);

$I->amOnPage('/events/'.$id);
$I->seeCurrentUrlEquals('/events/'.$id);

$I->see($name);
$I->see($description);
$I->see($place);
$I->see($price);
$I->see(date( date('Y-m-d H:i',strtotime($datestart))));

$I->see('Edit');
$I->see('Delete');

$I->click('Edit');
$I->seeCurrentUrlEquals('/events/'.$id.'/edit');

$I->amOnPage('/events/'.$id);
$I->seeCurrentUrlEquals('/events/'.$id);

$I->seeInDatabase('events', ['id' => $id]);
$I->click('Delete');
$I->dontSeeInDatabase('events', ['id' => $id]);

$I->amOnPage('/events/'.$id2);
$I->seeCurrentUrlEquals('/events/'.$id2);

$I->see($name);
$I->see($description);
$I->see($place);
$I->see($price);
$I->see(date( date('Y-m-d H:i',strtotime($datestart))));

$I->see('Buy ticket');
$I->see('Observe');
$I->dontSee('Unobserve');

$I->dontSeeInDatabase('observers', ['event_id' => $id2,'user_id'=>1]);
$I->click('Observe');
$I->seeInDatabase('observers', ['event_id' => $id2,'user_id'=>1]);

$I->see('Buy ticket');
$I->see('Unobserve');

$I->seeInDatabase('observers', ['event_id' => $id2,'user_id'=>1]);
$I->click('Unobserve');
$I->dontSeeInDatabase('observers', ['event_id' => $id2,'user_id'=>1]);

$I->see('Buy ticket');
$I->see('Observe');
$I->dontSee('Unobserve');

$I->dontSeeInDatabase('tickets', ['event_id' => $id2,'user_id'=>1]);
$I->click('Buy ticket');
$I->seeInDatabase('tickets', ['event_id' => $id2,'user_id'=>1]);

$I->see('Download ticket');
$I->dontSee('Observe');
$I->dontSee('Unobserve');
