<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('levantar_login')) {
    function levantar_login($usuario)
    {
        $CI = &get_instance();
        $CI->session->set_userdata('usuario', $usuario);
    }
}

if (!function_exists('bajar_login')) {
    function bajar_login()
    {
        $CI = &get_instance();
        $CI->session->sess_destroy();
    }
}

if (!function_exists('obtener_usuario')) {
    function obtener_usuario()
    {
        $CI = &get_instance();
        return $CI->session->userdata('usuario');
    }
}

if (!function_exists('obtener_cod_usuario')) {
    function obtener_cod_usuario()
    {
        $CI             = &get_instance();
        $usuario_actual = $CI->session->userdata('usuario');
        if (isset($usuario_actual['usuario_empresa'])) {
            return $usuario_actual['usuario_empresa']['usuario'];
        } else {
            return $usuario_actual['usuario'];
        }
    }
}

if (!function_exists('encriptar')) {
    function encriptar($cadena)
    {
        $CI = &get_instance();
        return $CI->encryption->encrypt($cadena);
    }
}

if (!function_exists('desencriptar')) {
    function desencriptar($cadena)
    {
        $CI = &get_instance();
        return $CI->encryption->decrypt($cadena);
    }
}

if (!function_exists('genera_archivo_pdf')) {
    function genera_archivo_pdf($vista = '', $titulo = '', $nombre_archivo = '')
    {
        $CI   = &get_instance();
        $html = $CI->load->view('plantilla_pdf', array('vista_pdf' => $vista,
            'titulo_pdf'                                               => $titulo), true);
        $CI->dompdflib->generar_pdf($html, $nombre_archivo, true);
    }
}

if (!function_exists('url_logo')) {
    function url_logo($nombre_logo)
    {
        $CI          = &get_instance();
        $ruta_perfil = $CI->param_model->obtener_por_id(4);
        if (file_exists($ruta_perfil . $nombre_logo)) {
            return $ruta_perfil . $nombre_logo;
        } else {
            return $ruta_perfil . "no.png";
        }

    }
}

if (!function_exists('formateo_error_tabla')) {
    function formateo_error_tabla($errores)
    {
        $todo_error = '<p>Se cargo el archivo correctamente, pero se encontraron errores en el proceso: </p><table class="table table-bordered table-striped table-hover"><thead><th>Linea</th><th>Error</th></thead><tbody>';
        foreach ($errores as $key => $value) {
            $todo_error = $todo_error . '<tr><td>' . $value['linea'] . '</td><td>' . $value['error'] . '</td><tr/>';
        }
        $todo_error .= '</tbody></table>';

        return $todo_error;
    }
}

if (!function_exists('de_resultado_a_array')) {
    function de_resultado_a_array($resultado, $campo_id, $campo_nombre)
    {
        $datos = array();
        foreach ($resultado as $key => $value) {
            $datos[$value[$campo_id]] = $value[$campo_nombre];
        }
        return $datos;
    }
}

function encriptar_num($string)
{
    $key    = 'AML123';
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char    = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char    = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}

function desencriptar_num($string)
{
    $key    = 'AML123';
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char    = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char    = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}

/*--------------Porcentaje-----------------------------*/
function getCommonCharacters($string1, $string2, $allowedDistance)
{

    $str1_len     = strlen($string1);
    $str2_len     = strlen($string2);
    $temp_string2 = $string2;

    $commonCharacters = '';

    for ($i = 0; $i < $str1_len; $i++) {

        $noMatch = true;

        // compare if char does match inside given allowedDistance
        // and if it does add it to commonCharacters
        for ($j = max(0, $i - $allowedDistance); $noMatch && $j < min($i + $allowedDistance + 1, $str2_len); $j++) {
            if ($temp_string2[$j] == $string1[$i]) {
                $noMatch = false;

                $commonCharacters .= $string1[$i];
                $temp_string2[$j] = ' ';

            }
        }
    }

    return $commonCharacters;
}

function Jaro($string1, $string2)
{

    $str1_len = strlen($string1);
    $str2_len = strlen($string2);

    // theoretical distance
    $distance = (int) floor(min($str1_len, $str2_len) / 2.0);

    // get common characters
    $commons1 = getCommonCharacters($string1, $string2, $distance);
    $commons2 = getCommonCharacters($string2, $string1, $distance);

    if (($commons1_len = strlen($commons1)) == 0) {
        return 0;
    }

    if (($commons2_len = strlen($commons2)) == 0) {
        return 0;
    }

    // calculate transpositions
    $transpositions = 0;
    $upperBound     = min($commons1_len, $commons2_len);
    for ($i = 0; $i < $upperBound; $i++) {
        if ($commons1[$i] != $commons2[$i]) {
            $transpositions++;
        }

    }
    $transpositions /= 2.0;

    // return the Jaro distance
    return ($commons1_len / ($str1_len) + $commons2_len / ($str2_len) + ($commons1_len - $transpositions) / ($commons1_len)) / 3.0;

}

function getPrefixLength($string1, $string2, $MINPREFIXLENGTH = 4)
{

    $n = min(array($MINPREFIXLENGTH, strlen($string1), strlen($string2)));

    for ($i = 0; $i < $n; $i++) {
        if ($string1[$i] != $string2[$i]) {
            // return index of first occurrence of different characters
            return $i;
        }
    }

    // first n characters are the same
    return $n;
}

function JaroWinkler($string1, $string2, $PREFIXSCALE = 0.1)
{

    $JaroDistance = Jaro($string1, $string2);

    $prefixLength = getPrefixLength($string1, $string2);

    return $JaroDistance + $prefixLength * $PREFIXSCALE * (1.0 - $JaroDistance);
}

/*--------------------fin porcentaje---------------------------------*/

function porcen_coincidencia($target, $candidate)
{
    return round((JaroWinkler($target, $candidate)) * 100, 2);
}

function puede_eliminar($controlador)
{
    $controladores = array(
        'clientesfisicos',
        'clientesjuridicos',
        'empleados',
        'productos',
        'beneficiariosfisicos',
        'beneficiariosjuridicos',
        'canalesdis',
        'transacciones',
        'proveedoresjur',
        'proveedoresfis',

    );
    if (in_array($controlador, $controladores)) {
        return true;
    } else {
        return false;
    }
}

function enviar_correo($titulo = "", $texto = "", $destinos = "", $archivos = "")
{
    if (!$destinos) {
        $destinos = array();
    }
    if (!$archivos) {
        $archivos = array();
    }

    $CI = &get_instance();
    $CI->load->library('PHPMailer_libreria');
    $objMail = $CI->phpmailer_libreria->load();

    try {
        //Server settings
        //$objMail->SMTPDebug = 2; // Enable verbose debug output
        //$objMail->Debugoutput = 'html';

        $objMail->isSMTP(); // Set objMailer to use SMTP
        $objMail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $objMail->SMTPAuth   = true; // Enable SMTP authentication
        $objMail->Username   = 'alertasaml@gmail.com'; // SMTP username
        $objMail->Password   = 'AmlSistema2018'; // SMTP password
        $objMail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $objMail->Port       = 587; // TCP port to connect to
        $objMail->CharSet    = 'UTF-8';
        //Recipients

        $objMail->setFrom('alertasaml@gmail.com', 'Sistema AML');
        //$objMail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        foreach ($destinos as $des) {
            $objMail->addAddress($des);
        }

        foreach ($archivos as $ar) {
            $objMail->addAttachment($ar);
        }
        // Name is optional
        //$objMail->addReplyTo('info@example.com', 'Information');
        //$objMail->addCC('cc@example.com');
        //$objMail->addBCC('bcc@example.com');

        //Attachments
        //$objMail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$objMail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $objMail->isHTML(true); // Set eobjMail format to HTML
        $objMail->Subject = ($titulo);
        $objMail->Body    = $texto;
        //$objMail->AltBody = 'This is the body in plain text for non-HTML objMail clients';

        if (!$objMail->send()) {
            return $objMail->ErrorInfo;
        } else {
            return "1";
        }

    } catch (Exception $e) {
        //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
