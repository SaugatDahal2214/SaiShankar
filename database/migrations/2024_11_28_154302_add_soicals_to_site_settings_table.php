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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('Social_icon_one')->nullable()->after('Social_link_three');
            $table->string('Social_icon_two')->nullable()->after('social_icon_one');
            $table->string('Social_icon_three')->nullable()->after('social_icon_two');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['social_icon_one', 'social_icon_two', 'social_icon_three']);
        });
    }
};
