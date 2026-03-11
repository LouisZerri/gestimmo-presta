<h2>Demande de tarifs</h2>

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
    @if(!empty($data['type_service']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Service</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['type_service'] }}</td>
    </tr>
    @endif
    @if(!empty($data['message']))
    <tr>
        <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Message</td>
        <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $data['message'] }}</td>
    </tr>
    @endif
</table>
