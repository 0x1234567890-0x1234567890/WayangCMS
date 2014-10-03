<?php

namespace wayang;

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
	public function redirect($to, $statusCode=302)
    {
        header('Location: '.WY_Request::base_url().'/'.$to, true, $statusCode);
        exit();
    }
}