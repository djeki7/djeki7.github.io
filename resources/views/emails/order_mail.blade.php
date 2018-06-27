<h2> Новый заказ от {{$data['client_name']}} {{$data['client_family']}}</h2>
<h3> организация: {{$data['client_company']}}</h3>
<h3> email: {{$data['client_email']}}</h3>
<h3> тел: {{$data['client_phone']}}</h3>

@if ($data['new_or_has'] == 'Заказать новый сайт')
    <h3>Заказ на новый сайт: {{$data['new_site']}}</h3>
@else
    <h3>Заказ на - {{$data['has_site']}}: {{$data['client_site']}}</h3>
@endif
