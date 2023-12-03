<?php
class userdb {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ims";
    private $conn;

    // Construct a connection ($userdb = new userdb();)
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to retrieve data from the users table
    public function getUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            return [];
        }
    }

    // Destructor (unset($userdb))
    public function __destruct() {
        $this->conn->close();
    }
}

// Create an instance of the Database class
$database = new Database();

// Retrieve users data using the getUsers method

$users = $database->getUsers();

// Display user information as an example
if (!empty($users)) {
    foreach ($users as $user) {
        echo "Username: " . $user["username"] . " - Full Name: " . $user["fullName"] . " - Email: " . $user["email"] . "<br>";
        // You can access other columns similarly
    }
} else {
    echo "0 results";
}
?>
