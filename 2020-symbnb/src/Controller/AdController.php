<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
  /**
   * @Route("/ads", name="ads_index")
   * @param AdRepository $repo
   * @param SessionInterface $session
   * @return Response
   */
  public function index(AdRepository $repo, SessionInterface $session)
  {
    // dump($session);
    $ads = $repo->findAll();

    return $this->render('ad/index.html.twig', [
      'ads' => $ads,
    ]);
  }


  /**
   * @Route("/ads/new", name="ad_create")
   */
  public function create()
  {
    $ad = new Ad();
    $form = $this->createFormBuilder($ad)
      ->add('title')
      ->add('introduction')
      ->add('content')
      ->add('rooms')
      ->add('price')
      ->add('coverImage')
      ->getForm()
    ;

    return $this->render('ad/new.html.twig', [
      'form' => $form->createView()
    ]);
  }


  /**
   * Permet d'afficher une seule annonce
   *
   * @Route("/ads/{slug}", name="ads_show")
   *
   * @param $slug
   * @param Ad $ad
   * @return Response
   */
  public function showAction($slug, Ad $ad)
  {
    return $this->render('ad/show.html.twig', [
      'ad' => $ad
    ]);
  }


}
