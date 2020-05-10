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
   * Permet d'afficher une seule annonce
   *
   * @Route("/ads/{slug}", name="ads_show")
   *
   * @param $slug
   * @param AdRepository $repo
   * @return Response
   */
  public function showAction($slug, AdRepository $repo)
  {
    $ad = $repo->findOneBySlug($slug);

    return $this->render('ad/show.html.twig', [
      'ad' => $ad
    ]);
  }
}
