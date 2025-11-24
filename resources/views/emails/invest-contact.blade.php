<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle demande d'investissement</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f5;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f4f5; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    
                    {{-- Header --}}
                    <tr>
                        <td style="background-color: #0054a6; padding: 30px 40px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: bold;">
                                🏠 GEST'IMMO
                            </h1>
                            <p style="color: #93c5fd; margin: 10px 0 0 0; font-size: 14px;">
                                Nouvelle demande d'investissement
                            </p>
                        </td>
                    </tr>

                    {{-- Contenu --}}
                    <tr>
                        <td style="padding: 40px;">
                            
                            {{-- Alerte --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #dbeafe; border-radius: 12px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <p style="margin: 0; color: #1e40af; font-weight: bold; font-size: 16px;">
                                            📩 Un nouveau prospect souhaite investir !
                                        </p>
                                        <p style="margin: 10px 0 0 0; color: #3b82f6; font-size: 14px;">
                                            Reçu le {{ now()->format('d/m/Y à H:i') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Informations contact --}}
                            <h2 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb;">
                                👤 Informations du contact
                            </h2>
                            
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
                                <tr>
                                    <td width="140" style="padding: 10px 0; color: #6b7280; font-size: 14px;">Nom :</td>
                                    <td style="padding: 10px 0; color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['nom'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; color: #6b7280; font-size: 14px;">Prénom :</td>
                                    <td style="padding: 10px 0; color: #1f2937; font-weight: bold; font-size: 14px;">{{ $data['prenom'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; color: #6b7280; font-size: 14px;">Email :</td>
                                    <td style="padding: 10px 0;">
                                        <a href="mailto:{{ $data['email'] }}" style="color: #0054a6; font-weight: bold; font-size: 14px; text-decoration: none;">
                                            {{ $data['email'] }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; color: #6b7280; font-size: 14px;">Téléphone :</td>
                                    <td style="padding: 10px 0;">
                                        <a href="tel:{{ $data['telephone'] }}" style="color: #0054a6; font-weight: bold; font-size: 14px; text-decoration: none;">
                                            {{ $data['telephone'] }}
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            {{-- Détails du projet --}}
                            <h2 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb;">
                                🎯 Détails du projet
                            </h2>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
                                <tr>
                                    <td width="140" style="padding: 10px 0; color: #6b7280; font-size: 14px;">Type de bien :</td>
                                    <td style="padding: 10px 0;">
                                        <span style="background-color: #0054a6; color: #ffffff; padding: 5px 15px; border-radius: 20px; font-size: 13px; font-weight: bold;">
                                            {{ $data['type_bien'] ?: 'Non précisé' }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            {{-- Message --}}
                            @if(!empty($data['message']))
                                <h2 style="color: #1f2937; font-size: 18px; margin: 0 0 20px 0; padding-bottom: 10px; border-bottom: 2px solid #e5e7eb;">
                                    💬 Message
                                </h2>
                                <div style="background-color: #f9fafb; border-left: 4px solid #0054a6; padding: 20px; border-radius: 0 8px 8px 0; margin-bottom: 30px;">
                                    <p style="margin: 0; color: #374151; font-size: 14px; line-height: 1.6; white-space: pre-wrap;">{{ $data['message'] }}</p>
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