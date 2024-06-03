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
        Schema::create('articles', function (Blueprint $table) {

            $table->string("ref",255)->primary();
            $table->string("nom",255);
            $table->text("description")->nullable();
            $table->string("unite",255);
            $table->integer("quantite_stock");
            $table->integer("quantite_min_stock")->default(0);
            $table->decimal("prix",26,2)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
