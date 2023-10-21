<?php

use App\Models\Author;
use App\Models\Category;
use App\Models\Style;
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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('image', 255);
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('year', 4);
            $table->unsignedDecimal('price_rub', 10);
            $table->unsignedInteger('width_cm');
            $table->unsignedInteger('height_cm');
            $table->foreignIdFor(Author::class)->constrained()->cascadeOnDelete();
            $table->index('author_id');
            $table->boolean('is_sold')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
