<?php

class WY_Response
{
	public function redirect($to, $statusCode=302)
    {
        header('Location: '.WY_Request::get_base_url().'/'.$to, true, $statusCode);
        exit();
    }
}