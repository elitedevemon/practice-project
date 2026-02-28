<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    // product_name, category, brand, price, offer_price, stock, description
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('product_name');
      $table->string('category');
      $table->string('brand')->nullable();
      $table->decimal('price', 10, 2);
      $table->decimal('offer_price', 10, 2)->nullable();
      $table->integer('stock');
      $table->text('description')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};
