<?php

    class Router {

        private $routes = [
            'GET' => []
        ];

        public function get (string $path, string $callback) {
            $this->routes['GET'][$path] = $callback;
        }

    }




?>