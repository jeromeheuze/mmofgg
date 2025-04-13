<?php
class ContactSubmission {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($host, $username, $password, $dbname) {
        $this->conn = new mysqli($host, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Save contact message to the database
    public function saveMessage($name, $email, $subject, $message) {
        // Sanitize inputs
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $subject = $this->conn->real_escape_string($subject);
        $message = $this->conn->real_escape_string($message);

        $sql = "INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return ['status' => 'error', 'message' => 'Prepare failed: ' . $this->conn->error];
        }

        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            $stmt->close();
            return ['status' => 'success', 'message' => 'Message sent successfully!'];
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
