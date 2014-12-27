<?php

namespace system\core;

/**
 * Kelas ini berfungsi menangani HTTP response
 * 
 */
class Response
{
    /**
     * redirect pengguna ke url tertentu
     * @param string $to url redirect
     * @param int $statusCode status header yang di tetapkan untuk redirect
     */
	public function redirect($url, $status = 302)
    {
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https://' : 'http://';
        $path = $_SERVER['PHP_SELF'];
        $pathParts = pathinfo($path);
        $directory = $pathParts['dirname'];
        $directory = ($directory == "/") ? "" : $directory;
        $host = $_SERVER['HTTP_HOST'];
        $baseUrl = $protocol . $host . $directory;

        header('Location: ' . $baseUrl . '/' . $to, true, $status);
        exit();
    }
}