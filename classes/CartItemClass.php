<?php

/**
 * Defines a shopping cart item (product)
 */
class CartItem
{

  #region Properties (private)

    private $_itemName;
    private $_quantity;
    private $_price;
    private $_productId;

  #endregion

  #region Constructor
        
    /**
     * Build a new CartItem using provided data
     *
     * @param  string $itemName The name of the item
     * @param  float $quantity Number of items to purchase
     * @param  float $price The individual item price
     * @param  int $productId The ID of the product in the database
     * @return void
     */
    public function __construct(string $itemName, float $quantity, float $price, int $productId)
    {
      $this->_itemName = $itemName;
      $this->_quantity = (int)$quantity;
      $this->_price = (float)$price;
      $this->_productId = (int)$productId;
    }

  #endregion

  #region Getter and setter methods
  
    /**
     * Get quantity
     *
     * @return float The quantity
     */
    public function getQuantity()
    {
      return $this->_quantity;
    }

    /**
     * Set quantity
     *
     * @param  float $value The new quantity
     * @return void
     */
    public function setQuantity($value)
    {
      if((int)$value >= 0)
      {     	
        $this->_quantity = (int)$value;
      }
      else
      {
        throw new Exception("Quantity must be positive");
      }
    }

    /**
     * Get price
     *
     * @return float The price
     */
    public function getPrice()
    {
      return $this->_price;
    }

    /**
     * Get database item ID
     *
     * @return int The database item ID
     */
    public function getItemId()
    {
      return $this->_productId;
    }

    /**
     * Get item name
     *
     * @return string The item name
     */
    public function getItemName()
    {
      return $this->_itemName;
    }

  #endregion

}
