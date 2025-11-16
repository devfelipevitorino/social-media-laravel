<?php

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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')            
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('type', 50);             
            $table->text('message');

            $table->foreignId('related_user_id')    
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('post_id')            
                ->nullable()
                ->constrained('posts')
                ->onDelete('cascade');

            $table->foreignId('comment_id')       
                ->nullable()
                ->constrained('comments')
                ->onDelete('cascade');

            $table->boolean('read')->default(false);

            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
