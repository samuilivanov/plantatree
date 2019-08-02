<?php

namespace App\Service\Encription;

/**
 *
 */
interface EncriptionServiceInterface
{
    public function hash(string $password);
    public function verify(string $password, string $hash);
}
