<!DOCTYPE html>
<html>
<head>
    <title>XSS Attack - Unsafe page (POST)</title>
</head>
<body bgcolor="#ff4d4d">
    <h3>XSS attack con POST (sito vittima)</h3><br>
    Nulla semper tellus vitae iaculis dapibus. Vestibulum gravida accumsan nisi, id consectetur ligula posuere et. Praesent ut fringilla nunc. Sed urna leo, suscipit sed orci a, tincidunt dapibus nunc. Quisque blandit arcu et odio commodo, volutpat blandit lacus molestie. Donec ut sagittis enim. Nam fermentum condimentum elit sed sollicitudin. Sed euismod est nec purus sagittis, ut accumsan urna tincidunt. Fusce dui odio, convallis sit amet egestas at, dignissim ut leo. Integer vitae aliquam dolor. Sed elementum tincidunt urna, ac convallis quam porttitor rhoncus. Donec consequat arcu quis nulla imperdiet feugiat.<br>


    <form method="POST" action="http://127.0.0.1/esempio21_5_XSS_Attack_POST_SitoVittima.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="" />
        <input type="submit" value="Invia" />
    </form>

</body>
</html>
