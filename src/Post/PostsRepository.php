<?php 

namespace App\Post;

use App\Core\AbstractRepository;

class PostsRepository extends AbstractRepository
{

  public function getTableName() {
    return 'posts';
  }

  public function getModelName() {
    return 'App\\Post\\PostModul';
  }

  public function update(PostModul $model) 
  {
    $table = $this->getTableName();
    $stt = $this->pdo->prepare("UPDATE `{$table}` SET `content` = :content, `title` = :title WHERE `id` = :id");
    $stt->execute([
      'content' => $model->content,
      'title' => $model->title,
      'id' => $model->id
    ]);
  }

 
}






// namespace App\Post;

// use PDO;

// class PostsRepository {

//   private $pdo;

//   public function __construct(PDO $pdo) {
//       $this->pdo = $pdo;
//   }

//     function fetchPosts() {

//         global $pdo;
//       $stt =  $this->pdo->query("SELECT * FROM `posts`");
//       $posts = $stt->fetchAll(PDO::FETCH_CLASS, "App\\Post\\PostModul");
//       return $posts;
//     }
    
//     function fetchPost($id) {
//       // global this->pdo;
//       $stt = $this->pdo->prepare("SELECT * FROM `posts` WHERE id= :id");
//       $stt->execute(['id' => $id]);
//       // return $stt->fetch();
//       $stt->setFetchMode(PDO::FETCH_CLASS, "App\\Post\\PostModul");
//       $post = $stt->fetch(PDO::FETCH_CLASS);
//       return $post;
//       // $postArray = $stt->fetch();
//       // $post = new PostModul();
//       // $post->id = $postArray["id"];
//       // $post->title = $postArray["title"];
//       // $post->content = $postArray["content"];

//       return $post;


//     }
// }


?>