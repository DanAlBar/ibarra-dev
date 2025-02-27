<?php
class Order
{
	private $itemCost;
	private $numItems;

	public function getItemCost()
	{
		return $this->itemCost;
	}
	
	public function setItemCost($cost)	
	{
		$this->itemCost = $cost;
	}
	
	public function getNumItems()
	{
		return $this->numItems;
	}
	
	public function setNumItems($items)
	{
		$this->numItems = $items;
	}
	
	public function getSubTotal()
	{	
		return number_format($this->itemCost * $this->numItems, 2);
	}

	public function getSalesTax()
	{	
		return number_format($this->getSubTotal() * 0.07, 2);
	}

	public function getShippingHandling()
	{	
		return number_format($this->numItems * 1.75, 2);
	}

	public function getTotal()
	{	
		return number_format($this->getSubTotal() + $this->getSalesTax() + $this->getShippingHandling(),2);
	}
	
	
} // end of class definition
?>
