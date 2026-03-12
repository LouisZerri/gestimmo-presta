<?php

use Illuminate\Support\Facades\Schedule;

// Génération automatique d'un article IA chaque semaine (lundi 9h)
Schedule::command('articles:generate --publish --with-image')
    ->weeklyOn(1, '09:00')
    ->withoutOverlapping();
