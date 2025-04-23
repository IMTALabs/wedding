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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('wedding_date')->nullable();
            $table->string('bride_name')->nullable();
            $table->string('groom_name')->nullable();
            $table->text('about_bride')->nullable();
            $table->text('about_groom')->nullable();
            $table->string('bride_mother')->nullable();
            $table->string('brider_father')->nullable();
            $table->string('groom_mother')->nullable();
            $table->string('groom_father')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('template_id')->nullable()->constrained('settup_templates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
