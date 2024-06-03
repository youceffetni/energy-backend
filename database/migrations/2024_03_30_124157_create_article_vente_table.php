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
        Schema::create('article_vente', function (Blueprint $table) {
            $table->id();

            $table->string("vente_numero");
            $table->foreign("vente_numero")->references("numero")->on("ventes")->onDelete("cascade")->onUpdate("cascade");

            
            $table->string("article_ref");
            $table->foreign("article_ref")->references("ref")->on("articles")->onUpdate("cascade");


            $table->string("prix_vente");
            $table->unsignedMediumInteger("quantity");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_vente');
    }
};
