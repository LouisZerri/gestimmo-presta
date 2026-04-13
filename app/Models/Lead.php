<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $connection = 'leads_immo';

    protected $fillable = [
        'page_source',
        'code_postal',
        'selection',
        'budget_investissement',
        'prenom',
        'telephone',
        'email',
        'consentement_rgpd',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'ip_address',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'consentement_rgpd' => 'boolean',
        ];
    }

    public function scopeByPage($query, string $page)
    {
        return $query->where('page_source', $page);
    }

    public function scopeByStatut($query, string $statut)
    {
        return $query->where('statut', $statut);
    }
}
