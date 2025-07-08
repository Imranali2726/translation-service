<?php
namespace App\Interfaces;

interface TranslationRepositoryInterface
{
    public function getAll(array $filters); // Fetch translations based on filters
    public function create(array $data); // Create a new translation
    public function update(int $id, array $data); // Update an existing translation
    public function exportByLocale(string $locale): array; // Export translations for a specific locale
}

