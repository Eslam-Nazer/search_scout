<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            DB::beginTransaction();
            $table->id();
            $table->string('comment');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('post_id')->nullable()->constrained('posts');
            $table->timestamps();
            DB::commit();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
