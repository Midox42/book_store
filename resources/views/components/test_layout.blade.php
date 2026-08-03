
@props(['title' => 'Default Title'])

<!DOCTYPE html>
<html lang="en">
    
<head> 

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

</head>

<body> 
    <nav>
        <a href="/index">Home</a>
        <a href="/about">About</a>    
        <a href="/contact">Contact</a>
    </nav>

    <main>
        {{ $slot }} 
    </main>
</body>
</html>