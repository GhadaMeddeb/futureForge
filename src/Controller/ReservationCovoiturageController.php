<?php

namespace App\Controller;

use App\Entity\ReservationCovoiturage;
use App\Form\ReservationCovoiturageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reservation/covoiturage')]
class ReservationCovoiturageController extends AbstractController
{
    #[Route('/', name: 'app_reservation_covoiturage_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $reservationCovoiturages = $entityManager
            ->getRepository(ReservationCovoiturage::class)
            ->findAll();

        return $this->render('reservation_covoiturage/index.html.twig', [
            'reservation_covoiturages' => $reservationCovoiturages,
        ]);
    }

    #[Route('/new', name: 'app_reservation_covoiturage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservationCovoiturage = new ReservationCovoiturage();
        $form = $this->createForm(ReservationCovoiturageType::class, $reservationCovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservationCovoiturage);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_covoiturage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation_covoiturage/new.html.twig', [
            'reservation_covoiturage' => $reservationCovoiturage,
            'form' => $form,
        ]);
    }

    #[Route('/{idReservation}', name: 'app_reservation_covoiturage_show', methods: ['GET'])]
    public function show(ReservationCovoiturage $reservationCovoiturage): Response
    {
        return $this->render('reservation_covoiturage/show.html.twig', [
            'reservation_covoiturage' => $reservationCovoiturage,
        ]);
    }

    #[Route('/{idReservation}/edit', name: 'app_reservation_covoiturage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReservationCovoiturage $reservationCovoiturage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationCovoiturageType::class, $reservationCovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_covoiturage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation_covoiturage/edit.html.twig', [
            'reservation_covoiturage' => $reservationCovoiturage,
            'form' => $form,
        ]);
    }

    #[Route('/{idReservation}', name: 'app_reservation_covoiturage_delete', methods: ['POST'])]
    public function delete(Request $request, ReservationCovoiturage $reservationCovoiturage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationCovoiturage->getIdReservation(), $request->request->get('_token'))) {
            $entityManager->remove($reservationCovoiturage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_covoiturage_index', [], Response::HTTP_SEE_OTHER);
    }
}
