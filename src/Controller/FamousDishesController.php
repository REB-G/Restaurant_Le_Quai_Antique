<?php

namespace App\Controller;

use App\Entity\FamousDishes;
use App\Form\FamousDishesType;
use App\Repository\FamousDishesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/famous/dishes')]
class FamousDishesController extends AbstractController
{
    #[Route('/', name: 'app_famous_dishes_index', methods: ['GET'])]
    public function index(FamousDishesRepository $famousDishesRepository): Response
    {
        return $this->render('famous_dishes/index.html.twig', [
            'famous_dishes' => $famousDishesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_famous_dishes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FamousDishesRepository $famousDishesRepository): Response
    {
        $famousDish = new FamousDishes();
        $form = $this->createForm(FamousDishesType::class, $famousDish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $famousDishesRepository->save($famousDish, true);

            return $this->redirectToRoute('app_famous_dishes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('famous_dishes/new.html.twig', [
            'famous_dish' => $famousDish,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_famous_dishes_show', methods: ['GET'])]
    public function show(FamousDishes $famousDish): Response
    {
        return $this->render('famous_dishes/show.html.twig', [
            'famous_dish' => $famousDish,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_famous_dishes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FamousDishes $famousDish, FamousDishesRepository $famousDishesRepository): Response
    {
        $form = $this->createForm(FamousDishesType::class, $famousDish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $famousDishesRepository->save($famousDish, true);

            return $this->redirectToRoute('app_famous_dishes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('famous_dishes/edit.html.twig', [
            'famous_dish' => $famousDish,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_famous_dishes_delete', methods: ['POST'])]
    public function delete(Request $request, FamousDishes $famousDish, FamousDishesRepository $famousDishesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$famousDish->getId(), $request->request->get('_token'))) {
            $famousDishesRepository->remove($famousDish, true);
        }

        return $this->redirectToRoute('app_famous_dishes_index', [], Response::HTTP_SEE_OTHER);
    }
}
