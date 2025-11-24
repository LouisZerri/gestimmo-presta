<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle demande d'estimation</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f5;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f4f5; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    
                    {{-- Header --}}
                    <tr>
                        <td style="background-color: #eab308; padding: 30px 40px; text-align: center;">
                            <h1 style="color: #1f2937; margin: 0; font-size: 24px; font-weight: bold;">
                                🏡 GEST'IMMO
                            </h1>
                            <p style="color: #78716c; margin: 10px 0 0 0; font-size: 14px;">
                                Nouvelle demande d'estimation
                            </p>
                        </td>
                    </tr>

                    {{-- Contenu --}}
                    <tr>
                        <td style="padding: 40px;">
                            
                            {{-- Alerte --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #fef3c7; border-radius: 12px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <p style="margin: 0; color: #92400e; font-weight: bold; font-size: 16px;">
                                            📍 Un propriétaire souhaite estimer son bien !
                                        </p>
                                        <p style="margin: 10px 0 0 0; color: #b45309; font-size: 14px;">
                                            Reçu le {{ now()->format('d/m/Y à H:i') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Adresse du bien (mise en avant) --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #0054a6; border-radius: 12px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 25px;">
                                        <p style="margin: 0 0 5px 0; color: #93c5fd; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Adresse du bien</p>
                                        <p style="margin: 0; color: #ffffff; font-size: 18px; font-weight: bold;">
                                            {{ $data['adresse_bien'] }}
                                        </p>
                                        <p style="margin: 5px 0 0 0; color: #bfdbfe; font-size: 16px;">
                                            {{ $data['code_postal'] }} {{ $data['ville'] }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Informations contact --}}
                            <h2 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb;">
                                👤 Contact
                            </h2>
                            
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
                                <tr>
                                    <td width="140" style="padding: 8px 0; color: #6b7280; font-size: 14px;">Nom :</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['nom'] }} {{ $data['prenom'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; font-size: 14px;">Email :</td>
                                    <td style="padding: 8px 0;">
                                        <a href="mailto:{{ $data['email'] }}" style="color: #0054a6; font-weight: bold; font-size: 14px; text-decoration: none;">{{ $data['email'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; font-size: 14px;">Téléphone :</td>
                                    <td style="padding: 8px 0;">
                                        <a href="tel:{{ $data['telephone'] }}" style="color: #0054a6; font-weight: bold; font-size: 14px; text-decoration: none;">{{ $data['telephone'] }}</a>
                                    </td>
                                </tr>
                            </table>

                            {{-- Caractéristiques du bien --}}
                            <h2 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb;">
                                🏠 Caractéristiques du bien
                            </h2>

                            @php
                                $typeBienLabels = [
                                    'appartement' => 'Appartement',
                                    'maison' => 'Maison',
                                    'immeuble' => 'Immeuble',
                                    'terrain' => 'Terrain',
                                    'local_commercial' => 'Local commercial',
                                    'parking' => 'Parking / Box',
                                ];
                                $etatLabels = [
                                    'neuf' => 'Neuf',
                                    'tres_bon' => 'Très bon état',
                                    'bon' => 'Bon état',
                                    'a_rafraichir' => 'À rafraîchir',
                                    'a_renover' => 'À rénover',
                                ];
                            @endphp

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
                                <tr>
                                    <td width="50%" style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">Type de bien</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $typeBienLabels[$data['type_bien']] ?? $data['type_bien'] }}</span>
                                    </td>
                                    <td width="50%" style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">Surface</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['surface'] }} m²</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">Nombre de pièces</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['nb_pieces'] }} pièce(s)</span>
                                    </td>
                                    <td style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">Chambres</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['nb_chambres'] ?? 'Non précisé' }}</span>
                                    </td>
                                </tr>
                                @if($data['type_bien'] === 'appartement')
                                <tr>
                                    <td style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">Étage</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['etage'] ?? 'Non précisé' }}</span>
                                    </td>
                                    <td style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">Étages immeuble</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['nb_etages_immeuble'] ?? 'Non précisé' }}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">Année construction</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['annee_construction'] ?? 'Non précisée' }}</span>
                                    </td>
                                    <td style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">État général</span>
                                        <span style="color: #1f2937; font-weight: bold; font-size: 14px;">{{ $etatLabels[$data['etat_general']] ?? $data['etat_general'] }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 8px 0; vertical-align: top;">
                                        <span style="color: #6b7280; font-size: 12px; display: block;">DPE</span>
                                        @if(!empty($data['dpe']) && $data['dpe'] !== 'non_communique')
                                            <span style="display: inline-block; background-color: #0054a6; color: #ffffff; padding: 4px 12px; border-radius: 4px; font-weight: bold; font-size: 14px;">{{ $data['dpe'] }}</span>
                                        @else
                                            <span style="color: #1f2937; font-size: 14px;">Non communiqué</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            {{-- Équipements --}}
                            <div style="background-color: #f9fafb; border-radius: 8px; padding: 15px; margin-bottom: 30px;">
                                <span style="color: #6b7280; font-size: 12px; display: block; margin-bottom: 10px;">Équipements</span>
                                @php
                                    $equipements = [];
                                    if(!empty($data['cave'])) $equipements[] = '🗄️ Cave';
                                    if(!empty($data['parking'])) $equipements[] = '🚗 Parking';
                                    if(!empty($data['balcon_terrasse'])) $equipements[] = '🌿 Balcon/Terrasse';
                                    if(!empty($data['jardin'])) $equipements[] = '🌳 Jardin';
                                    if(!empty($data['ascenseur'])) $equipements[] = '🛗 Ascenseur';
                                    if(!empty($data['gardien'])) $equipements[] = '👤 Gardien';
                                @endphp
                                @if(count($equipements) > 0)
                                    <span style="color: #1f2937; font-size: 14px;">{{ implode(' • ', $equipements) }}</span>
                                @else
                                    <span style="color: #9ca3af; font-size: 14px;">Aucun équipement renseigné</span>
                                @endif
                            </div>

                            {{-- Situation --}}
                            <h2 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb;">
                                📋 Situation du vendeur
                            </h2>

                            @php
                                $situationLabels = [
                                    'proprietaire_occupant' => 'Propriétaire occupant',
                                    'proprietaire_bailleur' => 'Propriétaire bailleur',
                                    'heritier' => 'Héritier / Succession',
                                    'autre' => 'Autre',
                                ];
                                $projetLabels = [
                                    'moins_3_mois' => 'Moins de 3 mois',
                                    '3_6_mois' => '3 à 6 mois',
                                    '6_12_mois' => '6 à 12 mois',
                                    'plus_12_mois' => 'Plus de 12 mois',
                                    'simple_estimation' => 'Simple estimation',
                                ];
                            @endphp

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
                                <tr>
                                    <td width="140" style="padding: 8px 0; color: #6b7280; font-size: 14px;">Situation :</td>
                                    <td style="padding: 8px 0; color: #1f2937; font-weight: bold; font-size: 14px;">{{ $situationLabels[$data['situation']] ?? $data['situation'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #6b7280; font-size: 14px;">Horizon de vente :</td>
                                    <td style="padding: 8px 0;">
                                        <span style="display: inline-block; background-color: #eab308; color: #1f2937; padding: 4px 12px; border-radius: 20px; font-weight: bold; font-size: 13px;">
                                            {{ $projetLabels[$data['projet_vente']] ?? $data['projet_vente'] }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            {{-- Commentaires --}}
                            @if(!empty($data['commentaires']))
                                <h2 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb;">
                                    💬 Commentaires
                                </h2>
                                <div style="background-color: #f9fafb; border-left: 4px solid #eab308; padding: 20px; border-radius: 0 8px 8px 0; margin-bottom: 30px;">
                                    <p style="margin: 0; color: #374151; font-size: 14px; line-height: 1.6; white-space: pre-wrap;">{{ $data['commentaires'] }}</p>
                                </div>
                            @endif

                            {{-- Boutons d'action --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding-top: 20px;">
                                        <a href="mailto:{{ $data['email'] }}" style="display: inline-block; background-color: #0054a6; color: #ffffff; padding: 14px 30px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; margin-right: 10px;">
                                            ✉️ Répondre par email
                                        </a>
                                        <a href="tel:{{ $data['telephone'] }}" style="display: inline-block; background-color: #10b981; color: #ffffff; padding: 14px 30px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px;">
                                            📞 Appeler
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color: #f9fafb; padding: 25px 40px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="margin: 0; color: #9ca3af; font-size: 12px;">
                                Cet email a été envoyé automatiquement depuis le site GEST'IMMO.<br>
                                © {{ date('Y') }} GEST'IMMO - Tous droits réservés
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>