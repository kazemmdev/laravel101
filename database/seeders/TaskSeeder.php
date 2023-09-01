<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // create a user with specified credentials
        $user = User::factory()->create(['email' => 'test@test.dev']);

        // init tag with defined value
        $this->call(TagSeeder::class);

        // create 5 random tasks for only user
        $tasks = Task::factory(5)->create(['user_id' => $user->id]);

        // assosiate each generated tasks with 2 predefined tags
        foreach ($tasks as $task) {
            $tags = Tag::query()->inRandomOrder()->take(2)->pluck('id');
            $task->tags()->attach($tags);
        }
    }
}
