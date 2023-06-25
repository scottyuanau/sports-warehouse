<?php

require_once "./classes/CartItemClass.php";

/**
 * Defines a shopping cart (collection of items)
 */
class ShoppingCart
{

  #region Properties (private)

    private $_cartItems = [];
    private $_shoppingOrderId;
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

  #region Methods

    public function count()
    {
      return count($this->_cartItems);
    }

    public function setShoppingOrderId($id)
    {
      $this->_shoppingOrderId = (int)$id;
    }

    public function getItems()
    {
      return $this->_cartItems;
    }

    // Add item to cart
    public function addItem($cartItem)
    {
      // If cartItem already exists update quantity
      $found = $this->inCart($cartItem);

      if($found != null) {
        // Update quantity
        $this->updateItem($cartItem);
      } else {
        // Insert new cart item
        $this->_cartItems[] = $cartItem;
      }
    }

    // Update quantity
    public function updateItem($cartItem)
    {
      $index = $this->itemIndex($cartItem);

      // Get current quantity
      $oldQty = $this->_cartItems[$index]->getQuantity();
      $additionalQty = $cartItem->getQuantity();

      // Calculate new quantity
      $newQty = $oldQty + $additionalQty;

      // Update cart item with new quatity
      $this->_cartItems[$index]->setQuantity($newQty);
    }

    // Remove item
    public function removeItem($cartItem)
    {
      // $index = array_search($cartItem, $this->_cartItems);
      $index = $this->itemIndex($cartItem);
        
      if($index >= 0) {
        // Remove array element
        unset($this->_cartItems[$index]);
        // Reorganise values
        $this->_cartItems = array_values($this->_cartItems);
      }
    }

    // Calculate total
    public function calculateTotal()
    {
      $total = 0.0;

      foreach ($this->_cartItems as $item) {
        $total += $item->getQuantity() * $item->getPrice();
      }
      
      return $total;
    }

    // Save cart
    public function saveCart($address, $contactNumber, $creditCardNumber, $cSV, $email, $expiryDate, $firstName, $lastName, $nameOnCard)
    {
      try{
      // Open database connection
      $this->_db->connect();

      // Set up SQL statement to insert order
      $sql = <<<SQL
      INSERT INTO shoppingorder (address, contactNumber, creditCardNumber, csv, email, expiryDate, firstName, lastName, nameOnCard, orderDate) 
      VALUES (:Address, :ContactNumber, :CreditCardNumber, :CSV, :Email, :ExpiryDate, :FirstName, :LastName, :NameOnCard, curdate())
      SQL;

      // Prepare statement and bind values
      $stmt = $this->_db->prepareStatement($sql);

      $stmt->bindValue(":Address" , $address, PDO::PARAM_STR);
      $stmt->bindValue(":ContactNumber" , $contactNumber, PDO::PARAM_STR);
      $stmt->bindValue(":CreditCardNumber" , $creditCardNumber, PDO::PARAM_STR);
      $stmt->bindValue(":CSV" , $cSV, PDO::PARAM_STR);
      $stmt->bindValue(":Email" , $email, PDO::PARAM_STR);
      $stmt->bindValue(":ExpiryDate" , $expiryDate, PDO::PARAM_STR);
      $stmt->bindValue(":FirstName" , $firstName, PDO::PARAM_STR);
      $stmt->bindValue(":LastName" , $lastName, PDO::PARAM_STR);
      $stmt->bindValue(":NameOnCard" , $nameOnCard, PDO::PARAM_STR);
      
      $shoppingOrderId = $this->_db->executeNonQuery($stmt, true);

      // Set up insert statement to run for EACH item in the cart
      $sql = <<<SQL
      INSERT INTO orderitem (itemId, price, quantity, shoppingOrderId) 	
      VALUES (:ItemID, :Price, :Quantity, :shoppingOrderID)
      SQL;

      // Prepare statement (bind values later inside loop for EACH item)
      $stmt = $this->_db->prepareStatement($sql);

      // Loop through shopping cart, insert items
      foreach ($this->_cartItems as $item) 
      {
        // Bind values (statement already prepared)
        $stmt->bindValue(":ItemID" , $item->getItemId(), PDO::PARAM_INT);
        $stmt->bindValue(":Price" , $item->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(":Quantity" , $item->getQuantity(), PDO::PARAM_INT);
        $stmt->bindValue(":shoppingOrderID" , $shoppingOrderId, PDO::PARAM_INT);

        // For each item insert a row in OrderItem
        $this->_db->executeNonQuery($stmt);
      }

      return $shoppingOrderId; 
    } catch (Exception $e) {
      throw $e;
    }
    
    }

    private function inCart($cartItem)
    { 
        $found = null;

        foreach($this->_cartItems as $item) 
        {
            if ($item->getItemId() == $cartItem->getItemId() )
            {
                $found = $item;
            }
        }
        return $found;
    }

    private function itemIndex($cartItem)
    {
      $index = -1;

      for($i=0; $i<$this->count(); $i++) {
        if($cartItem->getItemId() == $this->_cartItems[$i]->getItemId())
        {
            $index = $i;
        }
      }

      return $index;
    }

    // Display array testing purposes
    public function displayArray()
    {
      echo "<pre>";
      print_r($this->_cartItems);
      echo "</pre>";
    }

  #endregion
  
}
