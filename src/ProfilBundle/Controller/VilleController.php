<?php

namespace ProfilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
class VilleController extends Controller
{
    public function alljsonAction()
    {
        $em= $this->getDoctrine()->getManager();
        $utilisateurs=$em->getRepository("EntiteBundle:Ville")
            ->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($utilisateurs);
        return new JsonResponse($formatted);
    }
}
