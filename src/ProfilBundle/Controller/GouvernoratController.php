<?php

namespace ProfilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GouvernoratController extends Controller
{
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gouvernorats = $em->getRepository('EntiteBundle:Gouvernorat')->findAll();

        return $this->render('@Profil/Gouvernorat/all.html.twig', array(
            'gouvernorats' => $gouvernorats
        ));
    }
    public function alljsonAction()
    {
//        $em= $this->getDoctrine()->getManager();
//        $utilisateurs=$em->getRepository("EntiteBundle:Gouvernorat")
//            ->findAll();
//        $serializer=new Serializer([new ObjectNormalizer()]);
//        $formatted=$serializer->normalize($utilisateurs);
//        return new JsonResponse($formatted);
        $em= $this->getDoctrine()->getManager();

        $utilisateurs=$em->getRepository("EntiteBundle:Gouvernorat")
            ->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return null;
        });
        $serializer=new Serializer([$normalizer]);
        $formatted=$serializer->normalize($utilisateurs);
        return new JsonResponse($formatted);
    }
}
