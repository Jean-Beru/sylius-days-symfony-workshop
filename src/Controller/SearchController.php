<?php

namespace App\Controller;

use App\Provider\FakeProductProvider;
use App\Provider\ProviderInterface;
use App\Search\SearchContext;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(
        #[Autowire(service: FakeProductProvider::class)] ProviderInterface $productProvider,
        #[MapQueryString] SearchContext $searchContext,
    ): Response
    {
        return $this->render('search/index.html.twig', [
            'searchContext' => $searchContext,
            'results' => $productProvider->search($searchContext),
        ]);
    }
}
