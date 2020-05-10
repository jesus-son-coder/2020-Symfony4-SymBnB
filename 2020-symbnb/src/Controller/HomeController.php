<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 09/05/2020
 * Time: 12:55
 **/

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
  /**
   * @Route("/", name="homepage")
   */
  public function home()
  {
    return $this->render(
      'home.html.twig'
    );
  }


  /**
   * @Route("/hello/{prenom}/age/{age}", name="hello")
   * @Route("hello", name="hello_base")
   * @Route("/hello/{prenom}", name="hello_prenom")
   * Montre la page qui dit bonjour
   *
   * @param null $prenom
   * @param int $age
   * @return Response
   */
  public function hello($prenom = null, $age = 0)
  {
    return $this->render(
      'hello.html.twig', [
        'prenom' => $prenom,
        'age' => $age
      ]
    );
  }

}