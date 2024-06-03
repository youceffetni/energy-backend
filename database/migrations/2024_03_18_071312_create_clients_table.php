<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("email",50)->nullable();
            $table->string("tel1",15)->nullable();
            $table->string("tel2",15)->nullable();
            $table->string("adresse")->nullable();
            $table->string("web_site")->nullable();
            $table->string("NIF")->nullable();
            $table->string("NIS")->nullable();
            $table->string("NRC")->nullable();
            $table->string("RIB")->nullable();
            $table->string("activite")->nullable();
            $table->string("NAI")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
