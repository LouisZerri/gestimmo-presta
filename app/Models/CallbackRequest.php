<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallbackRequest extends Model
{
    protected $connection = 'leads_immo';

    protected $fillable = [
        'page_source',
        'contact',
        'statut',
        'ip_address',
    ];

    public function scopeByStatut($query, string $statut)
    {
        return $query->where('statut', $statut);
    }
}
