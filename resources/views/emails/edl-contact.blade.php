<h2>Nouvelle demande d'état des lieux</h2>

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
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Adresse du bien</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['adresse_bien'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Type de bien</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['type_bien'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Type d'EDL</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['type_edl'] }}</td>
    </tr>
    @if(!empty($data['date_souhaitee']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Date souhaitée</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['date_souhaitee'] }}</td>
    </tr>
    @endif
    @if(!empty($data['message']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Message</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['message'] }}</td>
    </tr>
    @endif
</table>
