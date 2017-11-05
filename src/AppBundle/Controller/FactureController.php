<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Facture;
use AppBundle\Form\FactureType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * FactureController.
 *
 * @uses Controller
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
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
     */
    public function listAction(Request $request): Response
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
     */
    public function postAction(Request $request, Facture $facture = null): Response
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
