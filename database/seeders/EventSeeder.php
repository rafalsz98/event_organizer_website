<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dates = [
            '2021-01-30 18:00',
            '2021-01-30 20:00',
            '2021-01-29 18:00',
            '2021-01-02 18:00',
            '2021-01-04 18:00',
            '2021-01-06 18:00',
            '2021-01-05 18:00',
            '2021-01-05 18:00',
            '2021-01-10 18:00',
            '2021-01-15 18:00',
            '2021-01-31 18:00',
            '2021-02-05 18:00',
            '2021-02-15 18:00',
            '2021-02-17 18:00',
        ];
        $i = 1;
        foreach ($dates as $date) {
            DB::table('events')->insert([
                'id' => strval($i),
                'datestart' => $date,
                'duration' => '2:30',
                'name' => 'Test event ' . strval($i),
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet eget nibh sit amet pellentesque. Donec lacus sapien, commodo eu augue a, hendrerit ultrices risus. Nullam scelerisque aliquam sollicitudin. In auctor mauris eu dolor bibendum, auctor faucibus velit lacinia. Nunc id turpis nec odio lobortis ultrices vestibulum et magna. Duis enim magna, gravida ut finibus non, facilisis a leo. Pellentesque pulvinar tempus ultrices. Suspendisse vehicula id metus et vestibulum.

                                    In hac habitasse platea dictumst. Pellentesque et dolor sed elit accumsan condimentum eu a dolor. Cras lacinia, augue sit amet venenatis aliquam, elit arcu laoreet nisi, eget pretium nunc eros aliquam nibh. Quisque urna dolor, vulputate et cursus id, tincidunt id massa. Fusce vehicula ante nec magna viverra lobortis. Ut id volutpat velit. Etiam at erat interdum, luctus lacus id, vestibulum dui. Maecenas quis scelerisque erat. Sed semper eros tellus, at blandit sapien mollis quis. Morbi semper, leo sit amet vulputate dictum, ipsum libero laoreet orci, eu porta metus quam a sapien. Cras fermentum vitae elit ut gravida. Donec finibus risus nec luctus hendrerit. Vestibulum malesuada, felis vitae ultricies sodales, purus mauris porta erat, quis faucibus purus orci at sem.

                                    Proin semper dui et nisi iaculis, ac ultrices urna tempor. Donec quis facilisis eros. Aliquam erat volutpat. Cras interdum elit nec tellus ornare, a consequat nulla dignissim. Donec faucibus nec tortor vel sagittis. Etiam vel ex pharetra, commodo metus quis, gravida eros. Morbi velit nulla, finibus in magna malesuada, convallis feugiat lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla maximus tincidunt mauris, a sodales erat. Aliquam ut lacus eget risus lobortis ultricies. Phasellus ut quam tellus. Nunc quam justo, pulvinar vitae rutrum sed, varius sed risus. In rhoncus, massa sit amet pellentesque consectetur, dolor sapien porttitor nunc, a commodo sapien felis non sem. Cras ac sem sed magna malesuada vestibulum eu ac eros. Suspendisse viverra scelerisque diam, nec consectetur sem pellentesque a. ',
                'place' => 'Somewhere in this sad world',
                'latitude' => 10 + $i,
                'longitude' => 10 + $i,
                'max_participants' => 200,
                'current_participants' => 10,
                'price' => 50,
                'user_id' => 10
            ]);
            $i++;
        }

        $dates = [
            '2021-01-15 18:00',

        ];
        foreach ($dates as $date) {
            DB::table('events')->insert([
                'id' => strval($i),
                'datestart' => $date,
                'duration' => '2:30',
                'name' => 'Test event ' . strval($i),
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet eget nibh sit amet pellentesque. Donec lacus sapien, commodo eu augue a, hendrerit ultrices risus. Nullam scelerisque aliquam sollicitudin. In auctor mauris eu dolor bibendum, auctor faucibus velit lacinia. Nunc id turpis nec odio lobortis ultrices vestibulum et magna. Duis enim magna, gravida ut finibus non, facilisis a leo. Pellentesque pulvinar tempus ultrices. Suspendisse vehicula id metus et vestibulum.

                                    In hac habitasse platea dictumst. Pellentesque et dolor sed elit accumsan condimentum eu a dolor. Cras lacinia, augue sit amet venenatis aliquam, elit arcu laoreet nisi, eget pretium nunc eros aliquam nibh. Quisque urna dolor, vulputate et cursus id, tincidunt id massa. Fusce vehicula ante nec magna viverra lobortis. Ut id volutpat velit. Etiam at erat interdum, luctus lacus id, vestibulum dui. Maecenas quis scelerisque erat. Sed semper eros tellus, at blandit sapien mollis quis. Morbi semper, leo sit amet vulputate dictum, ipsum libero laoreet orci, eu porta metus quam a sapien. Cras fermentum vitae elit ut gravida. Donec finibus risus nec luctus hendrerit. Vestibulum malesuada, felis vitae ultricies sodales, purus mauris porta erat, quis faucibus purus orci at sem.

                                    Proin semper dui et nisi iaculis, ac ultrices urna tempor. Donec quis facilisis eros. Aliquam erat volutpat. Cras interdum elit nec tellus ornare, a consequat nulla dignissim. Donec faucibus nec tortor vel sagittis. Etiam vel ex pharetra, commodo metus quis, gravida eros. Morbi velit nulla, finibus in magna malesuada, convallis feugiat lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla maximus tincidunt mauris, a sodales erat. Aliquam ut lacus eget risus lobortis ultricies. Phasellus ut quam tellus. Nunc quam justo, pulvinar vitae rutrum sed, varius sed risus. In rhoncus, massa sit amet pellentesque consectetur, dolor sapien porttitor nunc, a commodo sapien felis non sem. Cras ac sem sed magna malesuada vestibulum eu ac eros. Suspendisse viverra scelerisque diam, nec consectetur sem pellentesque a. ',
                'place' => 'Somewhere in this sad world',
                'latitude' => 10 + $i,
                'longitude' => 10 + $i,
                'max_participants' => 200,
                'current_participants' => 10,
                'price' => 50,
                'user_id' => 1
            ]);
            $i++;
        }

        // add event with full participants
        DB::table('events')->insert([
            'datestart' => '2021-01-27 15:00',
            'duration' => '1:30',
            'name' => 'What a cool event',
            'description' => ' Lorem ipsum dolor sit nec tellus ornare, a consequat nulla dignissim. Donec faucibus nec tortor vel sagittis. Etiam vel ex pharetra, commodo metus quis, gravida eros. Morbi velit nulla, finibus in magna malesuada, convallis feugiat lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla maximus tincidunt mauris, a sodales erat. Aliquam ut lacus eget risus lobortis ultricies. Phasellus ut quam tellus. Nunc quam justo, pulvinar vitae rutrum sed, varius sed risus. In rhoncus, massa sit amet pellentesque consectetur, dolor sapien porttitor nu pellentesque a. ',
            'place' => 'Alabama',
            'latitude' => 6.1,
            'longitude' => 6.1,
            'max_participants' => 50,
            'current_participants' => 50,
            'price' => 100,
            'user_id' => 10
        ]);
    }
}
