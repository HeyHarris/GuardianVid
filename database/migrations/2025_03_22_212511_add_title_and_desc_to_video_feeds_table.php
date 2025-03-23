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
        Schema::table('video_feeds', function (Blueprint $table) {
            $table->string('title')->nullable()->after('path');
            $table->string('description')->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('video_feeds', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            
        });
    }
};
