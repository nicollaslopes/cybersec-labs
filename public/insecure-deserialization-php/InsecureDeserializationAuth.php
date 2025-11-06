<?php

class InsecureDeserializationAuth
{
    public string $user = "guest";
    public string $role = "guest";
    public bool $sessionStatus = false;

    public function isAuth() {
        return $this->sessionStatus;
    }

    public function isAdmin() {
        if ($this->role === "admin") {
            return true;
        }

        return false;
    }

    public function auth($user, $password) {
        if ($user === "admin" && $password = "admin123") {
            return true;
        }

        return false;
    }
}
