<?php

namespace App\Controller;

use App\Entity\ReservationBus;
use App\Form\ReservationBusType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reservation/bus')]
class ReservationBusController extends AbstractController
{
    #[Route('/', name: 'app_reservation_bus_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $reservationBuses = $entityManager
            ->getRepository(ReservationBus::class)
            ->findAll();

        return $this->render('reservation_bus/index.html.twig', [
            'reservation_buses' => $reservationBuses,
        ]);
    }

    #[Route('/new', name: 'app_reservation_bus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservationBu = new ReservationBus();
        $form = $this->createForm(ReservationBusType::class, $reservationBu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservationBu);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_bus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation_bus/new.html.twig', [
            'reservation_bu' => $reservationBu,
            'form' => $form,
        ]);
    }

    #[Route('/{idReservationBus}', name: 'app_reservation_bus_show', methods: ['GET'])]
    public function show(ReservationBus $reservationBu): Response
    {
        return $this->render('reservation_bus/show.html.twig', [
            'reservation_bu' => $reservationBu,
        ]);
    }

    #[Route('/{idReservationBus}/edit', name: 'app_reservation_bus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReservationBus $reservationBu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationBusType::class, $reservationBu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_bus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservation_bus/edit.html.twig', [
            'reservation_bu' => $reservationBu,
            'form' => $form,
        ]);
    }

    #[Route('/{idReservationBus}', name: 'app_reservation_bus_delete', methods: ['POST'])]
    public function delete(Request $request, ReservationBus $reservationBu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationBu->getIdReservationBus(), $request->request->get('_token'))) {
            $entityManager->remove($reservationBu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_bus_index', [], Response::HTTP_SEE_OTHER);
    }
}
