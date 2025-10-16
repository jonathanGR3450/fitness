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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();

            $table->string('meta_title',150)->nullable();
            $table->string('meta_description',500)->nullable();
            $table->string('meta_keywords',500)->nullable();
            $table->string('canonical_url',500)->nullable();
            $table->string('robots',30)->default('index,follow');

            $table->string('og_title',150)->nullable();
            $table->string('og_description',500)->nullable();
            $table->string('og_image',500)->nullable();
            $table->string('og_type',50)->default('website');
            $table->string('og_url',500)->nullable();
            $table->string('og_site_name',100)->nullable();

            $table->string('twitter_card',30)->default('summary_large_image');
            $table->string('twitter_title',150)->nullable();
            $table->string('twitter_description',500)->nullable();
            $table->string('twitter_image',500)->nullable();
            $table->string('twitter_site',50)->nullable();
            $table->string('twitter_creator',50)->nullable();

            $table->json('schema_markup')->nullable();
            $table->string('focus_keyword',100)->nullable();
            $table->string('breadcrumb_title',150)->nullable();

            $table->boolean('sitemap_include')->default(true);
            $table->decimal('sitemap_priority',2,1)->default(0.8);
            $table->enum('sitemap_changefreq',['always','hourly','daily','weekly','monthly','yearly','never'])->default('weekly');

            $table->boolean('is_active')->default(true);
            $table->unsignedTinyInteger('seo_score')->nullable();
            $table->json('seo_analysis')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
