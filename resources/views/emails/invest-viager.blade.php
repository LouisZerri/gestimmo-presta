<h2>Nouvelle demande - Viager</h2>

<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Nom</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['nom'] }} {{ $data['prenom'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Email</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['email'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Téléphone</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['telephone'] }}</td>
    </tr>
    @if(!empty($data['tranche_age']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Tranche d'âge</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['tranche_age'] }}</td>
    </tr>
    @endif
    @if(!empty($data['type_bien']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Type de bien</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['type_bien'] }}</td>
    </tr>
    @endif
    @if(!empty($data['objectifs']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Objectifs</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ implode(', ', $data['objectifs']) }}</td>
    </tr>
    @endif
    @if(!empty($data['message']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Message</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['message'] }}</td>
    </tr>
    @endif
</table>
