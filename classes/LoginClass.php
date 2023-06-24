<?php

/**
 * Defines a login class
 * 
 */

class Login {
    #region Private Properties
    private $_username;
    private $_password;
    private $_userId;
    private $_db;
    #endregion

    #region Constructor - sets up the database connection (using DBAccess)

    public function __construct()
    {
      // Create database connection and store into _db property so other methods can use DBAccess
      require "includes/database.php";
      $this->_db = $db;
    }

    #endregion

    #region Getter and Setters

    /**
     * Get user ID
     * @return int returns the user id
     */
    function getUserId() {
        return $this->_userId;
    }
    

    /**
     * Get username
     * @return string returns the username
     */
    function getUsername() {
        return $this->_username;
    }
    
    
    /**
     * Set username
     * @param string sets the username of the object
     * @return void
     */
    function setUsername($username) {
        $this->_username = $username;
    }

    /**
     * Get password
     * @return string returns the password of the object
     */
    function getPassword() {
        return $this->_password;
    }

    /**
     * Set password
     * @param string sets the password of the object
     * @return void
     */
    function setPassword($password) {
        $this->_password = $password;
    }
    
    #endregion


    #region Methods

    /**
     * try to login the page
     * @param string the user name and password to login the page
     * @return bool true if login successul and false if not.
     */

    function login($username, $password) {
    try {

        // Open database connection
        $this->_db->connect();

        // Define SQL query, prepare statement, bind parameters
        $sql = <<<SQL
        SELECT  *
        FROM    user
        WHERE   userName = :username
        SQL;
        $stmt = $this->_db->prepareStatement($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_INT);

        // Execute query
        $rows = $this->_db->executeSQL($stmt);

        foreach ($rows as $row) {
            if ($row['userName'] === $username && $row['password'] === $password) {
                // Populate the private properties with the retrieved values
                $this->_userId = $row["userId"];
                $this->_username = $row["userName"];
                $this->_password = $row["password"];
                return 'success';
            } else if ($row['userName'] === $username && $row['password'] !== $password) {
                // incorrect password
                return 'incorrect password';
            }
        }

        return 'Username does not exist.';


        } catch (PDOException $e) {
        
        // Throw the exception back up a level (don't handle it here)
        throw $e;
        }
        
    }

    /**
     * allow the user to update the password
     * @param string the user name for changing the password
     * @return bool true if the password has been updated successully and false if not.
     */

     function updatePassword($username) {
        try {
    
            // Open database connection
            $this->_db->connect();
    
           // Define SQL query, prepare statement, bind parameters
            $sql = <<<SQL
            UPDATE  user
            SET     password = :password
            WHERE   userName = :username
            SQL;
            $stmt = $this->_db->prepareStatement($sql);
            $stmt->bindParam(":password", $this->_password, PDO::PARAM_STR);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);

            // Execute SQL
            $value = $this->_db->executeNonQuery($stmt, false);
            return $value;
            
    
    
            } catch (PDOException $e) {
            
            // Throw the exception back up a level (don't handle it here)
            throw $e;
            }
            
        }
    
    /**
     * Get a user by username and populate the object's properties
     *
     * @param  string $username The username of the user to get
     * @return bool returns true if the product is found, and false if user doesn't exist.
     */
    public function getUser($username)
    {
      try {

        // Open database connection
        $this->_db->connect();

        // Define SQL query, prepare statement, bind parameters
        $sql = <<<SQL
        SELECT  *
        FROM    user
        WHERE   userName = :userName
        SQL;
        $stmt = $this->_db->prepareStatement($sql);
        $stmt->bindParam(":userName", $username, PDO::PARAM_STR);

        // Execute query
        $rows = $this->_db->executeSQL($stmt);


        // Populate the private properties with the retrieved values

        foreach ($rows as $row) {
            if($row['userName'] === $username) {
                $this->_userId = $row["userId"];
                $this->_username = $row["userName"];
                $this->_password= $row["password"];
                // User exists
                return true;
            }
        }
        //user doesn't exist
        return false;

      } catch (PDOException $e) {
        
        // Throw the exception back up a level (don't handle it here)
        throw $e;
      }
    }

    #endregion
}