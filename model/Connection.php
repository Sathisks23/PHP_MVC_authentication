<?php

class Connection {
    public $connect;
    private $host;
    private $user;
    private $password;
    private $dbname;

    function __construct($host, $user, $password, $dbname) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;

        try {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
            $this->connect = new PDO($dsn, $this->user, $this->password);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function insert($username, $email, $password) {
        $sql = "INSERT INTO student (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute([$username, $email, $password]);
    }

    function getUserByEmail($email) {
        $sql = "SELECT * FROM student WHERE email = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>
