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
        Schema::create('projects', function (Blueprint $table) {
            /*
             * Napraviti model i migraciju Project sa poljima:
             *  *projectName,
             * *projectDescription,
             * *projectStatus, *nameAndSurname,
             * *datumPocetka,
             * *datumZavrsetka
             */
            $table->id(); // id projekta
            $table->string('name'); //ime projekta
            $table->text('description'); //opis projekta
            $table->enum('status', ['Nije pocelo' ,'U toku', 'Zavrseno']); //status projekta
            $table->string('personName'); //ime i prezime osobe koja vodi projekat
            $table->date('start'); //datum pocetka
            $table->date('end'); // datum kraja
            $table->timestamps(); //crated_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
