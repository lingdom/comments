<html>
    <head>
        <title>Comments</title>
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/css/comment.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' }
    	</script>
    </head>
    <body>
        <div class="container" id="app">
            <div class="comments">
                <post></post>
                <post-list></post-list>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>