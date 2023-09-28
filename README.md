# Manual - php 2023

## Основные параметры и методы:

```php
var_damp($var) - вывод данных на экран
echo "Переменная {$var}" - вывод данных на экран
date('y-m-d'); - метод вернет год месяц число

```

## Раздел ООП

### 1. Создаем класс Product:

**_Используем модификаторы_** ->
**public** - доступ к свойству и методу отовсюду;
**private** - доступ только из текущего класса с ним работаем через get-возвращает информацию и set-перезапишет;
**protected** - доступ только из текущего класса и классов наследников;

```php
<?php
class Product {
	public $id;
	public static $title; static - модификатор показывает что переменная принадлежит классу, а не экземпляру класса (меняем в одном - меняется во всех)!!!
	const PI = 3.14; создание константы
// или метод конструктор нужен для создания экземпляра класса и передачи в него данных
	function __construct(
		protected $name,
		protected $price,
		protected $description,
		protected $quantity
	) {
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
		$this->quantity = $quantity;
		$this->display(); - вызов метода при создании класса!
	}
	function __clone() { - при клонировании экземпляра -> конструктор не вызывается (перехватываем событие клон и вызываем метод)
		$this->display();
	}

	public function display() {
	echo "<h1>{this->$id}</h1>"; this - ссылка на объект который вызывает этот метод или свойство.
	echo "<h1>{self::$title}</h1>"; self or static - ссылка на объект который вызывает этот метод или свойство если оно static.
	echo self::PI; - вызов константы
  }
}
?>

```

- Создаем экземпляр класса Product и работаем с ним:

```php
$product = new Product(); - экземпляр класса Product без конструктора.
$product->id = 3; - доступ к публичным полям и изменение их.
$product::$title or Product::$title; - доступ к переменной со свойством static!!!!

$product->display(); вызов метода класса
-----------------------------------------------------
$product = new Product (name ='Иван', price = 1000, description ='богатырь', quantity ='35'); - экземпляр класса Product c помощью конструктора.

$product->display(); вызов метода класса
-----------------------------------------------------
$product = clone $product2; - клонирование экземпляра класса
$product2->quantity = 30; переопределение свойств
```

### 2. Создаем класс потомок (расширение функционала класса Product):

```php
<?php
class News extend Product {
	function __construct($name, $price, $description, $quantity, $data) {
		parent::__construct( $name, $price, $description, $quantity)

		$this->data = $data; вызов конструктора родителя
	}

	public function display() {
		parent::display(); обращение к родительскому методу (полиморфизм)
		echo "год {this->$data}"; дополнение род. метода
  }
}
?>

```

- Создаем экземпляр класса News и работаем с ним:

```php
$news = new News (data = 1680, name ='Иван', price = 1000, description ='богатырь', quantity ='35');

$news->display(); вызов метода класса
-----------------------------------------------------

```
