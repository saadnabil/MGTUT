<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset the auto-increment counter for the categories table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ServiceType::truncate();
        Service::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
         //
         // Define types and their translations
         $types = [
            [
                'en' => 'Packages',
                'de' => 'Pakete',
                'it' => 'Pacchetti',
                'fr' => 'Forfaits',
                'es' => 'Paquetes',
                'ru' => 'Пакеты',
                'ja' => 'パッケージ',
            ],
            [
                'en' => 'Scheduled services',
                'de' => 'Geplante Dienstleistungen',
                'it' => 'Servizi pianificati',
                'fr' => 'Services planifiés',
                'es' => 'Servicios programados',
                'ru' => 'Запланированные услуги',
                'ja' => '予定されたサービス',
            ],
            [
                'en' => 'Non-scheduled services',
                'de' => 'Nicht geplante Dienstleistungen',
                'it' => 'Servizi non programmati',
                'fr' => 'Services non planifiés',
                'es' => 'Servicios no programados',
                'ru' => 'Незапланированные услуги',
                'ja' => '予定されていないサービス',
            ],
        ];
        // Seed the service_types table
        foreach ($types as $key => $value) {
            ServiceType::create([
                'type' => json_encode($value),
            ]);
        }
        // Define services and their translations for each service type
        $servicesData = [
            1 => [
                ['title' => ['en' => 'Package', 'de' => 'Paket', 'it' => 'Pacchetto', 'fr' => 'Forfait', 'es' => 'Paquete', 'ru' => 'Пакет', 'ja' => 'パッケージ']],
                ['title' => ['en' => 'Honeymoon', 'de' => 'Flitterwochen', 'it' => 'Luna di miele', 'fr' => 'Lune de miel', 'es' => 'Luna de miel', 'ru' => 'Медовый месяц', 'ja' => 'ハネムーン']],
            ],
            2 => [
                ['title' => ['en' => 'Nile trip', 'de' => 'Nilreise', 'it' => 'Viaggio sul Nilo', 'fr' => 'Voyage sur le Nil', 'es' => 'Viaje por el Nilo', 'ru' => 'Поездка по Нилу', 'ja' => 'ナイルトリップ']],
                ['title' => ['en' => 'Excursion', 'de' => 'Exkursion', 'it' => 'Escursione', 'fr' => 'Excursion', 'es' => 'Excursión', 'ru' => 'Экскурсия', 'ja' => '遠足']],
            ],
            3 => [
                ['title' => ['en' => 'Cycling', 'de' => 'Radfahren', 'it' => 'Ciclismo', 'fr' => 'Cyclisme', 'es' => 'Ciclismo', 'ru' => 'Велоспорт', 'ja' => 'サイクリング']],
                ['title' => ['en' => 'Transports', 'de' => 'Transport', 'it' => 'Trasporti', 'fr' => 'Transports', 'es' => 'Transportes', 'ru' => 'Транспорт', 'ja' => '輸送']],
                ['title' => ['en' => 'Hot air balloon', 'de' => 'Heißluftballon', 'it' => 'Mongolfiera', 'fr' => 'Montgolfière', 'es' => 'Globo aerostático', 'ru' => 'Воздушный шар', 'ja' => '熱気球']],
            ],
        ];
        // Seed the services table
        foreach ($servicesData as $serviceTypeId => $services) {
            foreach ($services as $service) {
                Service::create([
                    'title' => json_encode($service['title']),
                    'service_type_id' => $serviceTypeId,
                ]);
            }
        }

    }
}
