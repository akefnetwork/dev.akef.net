<?php

class User {
    public static function create($conn, $fname, $lname, $email, $password) {
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fname, $lname, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return $conn->insert_id;
        } else {
            return false;
        }

        $stmt->close();
    }
}
