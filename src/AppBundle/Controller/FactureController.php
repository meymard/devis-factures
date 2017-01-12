<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Facture;
use AppBundle\Form\FactureType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * FactureController.
 *
 * @uses Controller
 * @author Marc EYMARD <contact@marc-eymard.fr>
 */
class FactureController extends FOSRestController
{
    /**
     * Liste des factures.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Rest\Get("/facture/list.{_format}", name="facture_list")
     */
    public function listAction(Request $request)
    {
        $factures = $this->getDoctrine()->getRepository('AppBundle:Facture')->findAll(['date' => 'desc']);

        $view = $this->view($factures, 200)
            ->setTemplate("AppBundle:Facture:list.html.twig")
            ->setTemplateVar('factures');

        return $this->handleView($view);
}

    /**
     * saveAction.
     *
     * @param Request $request
     * @param Facture $facture
     *
     * @return Response
     *
     * @Rest\Post("/facture/save", name="facture_save")
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
