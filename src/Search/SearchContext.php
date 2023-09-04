<?php

namespace App\Search;

use Symfony\Component\DependencyInjection\Attribute\Exclude;
use Symfony\Component\Validator\Constraints as Assert;

#[Exclude]
class SearchContext
{
    public function __construct(
        #[Assert\NotBlank]
        private readonly string $term,
        #[Assert\Range(min: 1)]
        private readonly int $page = 1,
        #[Assert\Range(max: 50)]
        private readonly int $itemsPerPage = 30,
    ) {
    }

    public function getTerm(): string
    {
        return $this->term;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }
}
