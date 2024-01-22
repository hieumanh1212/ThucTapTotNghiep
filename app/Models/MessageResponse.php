<?php

namespace App\Models;

class MessageResponse
{
    private $statusCode;
    private $message;

    /**
     * @param $statusCode
     * @param $message
     */
    public function __construct($statusCode, $message)
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

}
