<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DatabaseController extends BaseController
{
    public function createDatabase($databaseName, $userName, $userPassword)
    {
        $db = \Config\Database::connect();

        // Check if the database name, username, and password are provided
        if (empty($databaseName) || empty($userName) || empty($userPassword)) {
            $response = [
                'status'  => 400,
                'message' => 'Bad Request: Database name, username, and password are required.'
            ];
            return $this->response->setJSON($response);
        }

        try {
            // Connect to MySQL using CodeIgniter's database connection
            $dbConnection = $db->connect();

            // Create user
            $db->query("CREATE USER '$userName'@'localhost' IDENTIFIED BY '$userPassword'");

            // Grant privileges on all databases
            $db->query("GRANT ALL PRIVILEGES ON *.* TO '$userName'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0");

            // Create database if not exists
            $db->query("CREATE DATABASE IF NOT EXISTS `$databaseName`");

            // Grant privileges on the specified database
            $db->query("GRANT ALL PRIVILEGES ON `$databaseName`.* TO '$userName'@'localhost'");

            $response = [
                'status'  => 200,
                'message' => "Database '$databaseName' created successfully!",
                'data'    => $databaseName
            ];
        } catch (\Exception $e) {
            $response = [
                'status'  => 500,
                'message' => 'Internal Server Error: ' . $e->getMessage()
            ];
        }

        return $this->response->setJSON($response);
    }
}
