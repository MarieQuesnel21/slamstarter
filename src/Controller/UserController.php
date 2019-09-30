<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

 /**
     * @Route("/user")
     */

class UserController extends AbstractController {
    /**
     * @Route("/index", name="user_index")
     */
    public function index () {

        $usersList = array();

        $usersList[0]['first_name'] = 'Michel';
        $usersList[0]['last_name'] = 'Dupont';

        $usersList[1]['first_name'] = 'Sophie';
        $usersList[1]['last_name'] = 'Bouzal';

        return $this->render('user/user.html.twig',[
            'users_list' => $usersList, 
        ]);
        
        }



}