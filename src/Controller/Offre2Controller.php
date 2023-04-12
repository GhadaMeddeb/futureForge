<?php

namespace App\Controller;

use App\Entity\Offre2;
use App\Form\Offre2Type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/offre2')]
class Offre2Controller extends AbstractController
{
    #[Route('/', name: 'app_offre2_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $offre2s = $entityManager
            ->getRepository(Offre2::class)
            ->findAll();

        return $this->render('offre2/index.html.twig', [
            'offre2s' => $offre2s,
        ]);
    }

    #[Route('/new', name: 'app_offre2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offre2 = new Offre2();
        $form = $this->createForm(Offre2Type::class, $offre2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offre2);
            $entityManager->flush();

            return $this->redirectToRoute('app_offre2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre2/new.html.twig', [
            'offre2' => $offre2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre2_show', methods: ['GET'])]
    public function show(Offre2 $offre2): Response
    {
        return $this->render('offre2/show.html.twig', [
            'offre2' => $offre2,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_offre2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre2 $offre2, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Offre2Type::class, $offre2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_offre2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre2/edit.html.twig', [
            'offre2' => $offre2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre2_delete', methods: ['POST'])]
    public function delete(Request $request, Offre2 $offre2, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offre2->getId(), $request->request->get('_token'))) {
            $entityManager->remove($offre2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offre2_index', [], Response::HTTP_SEE_OTHER);
    }
}
