<?php

    class User
    {
        private $login, $password;

        public function __construct($login, $password)
        {
            $this->login = $login;
            $this->password = $password;

            /* авторизация пользователя */
        }
    }

    class Shop
    {
        public $user;
        public $product;

        public function __construct(User $user)
        {
            $this->user = $user;

            if (!$user) $this->user = 'guest';
        }

        public function addProduct($product)
        {
            $this->product = new Product($product);
        }

        public function checkout()
        {
            /* просмотр содержимого или выбранного
               и передача в заказ */
        }

        public function delivery($address) {
            /* реализация доставки */
        }
    }

    class Product
    {
        public $product;

        public function __construct($product)
        {
            $this->product = $product;

            if ($this->product < 0) return;

            Basket::add($this->product);
        }
    }

    class Basket
    {
        public static function add($product)
        {
            /* добавление товара в корзину,
               реализация скидки */
        }
    }

    $user = new User('login', 'password');
    $shop = new Shop($user);

    $shop->addProduct('Мыло');
    $shop->checkout();
    $shop->delivery('address');