<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DatabaseController extends BaseController
{
    public function createDatabase($databaseName, $userName, $userPassword)
    {
        // Load the database utilities
        $db = \Config\Database::connect();

        try {
            // Connect to MySQL using CodeIgniter's database connection
            $dbConnection = $db->connect();

            // Check connection
            if (!$dbConnection) {
                $response = [
                    'status'  => 500,
                    'message' => 'Internal Server Error: Failed to connect to MySQL.'
                ];
                return $this->response->setJSON($response);
            }

            // Check if the database name, username, and password are provided
            if (empty($databaseName) || empty($userName) || empty($userPassword)) {
                $response = [
                    'status'  => 400,
                    'message' => 'Bad Request: Database name, username, and password are required.'
                ];
                return $this->response->setJSON($response);
            }

            // Prepend the string "u311423116_" to database name and username
            $databaseName = 'u311423116_' . $databaseName;
            $userName = 'u311423116_' . $userName;

            // Create user and grant privileges
            $db->query("CREATE USER '$userName'@'localhost' IDENTIFIED BY '$userPassword'");
            $db->query("GRANT ALL PRIVILEGES ON *.* TO '$userName'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0");

            // Create database if not exists
            $db->query("CREATE DATABASE IF NOT EXISTS `$databaseName`");

            // Grant all privileges on the database
            $db->query("GRANT ALL PRIVILEGES ON `$databaseName`.* TO '$userName'@'localhost'");

            $response = [
                'status'  => 200,
                'message' => "User '$userName' and database '$databaseName' created successfully!",
                'data'    => ['user' => $userName, 'database' => $databaseName]
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
