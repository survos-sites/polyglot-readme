<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Webfactory\Bundle\PolyglotBundle\Entity\BaseTranslation;
use Webfactory\Bundle\PolyglotBundle\Attribute as Polyglot;
use Webfactory\Bundle\PolyglotBundle\TranslatableInterface;

#[ORM\Table]
#[ORM\UniqueConstraint(columns: ['entity_id', 'locale'])]
#[ORM\Entity]
class DocumentTranslation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    #[Polyglot\Locale]
    private string $locale;

    #[ORM\ManyToOne(targetEntity: Document::class, inversedBy: 'translations')]
    private Document $entity;

    public function getLocale(): string
    {
        return $this->locale;
    }

    #[ORM\Column]
    private string $text;
}
