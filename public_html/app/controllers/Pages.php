<?php
    class Pages extends Controller{

        public function __construct(){
            //  Sets postModel to current model
            //  $this->postModel = $this->model('Post');
//            $postModel = $this->model('Post');
//            die($postModel);
        }

        // Reikia kazkaip automatskai sukurt Post objekta
        // Ir tada pasieks getPosts() metoda
        public function index() {
            // Get the post from DB
//            $posts = $this->postModel->getPosts();

            $data = [
                'title' => 'Home page',
                'posts' => $posts
            ];
            // Pass data from DB to view and show it
            $this->view('pages/index', $data);

        }

        public function about() {
            $data = [
                'title' => 'Welcome'
            ];

            $this->view('pages/about', $data);
//            $this->view('pages/about', ['Labas', 3]);
        }

        public function contact() {
            $this->view('pages/contact');
        }
    }