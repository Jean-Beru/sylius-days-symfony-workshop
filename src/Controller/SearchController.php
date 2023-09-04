<?php

namespace App\Controller;

use App\Search\SearchContext;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(#[MapQueryString] SearchContext $searchContext): Response
    {
        return $this->render('search/index.html.twig', [
            'searchContext' => $searchContext,
        ]);
    }
}
