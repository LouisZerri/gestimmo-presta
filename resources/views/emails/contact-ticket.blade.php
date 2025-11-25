<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau ticket support</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    
    <div style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); padding: 30px; text-align: center; border-radius: 10px 10px 0 0;">
        <h1 style="color: white; margin: 0; font-size: 24px;">Nouveau Ticket Support</h1>
        <p style="color: #e0e7ff; margin: 10px 0 0 0; font-size: 14px;">{{ $ticketNumber }}</p>
    </div>

    <div style="background: #f9fafb; padding: 30px; border: 1px solid #e5e7eb; border-top: none;">
        
        <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #1e40af;">
            <h2 style="color: #1e40af; margin: 0 0 15px 0; font-size: 18px;">
                <span style="display: inline-block; width: 8px; height: 8px; background: #1e40af; border-radius: 50%; margin-right: 8px;"></span>
                Informations du ticket
            </h2>
            
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                        <strong style="color: #6b7280;">Type de demande:</strong>
                    </td>
                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; text-align: right;">
                        <span style="background: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                            {{ $data['type'] }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6;">
                        <strong style="color: #6b7280;">Email:</strong>
                    </td>
                    <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; text-align: right;">
                        <a href="mailto:{{ $data['email'] }}" style="color: #1e40af; text-decoration: none;">{{ $data['email'] }}</a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 0;">
                        <strong style="color: #6b7280;">Date:</strong>
                    </td>
                    <td style="padding: 10px 0; text-align: right; color: #6b7280;">
                        {{ now()->format('d/m/Y à H:i') }}
                    </td>
                </tr>
            </table>
        </div>

        <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="color: #1f2937; margin: 0 0 10px 0; font-size: 16px;">Sujet</h3>
            <p style="margin: 0; color: #374151; font-weight: 600;">{{ $data['subject'] }}</p>
        </div>

        <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="color: #1f2937; margin: 0 0 15px 0; font-size: 16px;">Description</h3>
            <div style="background: #f9fafb; padding: 15px; border-radius: 6px; border-left: 3px solid #1e40af;">
                <p style="margin: 0; color: #4b5563; white-space: pre-wrap; line-height: 1.6;">{{ $data['description'] }}</p>
            </div>
        </div>

        @if(!empty($attachmentPaths))
        <div style="background: white; padding: 20px; border-radius: 8px;">
            <h3 style="color: #1f2937; margin: 0 0 15px 0; font-size: 16px;">
                Pièces jointes ({{ count($attachmentPaths) }})
            </h3>
            <div style="background: #f9fafb; padding: 15px; border-radius: 6px;">
                @foreach($attachmentPaths as $index => $attachment)
                <div style="display: flex; align-items: center; padding: 8px 0; {{ $index < count($attachmentPaths) - 1 ? 'border-bottom: 1px solid #e5e7eb;' : '' }}">
                    <div style="width: 40px; height: 40px; background: #dbeafe; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                        @if(str_contains($attachment['mime'], 'image'))
                            <span style="font-size: 20px;">🖼️</span>
                        @elseif(str_contains($attachment['mime'], 'pdf'))
                            <span style="font-size: 20px;">📄</span>
                        @elseif(str_contains($attachment['mime'], 'word'))
                            <span style="font-size: 20px;">📝</span>
                        @else
                            <span style="font-size: 20px;">📎</span>
                        @endif
                    </div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; color: #1f2937; font-size: 14px;">{{ $attachment['original_name'] }}</div>
                        <div style="font-size: 12px; color: #6b7280;">{{ number_format($attachment['size'] / 1024, 2) }} KB</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    <div style="background: #f3f4f6; padding: 20px; text-align: center; border-radius: 0 0 10px 10px; border: 1px solid #e5e7eb; border-top: none;">
        <p style="margin: 0 0 10px 0; color: #6b7280; font-size: 13px;">
            <strong>Action requise:</strong> Répondre au client sous 24h ouvrées
        </p>
        <a href="mailto:{{ $data['email'] }}?subject=RE: {{ $ticketNumber }} - {{ $data['subject'] }}" 
           style="display: inline-block; background: #1e40af; color: white; padding: 12px 30px; text-decoration: none; border-radius: 6px; font-weight: 600; margin-top: 10px;">
            Répondre au client
        </a>
    </div>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #e5e7eb; text-align: center;">
        <p style="color: #9ca3af; font-size: 12px; margin: 0;">
            © {{ date('Y') }} GEST'IMMO - Tous droits réservés<br>
            Email généré automatiquement, ne pas répondre à cet email
        </p>
    </div>

</body>
</html>