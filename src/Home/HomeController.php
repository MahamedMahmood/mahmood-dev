<?php 


namespace App\Home;

use App\Core\AbstractController;

class HomeController extends AbstractController
{

    public function __construct(HomeRepository $homeRepository) 
    {
        $this->homeRepository = $homeRepository;

    }


    public function index() 
    {
    
        $this->render("post/index", [
           
        ]);


    }

}

?>