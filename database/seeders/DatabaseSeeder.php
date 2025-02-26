<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Client',
            'last_name' => 'User',
            'email' => 'client@artly.ink',
            'username' => 'client',
            'password' => bcrypt('secret'),
            'type' => 'client',
            'display_name' => 'Client User'
        ]);

        User::create([
            'first_name' => 'Artist',
            'last_name' => 'User',
            'email' => 'artist@artly.ink',
            'username' => 'artist',
            'password' => bcrypt('secret'),
            'type' => 'artist',
            'display_name' => 'Artist User'
        ]);

        $statuses = ['pending', 'sketching', 'inking', 'coloring', 'final_review', 'completed', 'cancelled'];
        $titles = [
            'Character Portrait', 'Full Body Illustration', 'Chibi Commission',
            'Reference Sheet', 'Emote Set', 'Scene Illustration', 'Logo Design',
            'Character Design', 'Comic Page', 'Animation'
        ];

        $artist = User::where('email', 'artist@artly.ink')->first();
        $client = User::where('email', 'client@artly.ink')->first();

        // Create a service first
        $service = \App\Models\Service::create([
            'user_id' => $artist->id,
            'name' => 'Digital Art Commission',
            'description' => 'High quality digital art commission service',
            'base_price' => 50.00,
            'currency' => 'USD',
            'turnaround_time' => 7,
            'categories' => ['illustration', 'character_design'],
            'tags' => ['digital', 'character', 'illustration'],
            'is_active' => true
        ]);

        // Create 25 commissions
        for ($i = 0; $i < 25; $i++) {
            $status = $statuses[array_rand($statuses)];
            $title = $titles[array_rand($titles)];
            $created = now()->subDays(rand(1, 60));

            $commission = \App\Models\Commission::create([
                'client_id' => $client->id,
                'artist_id' => $artist->id,
                'service_id' => $service->id,
                'title' => $title . ' #' . ($i + 1),
                'description' => 'This is a sample commission description for ' . $title,
                'price' => $service->base_price,
                'currency' => $service->currency,
                'requirements' => ['size' => 'full body', 'background' => 'simple'],
                'attachments' => [],
                'status' => $status,
                'created_at' => $created,
                'due_date' => $created->addDays($service->turnaround_time),
                'completed_at' => $status === 'completed' ? $created->addDays(rand(1, 7)) : null
            ]);

            // Add some progress updates for non-pending commissions
            if ($status !== 'pending') {
                $progress_updates = [];
                $currentDate = $created;

                foreach(['accepted', $status] as $updateStatus) {
                    $currentDate = $currentDate->addDays(rand(1, 3));
                    $progress_updates[] = [
                        'status' => $updateStatus,
                        'message' => 'Updated status to ' . $updateStatus,
                        'timestamp' => $currentDate->toDateTimeString(),
                        'user_id' => $artist->id
                    ];
                }

                $commission->progress_updates = $progress_updates;
                $commission->save();
            }
        }
    }
}
