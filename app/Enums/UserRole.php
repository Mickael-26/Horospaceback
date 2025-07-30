<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN = 1;
    case EDITOR = 2;
    case SUPERVISOR = 3;

    /**
     * Get the label for the user role.
     * @return string
     */
    public function label(): string
    {
        return match($this){
            self::ADMIN => 'admin',
            self::EDITOR => 'editor',
            self::SUPERVISOR => 'supervisor',
        };
    }

    /**
     * Check if the user is an admin
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

    /**
     * Check if the user is an editor.
     * @return bool
     */
    public function isEditor(): bool
    {
        return $this === self::EDITOR;
    }

    /**
     * Check if the user is a supervisor.
     * @return bool
     */
    public function isSupervisor(): bool
    {
        return $this === self::SUPERVISOR;
    }


}
