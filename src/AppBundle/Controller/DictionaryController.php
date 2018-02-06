<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) ${year}
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;


use Cookway\Application\Recipe\DictionaryListView;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DictionaryController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/dictionary/units")
     *
     * @param Request $request
     * @return Response
     */
    public function getUnitsDictionary(Request $request)
    {
        $query = $this->get('app.dictionary.units_ditionary_query');
        $result = $query->query();
        $serializer = $this->get('jms_serializer');
        $response = new Response($serializer->serialize($result, 'json'), 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}