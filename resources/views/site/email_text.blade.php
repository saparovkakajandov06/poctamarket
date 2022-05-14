<!-- Message from: {{ $data['name'] }} {{ $data['email'] }} <br>
Message: {{ $data['text'] }} -->

<div>
	<h1>{{ $data['name'] }}</h1>
	<a href="mailto:{{$data['email']}}">{{$data['email']}}</a>
	<br>
	<p style="padding-top: 20px">{{$data['text']}}</p>
</div>