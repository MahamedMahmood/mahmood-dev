<?php 

    namespace App\Core;

    use PDO;
    use Exception;
    use PDOException;
    use App\Post\PostsRepository;
    use App\Post\CommentsRepository;
    use App\Post\PostsController;
    use App\Post\PostsAdminController;
    use App\User\UsersRepository;
    use App\User\LoginController;
    use App\User\LoginService;
    use App\Home\HomeController;
    use App\Registerieren\RegisterRepository;
    use App\Registerieren\RegisterController;
    

    class Container {

        private $receipts = [];
        private $instances = [];

        public function __construct() {
            $this->receipts = [
                'postsAdminController' => function() {
                    return new PostsAdminController(
                        $this->make('postsRepository'),
                        $this->make('loginService')
                    );
                },
                'registerController' => function() {
                    return new RegisterController(
                        $this->make('registerRepository')
                    );
                },
                'loginService' => function () {
                    return new LoginService(
                        $this->make("registerRepository")
                    );
                },
                'loginController' => function () {
                    return new LoginController(
                        $this->make("loginService")
                        // $this->make("usersRepository")
                    );
                },
                'postsController' => function() {
                    return new PostsController(
                        $this->make("postsRepository"),
                        $this->make("commentsRepository")
                    );
                },
                "postsRepository" => function() {
                    return new PostsRepository(
                        $this->make("pdo")
                    );
                },
                // 'usersRepository' => function() {
                //     return new UsersRepository(
                //         $this->make("pdo")
                //     );
                // }, 
                'commentsRepository' => function() {
                    return new CommentsRepository(
                        $this->make("pdo")
                    );
                },
                'registerRepository' => function() {
                    return new RegisterRepository(
                        $this->make("pdo")
                    );
                },
                'pdo' => function() {
                    try {
                        $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'X*NOs7qRTXdh)NOz');
                    } catch (PDOException $e) {
                        echo "Verbindung Datenbanken Fehlgeschlagen!";
                        die();
                    }
                    

                    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    return $pdo;
                   
                }
            ];
        }

        public function make($name) 
        {
           if (!empty($this->instances[$name])) {
                return $this->instances[$name];
           }

           if (isset($this->receipts[$name])) {
            return $this->instances[$name] = $this->receipts[$name]();
           }
           return $this->instances[$name];
           // ERzeuge: $this->instances[$name]
           
        }

        

    

        // private $pdo;
        // private $postsRepotitory;

        // public function getPdo() {

        //     if(!empty($this->pdo)) {
        //         return $this->pdo;
        //     }
            
        // // $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'Ve6jKLIniH-gCwGD');
        // $this->pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'Ve6jKLIniH-gCwGD');

        // // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // // return $pdo;
        // $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // return $this->pdo;
        // }

        // public function getPostsRepository() {

        //     if(!empty($this->postsRepository)) {
        //         return $this->postsRepository;
        //     }

        //     // return new PostsRepository(
        //     //     $this->getPdo()
        //     // );
        //       $this->postsRepository = new PostsRepository(
        //         $this->getPdo()
               
        //     );
        //     return $this->postsRepository;
        // }

    }



?>