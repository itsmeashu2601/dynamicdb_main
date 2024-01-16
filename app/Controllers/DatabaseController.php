<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DatabaseController extends BaseController
{
    public function createDatabase($databaseName,$userName,$userPassword)
    {
        $start = "u311423116_";
        $forge = \Config\Database::forge();

        try {
            log_message('info', "Trying to create database: $databaseName");

            // Use try-catch to handle any exceptions
            $forge->createDatabase($databaseName, true);

            // If no exception is thrown, consider it a success
            log_message('info', "Database '$databaseName' created successfully!");

            $response = [
                'status' => 200,
                'message' => "Database '$databaseName' created successfully!",
                'data' => $databaseName
            ];
            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            log_message('error', "Error creating database: " . $e->getMessage());

            $response = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            return $this->response->setJSON($response);
        }
    }
}
