@extends('layout')

@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Políticas de Privacidad</h2>
                <ol>
                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                    <li>Políticas de Privacidad</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="inner-page">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4 p-lg-5">
                            <h2 class="text-center mb-4">Políticas de Privacidad</h2>
                            <p class="text-muted"><small>Última actualización: {{ date('d/m/Y') }}</small></p>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">1. Introducción</h4>
                                <p>En INDARCA valoramos su privacidad y nos comprometemos a proteger sus datos personales. Esta política de privacidad le informará sobre cómo cuidamos sus datos personales cuando visita nuestro sitio web y le informará sobre sus derechos de privacidad y cómo la ley lo protege.</p>
                                <p>Le invitamos a leer detenidamente esta política de privacidad junto con nuestros términos y condiciones para entender completamente cómo recopilamos, utilizamos y protegemos su información personal.</p>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">2. Responsable del Tratamiento</h4>
                                <p>INDARCA es el responsable del tratamiento de los datos personales que nos proporcione a través de este sitio web.</p>
                                <p><strong>Datos de contacto:</strong></p>
                                <ul>
                                    <li>Dirección: C. C 16, Santo Domingo Este 11506, República Dominicana</li>
                                    <li>Teléfono: +1809 596 0333</li>
                                    <li>Email: contacto@indarca.com</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">3. Datos que Recopilamos</h4>
                                <p>Podemos recopilar, utilizar, almacenar y transferir diferentes tipos de datos personales sobre usted, que hemos agrupado de la siguiente manera:</p>
                                <ul>
                                    <li><strong>Datos de identidad:</strong> nombre, apellidos, nombre de usuario o identificador similar.</li>
                                    <li><strong>Datos de contacto:</strong> dirección de correo electrónico, número de teléfono y dirección postal.</li>
                                    <li><strong>Datos técnicos:</strong> dirección IP, datos de inicio de sesión, tipo de navegador, información sobre su dispositivo.</li>
                                    <li><strong>Datos de perfil:</strong> su nombre de usuario y contraseña, sus interacciones con nuestro sitio.</li>
                                    <li><strong>Datos de uso:</strong> información sobre cómo utiliza nuestro sitio web y servicios.</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">4. Cómo Recopilamos sus Datos</h4>
                                <p>Utilizamos diferentes métodos para recopilar datos de y sobre usted, incluidos:</p>
                                <ul>
                                    <li><strong>Interacciones directas:</strong> datos que proporciona al completar formularios en nuestro sitio web, crear una cuenta, suscribirse a nuestros servicios o publicaciones, solicitar información o cuando se comunica con nosotros.</li>
                                    <li><strong>Tecnologías automatizadas:</strong> cuando interactúa con nuestro sitio web, podemos recopilar automáticamente datos técnicos sobre su equipo y comportamiento de navegación mediante cookies y tecnologías similares.</li>
                                    <li><strong>Terceros:</strong> podemos recibir datos personales sobre usted de diversos terceros como proveedores de análisis o redes publicitarias.</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">5. Finalidad y Base Legal del Tratamiento</h4>
                                <p>Solo utilizaremos sus datos personales cuando la ley nos lo permita. Las bases legales en las que nos apoyamos para procesar su información personal incluyen:</p>
                                <ul>
                                    <li><strong>Consentimiento:</strong> cuando ha dado su consentimiento para el procesamiento de sus datos personales.</li>
                                    <li><strong>Ejecución de un contrato:</strong> cuando el procesamiento es necesario para cumplir con un contrato que tenemos con usted.</li>
                                    <li><strong>Obligación legal:</strong> cuando el procesamiento es necesario para cumplir con una obligación legal.</li>
                                    <li><strong>Interés legítimo:</strong> cuando el procesamiento es necesario para nuestros intereses legítimos (o los de un tercero) y sus intereses y derechos fundamentales no prevalecen sobre estos intereses.</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">6. Destinatarios de los Datos</h4>
                                <p>Podemos compartir sus datos personales con las siguientes categorías de destinatarios:</p>
                                <ul>
                                    <li><strong>Proveedores de servicios:</strong> que actúan como encargados del tratamiento y prestan servicios esenciales para nuestro negocio como alojamiento web, análisis de datos, procesamiento de pagos, etc.</li>
                                    <li><strong>Autoridades públicas:</strong> cuando estamos obligados a divulgar información en cumplimiento de una obligación legal.</li>
                                    <li><strong>Socios comerciales:</strong> terceros seleccionados en quienes confiamos para proporcionar ciertos servicios o productos.</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">7. Transferencias Internacionales</h4>
                                <p>Algunos de nuestros proveedores de servicios externos se encuentran fuera de su jurisdicción, por lo que el procesamiento de sus datos personales implicará una transferencia de datos fuera del área económica local.</p>
                                <p>Nos aseguramos de que sus datos personales estén protegidos implementando salvaguardas adecuadas cuando transferimos sus datos personales fuera de su jurisdicción.</p>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">8. Conservación de Datos</h4>
                                <p>Conservamos sus datos personales solo durante el tiempo necesario para cumplir con los fines para los que los recopilamos, incluidos los fines de satisfacer cualquier requisito legal, contable o de informes.</p>
                                <p>Para determinar el período de retención apropiado para los datos personales, consideramos la cantidad, naturaleza y sensibilidad de los datos personales, el riesgo potencial de daño por uso o divulgación no autorizados de sus datos personales, los fines para los que procesamos sus datos personales y si podemos lograr esos fines a través de otros medios.</p>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">9. Sus Derechos</h4>
                                <p>Bajo ciertas circunstancias, tiene derechos en relación con sus datos personales, incluyendo:</p>
                                <ul>
                                    <li><strong>Acceso:</strong> solicitar acceso a sus datos personales.</li>
                                    <li><strong>Rectificación:</strong> solicitar la corrección de sus datos personales.</li>
                                    <li><strong>Eliminación:</strong> solicitar la eliminación de sus datos personales.</li>
                                    <li><strong>Oposición:</strong> oponerse al procesamiento de sus datos personales.</li>
                                    <li><strong>Restricción:</strong> solicitar la restricción del procesamiento de sus datos personales.</li>
                                    <li><strong>Portabilidad:</strong> solicitar la transferencia de sus datos personales a usted o a un tercero.</li>
                                    <li><strong>Retirar el consentimiento:</strong> retirar el consentimiento en cualquier momento cuando confiamos en el consentimiento para procesar sus datos personales.</li>
                                </ul>
                                <p>Si desea ejercer alguno de estos derechos, por favor contáctenos a través de los datos proporcionados anteriormente.</p>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">10. Cookies</h4>
                                <p>Nuestro sitio web utiliza cookies y tecnologías similares para distinguirlo de otros usuarios. Esto nos ayuda a proporcionarle una buena experiencia cuando navega por nuestro sitio web y también nos permite mejorarlo.</p>
                                <p>Para información detallada sobre las cookies que utilizamos y los fines para los que las utilizamos, consulte nuestra política de cookies.</p>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">11. Cambios en esta Política</h4>
                                <p>Podemos actualizar esta política de privacidad ocasionalmente en respuesta a cambios legales, técnicos o comerciales. Cualquier cambio será publicado en esta página con una fecha de "última actualización" revisada.</p>
                                <p>Le animamos a revisar esta política periódicamente para mantenerse informado sobre cómo protegemos sus datos.</p>
                            </div>

                            <div class="mb-5">
                                <h4 class="border-start border-3 border-danger ps-3 mb-3">12. Contacto</h4>
                                <p>Si tiene alguna pregunta sobre esta política de privacidad o cómo manejamos sus datos personales, por favor contacte con nosotros utilizando los detalles proporcionados anteriormente.</p>
                                <p>Si no está satisfecho con nuestra respuesta o cree que no estamos procesando sus datos personales de acuerdo con la ley, tiene derecho a presentar una queja ante la autoridad de protección de datos correspondiente.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
