<?php

namespace App\Controller;

use App\Entity\Vol;
use App\Repository\VolRepository;
use App\Entity\Reserver;
use App\Form\ReserverType;
use App\Repository\ReserverRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('acceuil/index.html.twig');
    }

    /**
     * @Route("/propos", name="propos")
     */
    public function propos(): Response
    {
        return $this->render('acceuil/propos.html.twig');
    }
    /**
     * @Route("/blog", name="blog")
     */
    public function blog(): Response
    {
        return $this->render('acceuil/blog.html.twig');
    }

    /**
     * @Route("/voyage", name="voyage")
     */
    public function voyage(): Response

    {

        $v = $this->getDoctrine()->getManager();
        $d['vol'] = $v->getRepository(Vol::class)->findAll();
        return $this->render('acceuil/voyage.html.twig',$d);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('acceuil/contact.html.twig');
    }
/**
     * @Route("/voyage/reservation", name="reservation")
     */
    public function reservation(): Response
    {
        return $this->render('clients/reservation.html.twig');
    }
    /**
     * @Route("/voyage/mes_reservation", name="mes_reservation")
     */
    public function mes_reservation(): Response

    {
        $v = $this->getDoctrine()->getManager();
        $d['reservations'] = $v->getRepository(Reserver::class)->findAll();
        
        return $this->render('clients/mes_reservation.html.twig',$d);
    }
    /**
     * @Route("/voyage/logout", name="logout")
     */
    public function logout(): Response
    {
        return $this->render('clients/logout.html.twig');
    }
    /**
     * @Route("/voyage/profil", name="profil")
     */
    public function profil(): Response
    {
        return $this->render('clients/profil.html.twig');
    }
    /**
     * @Route("/voyage/reserve_s", name="reserve_s")
     */
    public function reserve_s(): Response
    {
        return $this->render('clients/reserve_s.html.twig');
    }

    /**
     * @Route("/voyage/recherche", name="recherche")
     */
    public function recherche(): Response
    {
        return $this->render('clients/recherche.html.twig');
    }


}
