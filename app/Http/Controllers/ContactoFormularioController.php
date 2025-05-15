<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;
use App\Mail\ConfirmacionContactoMail;

class ContactoFormularioController extends Controller
{
    /**
     * Procesa el envío del formulario de contacto
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function enviar(Request $request)
    {
        // Comprobar si es una solicitud AJAX
        $isAjax = $request->header('X-Requested-With') === 'XMLHttpRequest';

        // Validar datos del formulario
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            // Determinar el destinatario basado en el asunto
            $destinatarios = [
                'Ventas' => 'diazkevinmota2@gmail.com',
                'Taller' => 'motac7884@gmail.com',
                'Secretaría' => 'ricardo10justiniano@gmail.com',
                'Oficinas Centrales' => 'astridjolietpavon@gmail.com',
                'Arquitectura' => 'arquitectura@indarca.com',
            ];

            $destinatario = $destinatarios[$request->subject] ?? config('mail.from.address');

            // Preparar datos para el correo
            $datos = [
                'nombre' => $request->name,
                'correo' => $request->email,
                'asunto' => $request->subject,
                'mensaje' => $request->message,
            ];

            // Enviar el correo electrónico al destinatario correspondiente
            try {
                Mail::to($destinatario)->send(new ContactoMail($datos));
                \Log::info('Correo enviado exitosamente a: ' . $destinatario);

                // Enviar correo de confirmación al usuario
                Mail::to($request->email)->send(new ConfirmacionContactoMail($datos));
                \Log::info('Correo de confirmación enviado a: ' . $request->email);

            } catch (\Exception $e) {
                \Log::error('Error al enviar correo: ' . $e->getMessage());
                \Log::error('Stack trace: ' . $e->getTraceAsString());
                if ($isAjax) {
                    return response('Error al enviar el mensaje: ' . $e->getMessage(), 400);
                } else {
                    return redirect()->back()->with('error', __('inicio.error_occurred'));
                }
            }

            // Responder según el tipo de solicitud
            if ($isAjax) {
                return response('OK', 200);
            } else {
                return redirect()->back()->with('success', __('inicio.message_sent'));
            }
        } catch (\Exception $e) {
            if ($isAjax) {
                return response('Error al enviar el mensaje: ' . $e->getMessage(), 400);
            } else {
                return redirect()->back()->with('error', __('inicio.error_occurred'));
            }
        }
    }
}
