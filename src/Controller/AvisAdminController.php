<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/avis')]
class AvisController extends AbstractController
{
    #[Route('/', name: 'admin_avis_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $avis = $entityManager
            ->getRepository(Avis::class)
            ->findAll();

        return $this->render('avisAdmin/index.html.twig', [
            'avis' => $avis,
        ]);
    }

    #[Route('/new', name: 'admin_avis_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avi = new Avis();
        $form = $this->createForm(AvisType::class, $avi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avi);
            $entityManager->flush();

            return $this->redirectToRoute('admin_avis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('avisAdmin/new.html.twig', [
            'avi' => $avi,
            'form' => $form,
        ]);
    }

    #[Route('/{idAvis}', name: 'admin_avis_show', methods: ['GET'])]
    public function show(Avis $avi): Response
    {
        return $this->render('avisAdmin/show.html.twig', [
            'avi' => $avi,
        ]);
    }

    #[Route('/{idAvis}/edit', name: 'admin_avis_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvisType::class, $avi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_avis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('avisAdmin/edit.html.twig', [
            'avi' => $avi,
            'form' => $form,
        ]);
    }

    #[Route('/{idAvis}', name: 'admin_avis_delete', methods: ['POST'])]
    public function delete(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avi->getIdAvis(), $request->request->get('_token'))) {
            $entityManager->remove($avi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_avis_index', [], Response::HTTP_SEE_OTHER);
    }
}
