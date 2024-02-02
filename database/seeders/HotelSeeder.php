<?php

use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Hotel::class, 10)->create()->each(function ($hotel) {
            factory(\App\Models\Room::class, 10)->create([
                'hotel_id' => $hotel->id
            ])->each(function ($room) {
                factory(\App\Models\Feature::class, 10)->create([
                    'room_id' => $room->id
                ]);
                factory(\App\Models\Booking::class, 1)->create([
                    'room_id' => $room->id
                ]);
            });
            factory(\App\Models\Review::class, 10)->create([
                'hotel_id' => $hotel->id
            ]);
        });
    }
}
