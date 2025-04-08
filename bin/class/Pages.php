<?php
class Pages {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($host, $username, $password, $dbname) {
        $this->conn = new mysqli($host, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function incrementTotalVisitsFromSlug($post_slug): bool|string
    {
        $sql = "UPDATE content SET total_visits = total_visits + 1 WHERE post_preview_url = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $post_slug);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return "Statement preparation failed: " . $this->conn->error;
        }
    }

    // Destructor to close the database connection
    public function __destruct() {
        $this->conn->close();
    }
}