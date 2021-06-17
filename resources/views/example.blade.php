<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Components in Laravel</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col items-center">
<x-sidebar title="My sidebar" :info="$info" class="bg-gray-500">

    <x-slot name="title">Sidebar cooler title</x-slot>

    <div>Additional content</div>

    </x-sidebar>

    <x-navigation />

    <x-partials.subview />
</body>
</html>
