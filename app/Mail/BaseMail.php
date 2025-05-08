<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BaseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Ruta del logo de INDARCA que se usa en todos los emails
     *
     * @var string
     */
    protected $logoPath;

    /**
     * Constructor de la clase base
     *
     * @return void
     */
    public function __construct()
    {
        // Verificar si el archivo del logo existe y es accesible
        $logoPath = public_path('assets/img/OTROS/logo_indarca.png');

        if (file_exists($logoPath) && is_readable($logoPath)) {
            $this->logoPath = $logoPath;
        } else {
            // Si el logo no existe, no establecer la ruta para evitar errores
            $this->logoPath = null;
            \Log::warning('Logo no encontrado o inaccesible: ' . $logoPath);
        }
    }

    /**
     * Método llamado antes de renderizar el mensaje
     *
     * @return void
     */
    public function buildViewData()
    {
        $data = parent::buildViewData();

        // Agregar la ruta del logo a los datos de la vista solo si existe
        if ($this->logoPath) {
            $data['logoPath'] = $this->logoPath;
        } else {
            // Establecer un valor nulo para que la plantilla sepa que no hay logo
            $data['logoPath'] = null;
        }

        return $data;
    }
}
