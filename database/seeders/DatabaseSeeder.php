<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory()
        //     ->has(Task::factory()->count(3))
        //     ->create();

            

        // User::factory()
        //     ->count(5)
        //     ->create();

         $lastMonth = Carbon::now()->subMonth();
        $createdAt = fake()->dateTimeBetween($lastMonth);

        $tasks=Task::factory()
            ->count(1)
            ->create();

        User::factory()
            ->count(2)
            ->hasAttached($tasks,['created_at'=>$createdAt,'updated_at'=>$createdAt])
            ->create();
        
    }
}
