<?php
/**
 * Created By Magdalena Kuncicka
 * Copyright (c) 2018
 *
 * All Rights Reserved
 */

namespace AppBundle\Controller;

use Cookway\Application\Dictionary\Query\UnitDictionaryQueryParameters;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DictionaryController extends BaseController
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
        $query = $this->get('app.dictionary.units_dictionary_query');
        $parameters = new UnitDictionaryQueryParameters();

        return $this->query($query, $parameters);
    }

}