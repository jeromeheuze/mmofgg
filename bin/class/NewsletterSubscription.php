<?php
class NewsletterSubscription {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($host, $username, $password, $dbname) {
        $this->conn = new mysqli($host, $username, $password, $dbname);

        // Check for connection errors
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Function to subscribe an email
    public function subscribe($email): String
    {
        $stmt_exist = $this->conn->prepare("SELECT id FROM newsletter_subscribers WHERE email = ?");
        $stmt_exist->bind_param("s", $email);
        $stmt_exist->execute();
        $stmt_exist->store_result();

        //echo $stmt_exist->num_rows;

        if ($stmt_exist->num_rows <= 0) {
            $stmt = $this->conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
            if ($stmt) {
                $stmt->bind_param("s", $email);
                if ($stmt->execute()) {
                    return "Successfully subscribed!";
                } else {
                    return "Error: " . $stmt->error;
                }
            } else {
                return "Statement preparation failed: " . $this->conn->error;
            }
        } else {
            return "Email Exists";
        }
    }

    // Function to unsubscribe an email
    public function unsubscribe($email): String
    {
        $stmt = $this->conn->prepare("UPDATE newsletter_subscribers SET unsubscribed_at = NOW() WHERE email = ?");

        if ($stmt) {
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                echo "Successfully unsubscribed!";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Statement preparation failed: " . $this->conn->error;
        }
    }

    // Destructor to close the database connection
    public function __destruct() {
        $this->conn->close();
    }
}

// Usage example
//$newsletter.php = new NewsletterSubscription("localhost", "root", "", "your_database");
//$newsletter.php->subscribe("example@email.com");
//$newsletter.php->unsubscribe("example@email.com");
?>
