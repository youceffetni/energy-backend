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
        Schema::create('factures', function (Blueprint $table) {

            $table->string("numero")->primary();
            $table->string("date_facturation");
            $table->string("month_year");
            $table->string("etat");
            $table->string("type");

            $table->string("montant");
            $table->string("montant_remise");
            $table->string("tva");
            $table->string("ttc");
            $table->string("timbre");
            $table->string("net_a_payer");


            $table->foreignId("client_id");
            $table->foreign("client_id")->references("id")->on("clients");

            $table->string("vente_numero");
            $table->foreign("vente_numero")->references("numero")->on("ventes")->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreignId("user_id");
            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
