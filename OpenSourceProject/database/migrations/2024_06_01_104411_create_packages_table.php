<?php

use App\Models\Destination;
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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Destination::class);
            $table->integer('duration'); // Duration in days
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->json('itinerary'); // JSON field to store detailed itinerary
            $table->json('inclusions'); // JSON field to store inclusions
            $table->json('exclusions'); // JSON field to store exclusions
            $table->json('image_gallery'); // JSON field to store image URLs
            $table->string('accommodation_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
