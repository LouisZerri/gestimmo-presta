<h2>Nouvelle demande - Investissement Neuf</h2>

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
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Ville souhaitée</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['ville_souhaitee'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Budget</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['budget'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Type d'investissement</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['type_investissement'] }}</td>
    </tr>
    @if(!empty($data['residences']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Résidences</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ implode(', ', $data['residences']) }}</td>
    </tr>
    @endif
    @if(!empty($data['message']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Message</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['message'] }}</td>
    </tr>
    @endif
</table>
