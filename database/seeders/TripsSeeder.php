<?php

namespace Database\Seeders;

use App\Models\BikeTrip;
use App\Models\ExursionTip;
use App\Models\HoneymoonTrip;
use App\Models\HotBallonTrip;
use App\Models\NileTrip;
use App\Models\PackageTrip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $titles = [
            'Mountain Adventure',
            'Alpine Challenge',
            'Scenic Trail Expedition',
            'Wilderness Exploration Ride',
            'Peak-to-Peak Expedition',
            'Epic Mountain Quest',
            'Highland Discovery Tour',
        ];

        $descriptions = [
            'Embark on an exhilarating mountain biking adventure through challenging terrains and breathtaking landscapes.',
            'Conquer the alpine trails with our adrenaline-pumping mountain cycling experience. A challenge for the daring!',
            'Join us on a scenic trail expedition, exploring the beauty of nature while enjoying the thrill of mountain biking.',
            'Experience the ultimate wilderness exploration ride. Discover hidden gems and rugged terrains on this cycling journey.',
            'Embark on a peak-to-peak expedition, conquering mountain heights and enjoying panoramic views along the way.',
            'Gear up for an epic mountain quest, where every trail tells a story and every summit is a triumph.',
            'Discover the highlands on this cycling tour, where adventure meets tranquility amidst stunning landscapes.',
        ];

        $locations = [
            'Mountain Range',
            'Alpine Region',
            'Scenic Trails',
            'Wilderness',
            'High Peaks',
            'Epic Trails',
            'Highland Retreat',
        ];

        $tags = [
            'de' => 'Paket',
            'en' => 'Package',
            'es' => 'Paquete',
            'fr' => 'Forfait',
            'it' => 'Pacchetto',
            'ja' => 'パッケージ',
            'ru' => 'Пакет',
        ];

        for ($i = 0; $i < count($titles); $i++) {
            $title = [
                'de' => "{$titles[$i]} DE",
                'en' => "{$titles[$i]} EN",
                'es' => "{$titles[$i]} ES",
                'fr' => "{$titles[$i]} FR",
                'it' => "{$titles[$i]} IT",
                'ja' => "{$titles[$i]} JA",
                'ru' => "{$titles[$i]} RU",
            ];

            $description = [
                'de' => "{$descriptions[$i]} DE",
                'en' => "{$descriptions[$i]} EN",
                'es' => "{$descriptions[$i]} ES",
                'fr' => "{$descriptions[$i]} FR",
                'it' => "{$descriptions[$i]} IT",
                'ja' => "{$descriptions[$i]} JA",
                'ru' => "{$descriptions[$i]} RU",
            ];

            $location = [
                'de' => "{$locations[$i]} DE",
                'en' => "{$locations[$i]} EN",
                'es' => "{$locations[$i]} ES",
                'fr' => "{$locations[$i]} FR",
                'it' => "{$locations[$i]} IT",
                'ja' => "{$locations[$i]} JA",
                'ru' => "{$locations[$i]} RU",
            ];

            $tag = [
                'de' => 'Paket',
                'en' => 'Package',
                'es' => 'Paquete',
                'fr' => 'Forfait',
                'it' => 'Pacchetto',
                'ja' => 'パッケージ',
                'ru' => 'Пакет',
            ];

            HoneymoonTrip::create([
                // 'stock' => rand(1, 100),
                // 'food_allowence' => 1,
                'title' => json_encode($title),
                'description' => json_encode($description),
                'price' => rand(50, 200),
                'price_after_sale' => rand(40, 180),
                'discount' => rand(0, 20),
                'background' => "background_url_{$i}.jpg",
                'tag' => json_encode($tag),
                'location' => json_encode($location),
                'resort' => json_encode($location),
                'guest_count_from' => 1,
                'guest_count_to' => 3,
                'min_age' => 21,
                'max_age' => 26,
                'date' => now()->addDays($i),
                'time' => "10:00 AM",
                'service_id' => 7,
            ]);
        }
    }
}
