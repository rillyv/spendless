<?php

namespace App\Message;

class EntryCreated
{
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly float $amount,
        public readonly string $currency,
        public readonly string $description,
        public readonly \DateTimeImmutable $createdAt,
    ) {}
}
