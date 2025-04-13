<?php
class GameSubmission {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($host, $username, $password, $dbname) {
        $this->conn = new mysqli($host, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Save game data to the database
    public function saveGame($title, $genre, $description, $developer, $link): array
    {
        // Sanitize inputs
        $title = $this->conn->real_escape_string($title);
        $genre = $this->conn->real_escape_string($genre);
        $description = $this->conn->real_escape_string($description);
        $developer = $this->conn->real_escape_string($developer);
        $link = $this->conn->real_escape_string($link);

        $sql = "INSERT INTO subagame (title, genre, description, developer, link) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return ['status' => 'error', 'message' => 'Prepare failed: ' . $this->conn->error];
        }

        $stmt->bind_param("sssss", $title, $genre, $description, $developer, $link);

        if ($stmt->execute()) {
            $stmt->close();
            return ['status' => 'success', 'message' => 'Game submitted successfully!'];
        } else {
            $stmt->close();
            return ['status' => 'error', 'message' => 'Execute failed: ' . $stmt->error];
        }
    }

    // Destructor to close the database connection
    public function __destruct() {
        $this->conn->close();
    }
}
