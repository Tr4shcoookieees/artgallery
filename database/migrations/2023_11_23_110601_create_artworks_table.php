<?php

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->foreignIdFor(Author::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
            $table->string('image');
            $table->text('description')->nullable();
            $table->json('info')->nullable();
            $table->float('price', 8, 2)->comment('Price in RUB');
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
