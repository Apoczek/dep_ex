<div {{ $attributes->merge(['class' => 'text-xl']) }}>
    <h1>{{ $info }}</h1>
    <h2>{{ $title }}</h2>
    Hello from sidebar component

    <ul>
        @foreach($list('another') as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    {{ $slot }}

</div>
