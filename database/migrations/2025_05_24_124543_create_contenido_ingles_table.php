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
    Schema::create('contenido_ingles', function (Blueprint $table) {
        $table->id();
        // Carrusel Hero (1 a 4)
        for ($i = 1; $i <= 4; $i++) {
            $table->string("h1_hero_carrusel_$i")->nullable();
            $table->text("p_hero_carrusel_$i")->nullable();
            $table->string("a_hero_carrusel_$i")->nullable();
            $table->string("img_hero_carrusel_$i")->nullable();
        }

        // About Us
        $table->string("h2_about_us")->nullable();
        $table->text("p_about_us")->nullable();
        $table->string("img_about_us")->nullable();
        for ($i = 1; $i <= 4; $i++) {
            $table->string("i__about_us_$i")->nullable();
            $table->string("h5__about_us_$i")->nullable();
        }

        // Services
        $table->string("h2_services")->nullable();
        for ($i = 1; $i <= 4; $i++) {
            $table->string("i_services_$i")->nullable();
            $table->string("h4__services_$i")->nullable();
            $table->text("p__services_$i")->nullable();
        }

        // Portfolio
        $table->string("h2_portfolio")->nullable();
        for ($i = 1; $i <= 6; $i++) {
            $table->string("img_portfolio_$i")->nullable();
        }

        // Testimonials
        $table->string("h2_testimonials")->nullable();
        for ($i = 1; $i <= 3; $i++) {
            $table->string("img_testimonials_$i")->nullable();
            $table->string("h5_testimonials_$i")->nullable();
            $table->string("p_testimonials_city_$i")->nullable();
            $table->text("p_testimonials_$i")->nullable();
        }

        // Call to Action
        $table->string("h2_call")->nullable();
        $table->string("btn_call")->nullable();

        // Contact
        $table->string("h2_contact_title")->nullable();
        $table->text("p_contact_title")->nullable();
        $table->string("h4_contact_1")->nullable();
        $table->text("p_contact_1")->nullable();
        $table->string("h4_contact_email_1")->nullable();
        $table->text("p_contact_email_1")->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenido_ingles');
    }
};
