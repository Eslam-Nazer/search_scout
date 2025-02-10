<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Eslam",
            "email" => "eslam@admin.com",
            "password" => Hash::make(12345678),
        ]);

        User::factory(5)->create()->each(function ($user) {
            Post::factory(3)->create([
                "user_id" => $user->id,
            ])->each(function ($post) use ($user) {
                Comment::factory(3)->create([
                    "user_id" => $user->id,
                    "post_id" => $post->id,
                ]);
            });
        });
    }
}
