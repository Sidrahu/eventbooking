<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Exquisite Dining Experience',
            'description' => 'Join us for a delightful evening dinner prepared by top chefs',
            'event_date' => Carbon::create(2024, 11, 15), // Carbon date
            'event_time' => '20:00:00', // 24-hour format
            'location' => 'Elegant Banquet Hall, 123 Main St., City Center',
            'image_url' => '/dist/assets/img/ev1.webp',
      
        ]);

        Event::create([
            'title' => 'Sports Gala',
            'description' => 'Join us for an exhilarating evening celebrating sportsmanship and achievement.',
            'event_date' => Carbon::create(2024, 11, 5), // Carbon date
            'event_time' => '14:00:00', // 24-hour format for 2 PM
            'location' => 'Sports Complex, 456 Sports Ave., Athletic City',
            'image_url' => '/dist/assets/img/sp1.avif',
         
        ]);

        Event::create([
            'title' => 'Skill Development Workshop',
            'description' => 'Enhance your skills at our interactive workshop.',
            'event_date' => Carbon::create(2024, 11, 20), // Carbon date
            'event_time' => '10:00:00', // Time for 10 AM
            'location' => 'Professional Development Center, 789 Learning St., Knowledge City',
            'image_url' => '/dist/assets/img/sk.webp',
   
        ]);
    }
}
