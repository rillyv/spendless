<?php

namespace App\Controller;

use App\Entity\Entry;
use App\Enum\EntryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EntryController extends AbstractController
{
    #[Route('/entry', name: 'create_entry', methods: ['POST'])]
    public function createEntry(EntityManagerInterface $entityManager): Response
    {
        $entry = new Entry();
        $entry->setType(EntryType::INCOME);
        $entry->setDescription('description');
        $entry->setAmount(10.12);
        $entry->setCreatedAt(new \DateTimeImmutable());

        $entityManager->persist($entry);
        $entityManager->flush();

        return $this->json(['id' => $entry->getId()]);
    }
}
