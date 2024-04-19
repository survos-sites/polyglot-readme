<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Webfactory\Bundle\PolyglotBundle\Attribute as Polyglot;
use Webfactory\Bundle\PolyglotBundle\TranslatableInterface;

#[Polyglot\Locale(primary: "en_GB")]
#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[Polyglot\TranslationCollection]
    #[ORM\OneToMany(targetEntity: DocumentTranslation::class, mappedBy: 'entity')]
    private Collection $translations;

    /**
     * @var TranslatableInterface<string>
     */
    #[Polyglot\Translatable]
    #[ORM\Column(type: 'translatable_string')]
    private TranslatableInterface $text;

    public function __construct()
    {
        // ...
        $this->translations = new ArrayCollection();
    }

    public function getText(): string
    {
        return $this->text->translate();
    }
}
