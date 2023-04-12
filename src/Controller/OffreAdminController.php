<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/offre')]
class OffreAdminController extends AbstractController
{
    #[Route('/', name: 'admin_offre_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $offres = $entityManager
            ->getRepository(Offre::class)
            ->findAll();

        return $this->render('offreAdmin/index.html.twig', [
            'offres' => $offres,
        ]);
    }

    #[Route('/{idOffre}', name: 'admin_offre_show', methods: ['GET'])]
    public function show(Offre $offre): Response
    {
        return $this->render('offreAdmin/show.html.twig', [
            'offre' => $offre,
        ]);
    }
}
