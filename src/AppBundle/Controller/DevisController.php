<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Devis;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * DevisController.
 *
 * @uses Controller
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
 * @Rest\Route("/devis")
 */
class DevisController extends FOSRestController
{
    /**
     * Liste des devis.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Rest\Get("/list.{_format}", name="devis_list")
     */
    public function listAction(Request $request): Response
    {
        $devis = $this->getDoctrine()->getRepository('AppBundle:Devis')->findAll(['date' => 'desc']);

        $view = $this->view($devis, 200)
            ->setTemplate("AppBundle:Devis:list.html.twig")
            ->setTemplateVar('devis');

        return $this->handleView($view);
    }
}
