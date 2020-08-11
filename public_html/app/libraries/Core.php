<?php

//    App Core Class
//    Creates URL & loads core controller
//    URL FORMAT - /controller/method/params

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];


        public function __construct() {
            $url = $this->getUrl();
//            print_r($url[1]);
            // Look in controllers for first value of URL
            if (file_exists(ROOT_DIR . '/app/controllers/' . ucwords($url[0]). '.php')) {
                // If exists, set it as controller
                $this->currentController = ucwords($url[1]);
                // Unset 0 Index
                unset($url[0]);
            }


            // Require the controller :) see ya ! :D
            require_once ROOT_DIR . '/app/controllers/' . $this->currentController . '.php';
            // Instantiate controller class
            $this->currentController = new $this->currentController;

            // Check for second part of URL
            if (isset($url[2])) {
                // Check to see if method exists in controller
                if(method_exists($this->currentController, $url[2])) {
                    $this->currentMethod = $url[2];
                    // Unset 1 index
                    unset($url[2]);
                }
            }
            // Get params
            $this->params = $url ? array_values($url) : [];
            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        }

        public function getUrl() {
            echo '<pre>';
//            var_dump($_SERVER['HTTP_HOST']);
//            print_r($_SERVER['REQUEST_URI']);
            echo '</pre>';
//            $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            if(isset($_SERVER['REQUEST_URI'])) {

            // rtrim() Removes the desired char from the right side
            $url = rtrim($_SERVER['REQUEST_URI'], '/');

            // Sanitizes URL so that only URL chars remain
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Separate URL's parameters in array by '/'
            $url = explode('/', $url);
            return  $url;
            };
        }
    }



/**
 * $_GET parameter ima is url for example http://localhost?url=Mantas
 * $_GET['url'] = Mantas
 * Jeigu nori daryti localhost/page/mantas
 * turi kitaip formuoti url
 * Pagavai? :D
 * Tipo formuoti, kad paciam URL nebutu zodzio url? nugi matai dabar ziurek idemiai
 * Tai cia esme ir buvo, kad jis pasirase hujova url pasiemima? turėjo sita naudot?
 * Nes jis ir raso savo custom tipo funkcijas, kad ta get isdarkyt ir pasiimt tik zodelius - problema buvo del apacho, bet url emimas pas tave padarytas kad butu localhost?url=tavokazkoksurl - cia yra nesamone :D
 * Tai bandyt toliau sita visa kursa daryt geriau su situ $_SERVER? manau
 * O kas tiksliai si apachae buvo nesupratau : ( nebuvo enablintas REWRITE_MODULE :) matei, kad atkomentavau ir pradejo veikti
 * Jo.
 * tai del to module buvo viskas
 * Gali dar karta parodyt ji
 *
 */
// tu pagal sita darai? Jo cia nepagausi url :)