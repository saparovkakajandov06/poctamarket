

<h1>Turkmenpost Market</h1>

<table border="1">
	<tbody>
		<tr>
			<th>Sene</th>
			<td>{{$data->created_at}}</td>
		</tr>
		<tr>
			<th>BUÝURMA</th>
			<td>#{{$data->id}}</td>
		</tr>
		<tr>
			<th>TÖLEG</th>
			<td>
			@switch($data->paymenttype)
				@case(0)
					Nagt töleg
					@break
				@case(1)
					Onlaýn töleg
					@break

				@case(2)
					Altyn Asyr kart töleg
					@break
				@case(3)
					Nagt däl töleg
					@break
			@endswitch
			</td>
		</tr>
		<tr>
			<th>ELTIP BERME</th>
			<td>{{ $data->delivery == 0 ? 'Kurýer' : 'Özüň alyp gaýtmak'  }}</td>
		</tr>
	</tbody>
	<br>
	<br>
	<br>

	<table border="1">
		<thead>
			<th>SATYJY</th>
			<th>TÖLEÝJI</th>
			<th>ELTILMELI ÝERI</th>
		</thead>
		<tbody>
			<tr>
				<td>PAK "Türkmenpoçta"</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Mäti Kösäýew köçesi,16 Aşgabat, Ahal 744000 Türkmenistan 993 12 930936 post.market@online.tm turkmenpost.gov.tm		</td>
				<td>@if($user != null){{ $user->name }} {{$user->surname}} <br>
						@isset(json_decode($user->address)->region)
							{{ json_decode($user->address)->region }} wel., 
						@endisset
						@isset(json_decode($user->address)->city)
							{{ json_decode($user->address)->city }} ş.,  
						@endisset
						@isset(json_decode($user->address)->street)
							{{ json_decode($user->address)->street }}, 
						@endisset
						@isset(json_decode($user->address)->house)
							{{ json_decode($user->address)->house }}, 
						@endisset
						@isset(json_decode($user->address)->apartment)
							{{ json_decode($user->address)->apartment }}, 
						@endisset
						@isset(json_decode($user->address)->korpus)
							{{ json_decode($user->address)->korpus }}, 
						@endisset
						{{ $user->phone }}
					@else 
						{{ $data->user_name }} {{ $data->user_surname }}, 
						
						+993 {{ $data->user_phone }}
					@endif 
				</td>
				<td>@if($user != null){{ $user->name }} {{$user->surname}} <br>
						+993 {{ $user->phone }}
					@else 
						{{ $data->user_name }} {{ $data->user_surname }}, 
						+993 {{ $data->user_phone }}
					@endif 

						{{ json_decode($data->address)->region }} wel., 
							{{ json_decode($data->address)->city }} ş.,  
							{{ json_decode($data->address)->street }}, 
							{{ json_decode($data->address)->house }}, 
						@isset(json_decode($data->address)->apartment)
							{{ json_decode($data->address)->apartment }}, 
						@endisset
						@isset(json_decode($data->address)->korpus)
							{{ json_decode($data->address)->korpus }}, 
						@endisset

				</td>
			</tr>
		</tbody>
	</table>

	
	
</table>



<br>
<br>
<br>

<table border="1">
	<tr>
		<th>Haryt</th>
		<th>Mukdary</th>
		<th>Bahasy</th>
		<th>Eglişik</th>
		<th>Salgyt</th>
		<th>Doly bahasy</th>
	</tr>
	@foreach(json_decode($data->products) as $prod)
		<tr>
			<td>
				<span style="text-transfrom:uppertext;font-weight:bold">{{ $prod->name_tk }}</span> <br>
				<span>Artikul: {{ $prod->code }}</span>
				<span class="font-weight-bold">Reňki: </span>{{ $prod->color_tk }} <br>
				<span class="font-weight-bold">Ölçegi: </span>{{ $prod->size }}
			</td>
			<td>{{ $prod->amount }}</td>
			<td>{{ number_format($prod->price,2,'.','') }} TMT</td>
			<td></td>
			<td></td>
			<td>{{ number_format($prod->price * $prod->amount,2,'.','') }} TMT</td>
		</tr>
	@endforeach




</table>

<br><br>
	<hr>
<br><br>

<table>
	<tr>
		<td>Jemi bahasy:</td>
		<td></td>
		<td>{{ number_format($data->total_price - $data->delivery_sum,2,'.','') }} TMT</td>
	</tr>
	<tr>
		<td>Eltip berme:</td>
		<td></td>
		<td>{{ $data->delivery_sum }} TMT</td>
	</tr>
	<tr>
		<td>Goşmaça töleg:</td>
		<td></td>
		<td>0 TMT</td>
	</tr>
	<tr>
		<td>JEMI:</td>
		<td></td>
		<td>{{ number_format($data->total_price,2,'.','') }} TMT</td>
	</tr>
</table>