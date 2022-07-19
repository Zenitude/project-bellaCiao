<?php

declare(strict_types=1);

abstract class Database
{
    private string $host = 'localhost';
    private string $dbname = 'bellaciao';
    private string $charset = 'utf8';
    private string $user = 'root';
    private string $password = 'root';

    protected function connectDb()
    {
        $db = new PDO(
            sprintf('mysql:host=%s;dbname=%s;charset=%s', $this->host, $this->dbname, $this->charset),
            $this->user, 
            $this->password, 
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        return $db;
    }
}

