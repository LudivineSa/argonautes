<?php

namespace App\Controller;

use App\Entity\Matelos;
use App\Form\MatelosFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $matelos = $this->em->getRepository(Matelos::class)->findAll();

        return $this->render('home/index.html.twig', [
            'matelos' => $matelos,
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function add(EntityManagerInterface $em, Request $request): Response
    {
        $matelos = new Matelos();
        $matelosForm = $this->createForm(MatelosFormType::class, $matelos);
        $matelosForm->handleRequest($request);

        if ($matelosForm->isSubmitted() && $matelosForm->isValid()) {
            $matelos = $matelosForm->getData();
            $this->em->persist($matelos);
            $this->em->flush();
            return $this->redirectToRoute("home");
        }
        return $this->render('home/add.html.twig', [
            'matelos_form' => $matelosForm->createView()
        ]);
    }
}
