<!DOCTYPE html>

<title>My post</title>
<link rel="stylesheet" href="/app.css">

<body>
    <!-- Using the default slot -->
    {{ $slot }}
    <!-- Using user defined slots  -->
    {{ $content ?? ''}}
</body>