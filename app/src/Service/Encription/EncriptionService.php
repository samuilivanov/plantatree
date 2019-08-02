<?php

namespace App\Service\Encription;

use App\Service\Encription\EncriptionServiceInterface;
/**
 *
 */
class EncriptionService implements EncriptionServiceInterface
{
    public function hash(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verify(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }
}
