<?php

namespace App\Helpers;

class HtmlSanitizer
{
    /**
     * Tags HTML autorisés pour le contenu des articles.
     */
    protected static array $allowedTags = [
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'p', 'br', 'hr',
        'strong', 'b', 'em', 'i', 'u', 's', 'small', 'mark', 'sub', 'sup',
        'ul', 'ol', 'li',
        'a', 'img',
        'blockquote', 'pre', 'code',
        'table', 'thead', 'tbody', 'tfoot', 'tr', 'th', 'td',
        'div', 'span',
        'figure', 'figcaption',
    ];

    /**
     * Attributs autorisés par tag.
     */
    protected static array $allowedAttributes = [
        'a' => ['href', 'title', 'target', 'rel'],
        'img' => ['src', 'alt', 'width', 'height', 'class', 'style'],
        'td' => ['colspan', 'rowspan'],
        'th' => ['colspan', 'rowspan'],
        '*' => ['class', 'id', 'style'],
    ];

    /**
     * Sanitise le HTML en supprimant les tags/attributs dangereux.
     */
    public static function clean(?string $html): string
    {
        if (empty($html)) {
            return '';
        }

        // Supprimer les tags script, iframe, object, embed, form, input
        $html = preg_replace('/<\s*(script|iframe|object|embed|form|input|textarea|button|select|link|meta|style)\b[^>]*>.*?<\s*\/\s*\1\s*>/si', '', $html);
        $html = preg_replace('/<\s*(script|iframe|object|embed|form|input|textarea|button|select|link|meta|style)\b[^>]*\/?>/si', '', $html);

        // Supprimer les attributs on* (onclick, onerror, onload, etc.)
        $html = preg_replace('/\s+on\w+\s*=\s*(["\']).*?\1/si', '', $html);
        $html = preg_replace('/\s+on\w+\s*=\s*[^\s>]*/si', '', $html);

        // Supprimer javascript: dans les href/src
        $html = preg_replace('/\b(href|src)\s*=\s*(["\'])\s*javascript\s*:.*?\2/si', '$1=$2#$2', $html);

        // Supprimer data: dans les src (sauf data:image)
        $html = preg_replace('/\bsrc\s*=\s*(["\'])\s*data\s*:(?!image\/).*?\1/si', 'src=$1#$1', $html);

        return $html;
    }
}
