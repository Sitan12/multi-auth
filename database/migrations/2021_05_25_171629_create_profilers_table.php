<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilers', function (Blueprint $table) {
            $table->id();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('categorie')->nullable();
            $table->string('reseausocial')->nullable();
            $table->unsignedInteger('restaurant_id')->index(); //definir la cle etrangere
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profilers');
    }
}
