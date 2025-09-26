<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GlobalSetting;


class PageController extends Controller
{
public function showEnglish()
{
    // Obtener todos los datos de contenido en inglés
    $contenido = DB::table('contenido_ingles')->first();
    
    // Obtener configuración global usando el modelo
    $global = GlobalSetting::getSettings();
    
    // Si no hay datos de contenido, crear un objeto vacío para evitar errores en la vista
    if (!$contenido) {
        $contenido = (object) [
            // Hero Carousel
            'h1_hero_carrusel_1' => '',
            'p_hero_carrusel_1' => '',
            'a_hero_carrusel_1' => '',
            'img_hero_carrusel_1' => '',
            'h1_hero_carrusel_2' => '',
            'p_hero_carrusel_2' => '',
            'a_hero_carrusel_2' => '',
            'img_hero_carrusel_2' => '',
            'h1_hero_carrusel_3' => '',
            'p_hero_carrusel_3' => '',
            'a_hero_carrusel_3' => '',
            'img_hero_carrusel_3' => '',
            'h1_hero_carrusel_4' => '',
            'p_hero_carrusel_4' => '',
            'a_hero_carrusel_4' => '',
            'img_hero_carrusel_4' => '',
            
            // About Us
            'h2_about_us' => '',
            'p_about_us' => '',
            'img_about_us' => '',
            'i__about_us_1' => '',
            'h5__about_us_1' => '',
            'i__about_us_2' => '',
            'h5__about_us_2' => '',
            'i__about_us_3' => '',
            'h5__about_us_3' => '',
            'i__about_us_4' => '',
            'h5__about_us_4' => '',
            
            // Services
            'h2_services' => '',
            'i_services_1' => '',
            'h4__services_1' => '',
            'p__services_1' => '',
            'i_services_2' => '',
            'h4__services_2' => '',
            'p__services_2' => '',
            'i_services_3' => '',
            'h4__services_3' => '',
            'p__services_3' => '',
            'i_services_4' => '',
            'h4__services_4' => '',
            'p__services_4' => '',
            
            // Portfolio
            'h2_portfolio' => '',
            'img_portfolio_1' => '',
            'img_portfolio_2' => '',
            'img_portfolio_3' => '',
            'img_portfolio_4' => '',
            'img_portfolio_5' => '',
            'img_portfolio_6' => '',
            
            // Testimonials
            'h2_testimonials' => '',
            'img_testimonials_1' => '',
            'h5_testimonials_1' => '',
            'p_testimonials_city_1' => '',
            'p_testimonials_1' => '',
            'img_testimonials_2' => '',
            'h5_testimonials_2' => '',
            'p_testimonials_city_2' => '',
            'p_testimonials_2' => '',
            'img_testimonials_3' => '',
            'h5_testimonials_3' => '',
            'p_testimonials_city_3' => '',
            'p_testimonials_3' => '',
            
            // Call to Action
            'h2_call' => '',
            'btn_call' => '',
            
            // Contact
            'h2_contact_title' => '',
            'p_contact_title' => '',
            'h4_contact_1' => '',
            'p_contact_1' => '',
            'h4_contact_email_1' => '',
            'p_contact_email_1' => '',
        ];
    }
    
    // Pasar ambas variables a la vista
    return view('ingles', compact('contenido', 'global'));
}
}