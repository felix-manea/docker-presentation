<?php

class App
{
    /**
     * Connects to database.
     * @return bool
     */
    public function canConnectToDatabase(): bool
    {
        return !empty($this->getDbConnection());
    }

    public function getDbConnection()
    {
        // Check if we have mysql support.
        if (function_exists('mysqli_connect')) {
            return @mysqli_connect('db', 'crm_user', 'crm_pass', "crm_app");
        }

        return null;
    }

    /**
     * Gets users from database in an array of items ['id' => number, 'name' => string].
     * @return array
     */
    public function getUsersFromDatabase(): array
    {
        // Connect to database.
        $conn = $this->getDbConnection();

        // Get data.
        $result = mysqli_query($conn, "SELECT * FROM `users`");

        // Return data.
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Gets users from an array of items ['id' => number, 'name' => string].
     * @return array
     */
    public function getUsersFromArray(): array
    {
        // Return data.
        return [
            [
                'id' => '1',
                'name' => 'Felix (nodb)'
            ],
            [
                'id' => '2',
                'name' => 'Hurly (nodb)'
            ],
            [
                'id' => '3',
                'name' => 'Arash (nodb)'
            ],
        ];
    }

    /**
     * Displays the users.
     * @param array $users
     */
    public function displayUsers(string $title, array $users)
    {
        include_once dirname(__DIR__) . '/views/index.view.php';
    }
}