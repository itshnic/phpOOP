# Manual - php 2023

## Основы РНР:

#### 1. Встроенные функции

```php
var_damp($var) - вывод данных на экран
echo "Переменная {$var}" - вывод данных на экран
date('y-m-d'); - метод вернет год месяц число
$x; - объявление переменной
const PI; объявление константы
```

#### 2. Массивы

```php
----------------
echo <pre>
print_r([]) - вывод массива в виде дерева
echo </pre>
----------------
count([]) - длина массива
echo arr[count[]-1]; - вывод последнего элемента массива
foreach($arrs as $arr){} где arrs-массив arr-элемент -> метод для перебора массива (цикл);
$arr = explode("(разделитель)","string"); перевод из строки в массив по разделителю
$str = implode("(разделитель)",$arr); из массива в строку
$arr[i]=1000; добавление или перезапись элемента с индексом i.
array_push($arr,1000); Добавление элемента в конец массива
array_pop($arr); Удаление последнего элемента
unset($arr); Удаление массива
array_splice($arr,(начать с вкл),(кол-во)); удаление элементов массива
--------------------------------
АССОЦИАТИВНЫЕ МАССИВЫ - где ключ это строка!
$arr = ['ключ1'->'значение1','ключ1'->'значение1',...]
foreach ($arrs as $key => $value){};
--------------------------------
is_array($arr); проверка на массив (true/ false)

СУПЕР-ГЛОбАЛЬНЫЕ МАССИВЫ
print_r($_SERVER); через исходный код смотрим структуру
$_SERVER['HTTP_REFERER']; узнать откуда пришел к нам клиент
$path = $_SERVER['DOCUMENT_ROOT']."/files/text.txt" - абсолютный путь к файлу
$_FILES - хранит во временном хранилище фаил и информацию о нем.
$_COOKIE["$content"]
```

#### 2. Работа с файлами

```php
include_once("путь к файлу"); - проверяет был-ли импорт файла. Импортирует только 1 раз!!!
include("путь к файлу"); многократный импорт. Не строгая проверка пути
require("путь к файлу"); многократный импорт. Строгая проверка (пути/ наличия файла)
require_once("путь к файлу");

fopen("путь к файлу","метка"); открытие файла
r - чтение; r+ - чтение и запись; w - перезапись и создание если файла нет; w+ - чтение, перезапись и создание если файла нет; a - запись в конец и создание если файла нет; a+ - чтение, запись в конец и создание если файла нет;
fopen("путь к файлу","метка") or die("нет файла");
feof() проверка конца файла
fgetc() чтение очередного символа
fgets() чтение очередной строки
file_get_contents("путь") читает весь контент файла (кроме HTTPS)
file_put_contents("имя ф-ла","контент") добавляет контент в фаил и создает - если его нет
header("Location: file.php") redirect автооткрытие файла
fputs("фаил","строка") or fwrite("фаил","строка") запись данных в фаил. Перед записью нужно открыть для чтения и записи fopen("путь к файлу","r+")
scandir("folder") читает файлы в папке. Выдает массив где 0 и 1 служебные файлы их игнорируем
move_uploaded_file("откуда","куда") перенос файла

```

#### 3. Работа базой данных MySQL

Connect MySQL:

```php
mysqli_connect("localhost","user","Pass","DB_name","имя  порта" ) подключение к базе данных
mysqli_query($link,"команда на получение данных") обращение к базе данных
$array = mysqli_fetch_assoc($query) прердаем данные в ассоциативный массив + or die("error") - ошибка при подключении

```

Command for BD:

```SQL
Создать:
CREATE TABLE `users`
(
`id` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(50) NOT NULL ,
`login` VARCHAR(50) NOT NULL ,
`pass` VARCHAR(64) NOT NULL ,
`is_admin` INT NULL DEFAULT '0' ,
PRIMARY KEY (`id`),
INDEX (`login`)
) ENGINE = InnoDB;

Добавить:
INSERT INTO `users`
(`id`, `name`, `login`, `pass`, `is_admin`)
VALUES
(NULL, 'roman', 'admin', '123', '0');

Изменить:
SET `name`='Roman',`login`='555'
WHERE
`id`='2'; меняет данные у id=2

Удаление:
DELETE FROM users WHERE `users`.`id` = 2"

```

#### 3.

```php
Web Socket Long connect - для длительного подключения (запроса) Моб. приложения, чаты

```

## Раздел ООП

#### 1. Создаем класс Product:

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

#### 2. Создаем класс потомок (расширение функционала класса Product):

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
