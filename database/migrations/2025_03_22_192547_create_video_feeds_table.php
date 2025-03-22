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
        Schema::create('video_feeds', function (Blueprint $table) {
            $table->id();

            $table->string('path');

            $table->unsignedBigInteger('uploaded_by');
            $table->foreign('uploaded_by')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete(); 
                
            $table->timestamp('uploaded_date')->useCurrent();
            $table->bigInteger('view_count')->nullable(); 
            $table->boolean('needs_moderation')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_feeds');
    }
};
