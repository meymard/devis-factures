<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Devis;
use AppBundle\Form\FactureType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * DevisController.
 *
 * @uses Controller
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
 * @Route("/devis")
 */
class DevisController extends Controller
{
    /**
     * Liste des devis.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/liste", name="devis_liste")
     * @Method("GET")
     */
    public function listeAction(Request $request): Response
    {
        $devis = $this->getDoctrine()->getRepository('AppBundle:Devis')->findAll(['date' => 'desc']);

        return $this->render("AppBundle:Devis:liste.html.twig", ['devis' => $devis]);
    }

    /**
     * Nouveau devis.
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/nouveau", name="devis_nouveau")
     * @Route("/duppliquer/{original}", requirements={"devis": "[0-9]+"}, name="devis_duppliquer")
     * @Method({"GET", "PUT"})
     */
    public function nouveauAction(Request $request, Devis $original = null): Response
    {
        if ($original) {
            $devis = clone $original;
        } else {
            $devis = new Devis();
        }

        $form = $this->createForm(FactureType::class, $devis, [
            'action' => $this->generateUrl('devis_nouveau'),
            'method' => 'PUT'
        ]);

        $form->handleRequest($request);
        if ($form->isValid()) {
            var_dump($devis);
            exit;
        }

        return $this->render('AppBundle:Devis:nouveau.html.twig', ['form' => $form->createView()]);
    }
}
