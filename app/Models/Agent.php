<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    // Connexion à la base externe mini_sites
    protected $connection = 'mini_sites';
    
    protected $table = 'agents';

    protected $casts = [
        'reseaux_sociaux' => 'array',
        'disponible' => 'boolean',
        'actif' => 'boolean',
    ];

    /**
     * URL du mini-site
     */
    public function getUrlAttribute(): string
    {
        return 'https://' . $this->slug . '.gestimmo-conseillers.fr';
    }

    /**
     * URL de la photo (hébergée sur gestimmo-conseillers.fr)
     */
    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->photo) {
            return null;
        }
        
        return 'https://gestimmo-conseillers.fr/storage/' . $this->photo;
    }
}