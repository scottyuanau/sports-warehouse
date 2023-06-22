<?php

/**
 * Defines a Product
 * NOTE: THIS IS ONLY A PARTIAL IMPLEMENTATION - NO INSERT, UPDATE, DELETE, ETC
 */
class Product
{
  
  #region Properties (private)

    private $_itemId;
    private $_itemName;
    private $_unitPrice;
    private $_salePrice;
    private $_description;
    private $_photo;
    private $_categoryId;
    private $_featured;
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
  
  #region Getter and setter methods

    /**
     * Get product ID (there is NO setter for product ID to make it read-only)
     *
     * @return int The product ID
     */
    public function getProductId()
    {
      return $this->_itemId;
    }

    /**
     * Get product name
     *
     * @return string The product name
     */
    public function getProductName()
    {
      return $this->_itemName;
    }

    /**
     * Set product name
     *
     * @param  string $productName The new product name
     * @return void
     */
    public function setProductName($productName)
    {
      // Remove spaces
      $value = trim($productName);

      // Check string length (between 1 & 40)
      if (strlen($value) < 1 || strlen($value) > 40) {
        
        // Invalid new value - throw an exception
        throw new Exception("Product name must be between 1 and 40 characters.");

      } else {
        
        // Store new value in private property
        $this->_itemName = $value;

      }
    }

    /**
     * Get product price
     *
     * @return string The product price
     */
    public function getUnitPrice()
    {
      return $this->_unitPrice;
    }

      
    /**
     * Set price
     *
     * @param  string $unitPrice The new price
     * @return void
     */
    public function setUnitPrice($unitPrice)
    {
      $this->_unitPrice = $unitPrice;
    }

    /**
     * Get product sale price
     *
     * @return string The product sale price
     */
    public function getSalePrice()
    {
      return $this->_salePrice;
    }

    /**
     * Get product photo
     *
     * @return string The product photo
     */
    public function getPhoto()
    {
      return $this->_photo;
    }

    /**
     * Get product description
     *
     * @return string The product description
     */
    public function getDescription()
    {
      return $this->_description;
    }

    /**
     * Get product category ID
     *
     * @return int The product category ID
     */
    public function getCategoryId()
    {
      return $this->_categoryId;
    }

    /**
     * Get product featured status
     *
     * @return int The product featured status, 1 means the product is featured and 0 means it is not.
     */
    public function getFeatured()
    {
      return $this->_featured;
    }

  #endregion

  #region Methods

    /**
     * Get a product by ID and populate the object's properties
     *
     * @param  int $id The ID of the product to get
     * @return bool returns true if the product is found, and false if product doesn't exist.
     */
    public function getProduct($id)
    {
      try {

        // Open database connection
        $this->_db->connect();

        // Define SQL query, prepare statement, bind parameters
        $sql = <<<SQL
        SELECT  itemId, itemName, photo, price, salePrice, description, featured, categoryId
        FROM    item
        WHERE   itemId = :itemId
        SQL;
        $stmt = $this->_db->prepareStatement($sql);
        $stmt->bindParam(":itemId", $id, PDO::PARAM_INT);

        // Execute query
        $rows = $this->_db->executeSQL($stmt);

        // Check if any rows are returned
        if (count($rows) === 0) {
          // Product does not exist
          return false;
        }

        // Get the first (and only) row - we are searching by a unique primary key
        $row = $rows[0];

        // Populate the private properties with the retrieved values
        $this->_itemId = $row["itemId"];
        $this->_itemName = $row["itemName"];
        $this->_unitPrice = $row["price"];
        $this->_photo = $row["photo"];
        $this->_salePrice = $row["salePrice"];
        $this->_description = $row["description"];
        $this->_categoryId = $row["categoryId"];
        $this->_featured = $row["featured"];

        // Product exists
      return true;

      } catch (PDOException $e) {
        
        // Throw the exception back up a level (don't handle it here)
        throw $e;
      }
    }

    /**
     * Get all products
     *
     * @return array The collection of products
     */
    public function getProducts()
    {
      try {

        // Open database connection
        $this->_db->connect();

        // Define SQL query, prepare statement, bind parameters
        $sql = <<<SQL
        SELECT  itemId, itemName, photo, price, salePrice, description, featured, categoryId
        FROM    item
        WHERE   itemId = :itemId
        SQL;
        $stmt = $this->_db->prepareStatement($sql);

        // Execute SQL
        $rows = $this->_db->executeSQL($stmt);
        return $rows;

      } catch (PDOException $e) {
        throw $e;
      }
    }

    /**
     * Get the total number of products (COUNT)
     *
     * @return int The number of products
     */
    public function getNumberOfProducts()
    {
      try {

        // Open database connection
        $this->_db->connect();

        // Define SQL query, prepare statement, bind parameters
        $sql = <<<SQL
          SELECT  COUNT(*)
          FROM    item
        SQL;
        $stmt = $this->_db->prepareStatement($sql);

        // Execute SQL
        $value = $this->_db->executeSQLReturnOneValue($stmt);
        return $value;

      } catch (PDOException $e) {
        throw $e;
      }
    }
    
  #endregion

}