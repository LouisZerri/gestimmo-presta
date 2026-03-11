<h2>Nouvelle demande d'estimation (Page Vendre)</h2>

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
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Adresse</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['adresse'] }}, {{ $data['ville'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Type de bien</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['type_bien'] }}</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Surface</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['surface'] }} m²</td>
    </tr>
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Nombre de pièces</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['nb_pieces'] }}</td>
    </tr>
</table>
