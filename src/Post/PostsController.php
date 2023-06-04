<?php 


namespace App\Post;

use App\Core\AbstractController;

class PostsController extends AbstractController
{

    public function __construct(
        PostsRepository $postsRepository,
        CommentsRepository $commentsRepository
        ) 
    {
        $this->postsRepository = $postsRepository;
        $this->commentsRepository = $commentsRepository;
    }


    public function index() 
    {
        $posts = $this->postsRepository->All(); 
        $this->render("post/index", [
            'posts' => $posts
        ]);

        // include __DIR__ . "/../../view/post/blog.php";

    }

    public function show() {
        $id = $_GET['id'];
        if (isset($_POST['content'])) {
            $content = $_POST['content'];
            $this->commentsRepository->insertPost($id, $content);
        }
        
        $post = $this->postsRepository->find($id, mail: " ");
        $comments = $this->commentsRepository->allByPost($id);


        $this->render("post/show", [
            'post' => $post,
            'comments' => $comments
        ]);

        // include __DIR__ . "/../../view/post/show.php";
    }

    
    

}

?>

<?php 

// namespace App\Post;

// class PostsController {

//     public function __construct(PostsRepository $postsRepository) {
//         $this->postsRepository = $postsRepository;
//     }

//     protected function render($view, $params) {

//         // foreach($params AS $key => $value) {
//         //   ${$key} = $value; 
//         // }

//         extract($params);

//         include __DIR__ . "/../../view/{$view}.php";
//     }

//     public function blog() 
//     {
//         $posts = $this->postsRepository->fetchPosts(); 
//         $this->render("post/blog", [
//             'posts' => $posts
//         ]);

//         // include __DIR__ . "/../../view/post/blog.php";

//     }

//     public function show() {
//         $id = $_GET['id'];
//         $post = $this->postsRepository->fetchPost($id);
//         $this->render("post/show", [
//             'post' => $post
//         ]);

//         // include __DIR__ . "/../../view/post/show.php";
//     }

    

// }

  // $mail = $_GET['mail'];

?>

