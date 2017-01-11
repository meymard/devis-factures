<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Facture;
use AppBundle\Form\FactureType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * FactureController.
 *
 * @uses Controller
 * @author Marc EYMARD <contact@marc-eymard.fr>
 */
class FactureController extends Controller
{
    /**
     * Liste des factures.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/", name="facture")
     * @Method("GET")
     */
    public function listeAction(Request $request)
    {
        $factures = $this->getDoctrine()->getRepository('AppBundle:Facture')->findAll(['date' => 'desc']);

        return $this->render('AppBundle:Facture:liste.html.twig', [
            'factures' => $factures
        ]);
    }

    /**
     * saveAction.
     *
     * @param Request $request
     * @param Facture $facture
     *
     * @return Response
     *
     * @Route("/new", name="facture_new")
     * @Route("/{facture}/edit", name="facture_edit")
     * @Method("GET")
     */
    public function saveAction(Request $request, Facture $facture = null)
    {
        $facture = $facture ?: new Facture();

        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
        }

        return $this->render('AppBundle:Facture:save.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
