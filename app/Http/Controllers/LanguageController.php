<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Cambia el idioma de la aplicación
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $locale
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage($locale)
    {
        // Verificar si el idioma está entre los permitidos
        if (!in_array($locale, ['es', 'en'])) {
            $locale = 'es'; // Idioma por defecto
        }

        // Guardar el idioma en la sesión
        Session::put('locale', $locale);

        // Establecer el locale para la solicitud actual
        App::setLocale($locale);

        // Redirigir a la página anterior
        return redirect()->back();
    }
}