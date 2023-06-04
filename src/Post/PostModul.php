<?php 


namespace App\Post;

use App\Core\AbstractModel;

class PostModul extends AbstractModel
{

    public  $id;
    public $mail;
    public  $title;
    public  $content;
    // public $getShortContent;

//    $post->getShortContent();

// public function getShortContent()
//     {
//         if (strlen($this->content) >= 10)
//         {
//             return substr($this->content, 0 , 10);
//         }
//     }

}





// namespace App\Post;

// use ArrayAccess;

// class PostModul implements ArrayAccess
// {

//     public  $id;
//     public  $title;
//     public  $content;

//     public function offsetExists($offset) {
//         return isset($this->$offset);
//     }

//     public function offsetGet($offset) {
//         return $this->$offset;
//     }

//     public function offsetSet($offset, $value) {
//         $this->$offset = $value;
//     }

//     public function offsetUnset($offset) {
//         Unset($this->$offset);
//     }


// }


?>