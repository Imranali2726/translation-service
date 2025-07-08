<?php
// app/Repositories/TranslationRepository.php
namespace App\Repositories;

use App\Models\Translation;
use App\Interfaces\TranslationRepositoryInterface;

class TranslationRepository implements TranslationRepositoryInterface
{
    public function getAll(array $filters)
    {
        return Translation::when($filters['locale'] ?? null, fn($q, $val) => $q->where('locale', $val))
            ->when($filters['tag'] ?? null, fn($q, $val) => $q->where('tag', $val))
            ->when($filters['key'] ?? null, fn($q, $val) => $q->where('key', 'like', "%$val%"))
            ->paginate(50); // Paginate results to handle large datasets
    }

    public function create(array $data)
    {
        return Translation::create($data);
    }

    public function update(int $id, array $data)
    {
        $translation = Translation::findOrFail($id);
        $translation->update($data);
        return $translation;
    }

    public function exportByLocale(string $locale): array
    {
        return Translation::where('locale', $locale)->pluck('value', 'key')->toArray(); // Export translations by locale
    }
}

?>
