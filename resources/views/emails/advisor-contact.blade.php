<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle demande de contact</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #1e40af; border-bottom: 2px solid #1e40af; padding-bottom: 10px;">
            Nouvelle demande de contact - Conseillers
        </h2>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold; width: 150px;">Nom :</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['nom'] }}</td>
            </tr>
            @if($data['prenom'])
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Prénom :</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['prenom'] }}</td>
            </tr>
            @endif
            @if($data['telephone'])
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Téléphone :</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['telephone'] }}</td>
            </tr>
            @endif
            @if($data['email'])
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Email :</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['email'] }}</td>
            </tr>
            @endif
            @if($data['localisation'])
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Localisation :</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['localisation'] }}</td>
            </tr>
            @endif
        </table>

        @if($data['message'])
        <div style="margin-top: 20px;">
            <h3 style="color: #1e40af;">Message :</h3>
            <p style="background: #f8fafc; padding: 15px; border-radius: 8px; border-left: 4px solid #1e40af;">
                {{ $data['message'] }}
            </p>
        </div>
        @endif

        <p style="margin-top: 30px; font-size: 12px; color: #666;">
            Message envoyé depuis la page Conseillers de GEST'IMMO
        </p>
    </div>
</body>
</html>