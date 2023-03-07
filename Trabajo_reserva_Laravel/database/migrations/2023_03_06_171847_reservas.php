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
        Schema::create("reservas",function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("portatil_id");
            $table->date("dia");
            $table->enum("hora",["8:","9:","10:","11:","12:","13:","14:45","15:35","16:40","17:30","18:35","19:25"]);
            $table->enum("turno",["mañana","tarde"]);
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("portatil_id")->references("id")->on("portatiles")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
