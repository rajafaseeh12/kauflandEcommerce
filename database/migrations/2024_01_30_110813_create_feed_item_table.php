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
        Schema::create('feeditems', function (Blueprint $table) {
            $table->id();
            $table->integer('entity_id');
            $table->string('categoryName');
            $table->string('sku');
            $table->string('name');
            $table->string('description', 500);
            $table->text('shortdesc');
            $table->decimal('price', 10, 0)->nullable();
            $table->string('link');
            $table->string('image');
            $table->string('brand');
            $table->decimal('rating', 10, 0)->nullable();
            $table->string('caffeineType');
            $table->bigInteger('count')->nullable();
            $table->string('flavored');
            $table->string('seasonal');
            $table->string('instock');
            $table->string('facebook');
            $table->tinyInteger('IsKCup')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_item');
    }
};
