<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * FactureController.
 *
 * @uses Controller
 * @author Marc EYMARD <contact@marc-eymard.fr>
 */
class InterfaceController extends Controller
{
    /**
     * Accueil.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/", name="accueil")
     */
    public function accueilAction(Request $request)
    {
        return $this->render('::base.html.twig');
    }
}
