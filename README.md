# PHP CRUD

This is a crud made using PHP.

Lenguage used:
* PHP.
* CSS.
* JavaScript.
* MySql.

---

If you want to use this CRUD you must create your own DB, because I'm not sharing mine by now. In my case, I'm using Xampp, if you also use Xampp just change this:

```php
$this->conn = new PDO("mysql:host=$this->server;dbname=php_crud;port=3307", $this->user, $this->password, $options);
```

$server = Your server name. Normally, most people just type "localhost".
$user = Your user, who is "root" by default.
$password = And your password in case you have one.

Due to I have MySql on port 3307, I had to specify that, but if you have the default one, you don't have you add the port on your sentence.