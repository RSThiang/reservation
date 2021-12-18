<?php

namespace App\Controller;

use App\Entity\Aeroport;
use App\Form\AeroportType;
use App\Repository\AeroportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aeroport")
 */
class AeroportController extends AbstractController
{
    /**
     * @Route("/", name="aeroport_index", methods={"GET"})
     */
    public function index(AeroportRepository $aeroportRepository): Response
    {
        return $this->render('aeroport/index.html.twig', [
            'aeroports' => $aeroportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aeroport_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aeroport = new Aeroport();
        $form = $this->createForm(AeroportType::class, $aeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aeroport);
            $entityManager->flush();

            return $this->redirectToRoute('aeroport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('aeroport/new.html.twig', [
            'aeroport' => $aeroport,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="aeroport_show", methods={"GET"})
     */
    public function show(Aeroport $aeroport): Response
    {
        return $this->render('aeroport/show.html.twig', [
            'aeroport' => $aeroport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aeroport_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Aeroport $aeroport, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AeroportType::class, $aeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('aeroport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('aeroport/edit.html.twig', [
            'aeroport' => $aeroport,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="aeroport_delete", methods={"POST"})
     */
    public function delete(Request $request, Aeroport $aeroport, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aeroport->getId(), $request->request->get('_token'))) {
            $entityManager->remove($aeroport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aeroport_index', [], Response::HTTP_SEE_OTHER);
    }
}
