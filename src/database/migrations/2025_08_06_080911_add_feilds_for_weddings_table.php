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
        Schema::table('weddings', function (Blueprint $table) {
            $table->string('banner_image')->nullable();
            $table->string('website_url')->unique()->nullable();
            $table->string('background_music')->nullable();
            $table->string('animation_icon_type')->nullable();
            $table->integer('animation_icon_height')->nullable();
            $table->integer('animation_icon_width')->nullable();
            $table->string('show_names_and_wishes')->nullable();
            $table->boolean('show_money_box')->nullable();
            $table->boolean('play_background_music')->nullable();
            $table->boolean('show_animation')->nullable();
            $table->boolean('show_parents_names')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weddings', function (Blueprint $table) {
            $table->dropColumn([
                'banner_image',
                'website_url',
                'template_id',
                'background_music',
                'animation_icon_type',
                'animation_icon_height',
                'animation_icon_width',
                'show_names_and_wishes',
                'show_money_box',
                'play_background_music',
                'show_animation',
                'show_parents_names'
            ]);
        });
    }
};
