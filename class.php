
<?php
class Product
{

	public function __construct(
		protected $name,
		protected $price,
		protected $description,
		protected $quantity
	) {
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
		$this->quantity = $quantity;
	}
} ?>