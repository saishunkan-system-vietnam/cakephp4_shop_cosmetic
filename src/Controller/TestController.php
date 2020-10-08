<?php

namespace App\Controller;

use App\Service\Event;
use Cake\ORM\TableRegistry;
use Faker\Factory;

class TestController extends AppController
{
    public function abc()
    {
        $faker = Factory::create();
        $trademarkTable = TableRegistry::getTableLocator()->get('User');
        for ($i = 0; $i < 100; $i++) {
            $trademark = $trademarkTable->newEmptyEntity();
            $trademark->email = $faker->unique()->email;
            $trademark->password = md5($faker->email);
            $trademark->avatar = $faker->unique()->domainWord;
            $trademark->full_name = $faker->userName;
            $trademark->phone = $faker->unique()->e164PhoneNumber;
            $trademark->address = $faker->streetAddress;
            $trademark->gender = $faker->boolean == true ? 1 : 0;
            $trademark->deleted = $faker->boolean == true ? 1 : 0;

            $trademarkTable->save($trademark);
        }
    }

    public function pusher()
    {
        Event::Pusher(['hello'=>'Xin chào các bạn','hahaha'=>"cười"],'my-channel','my-event');
    }

}
