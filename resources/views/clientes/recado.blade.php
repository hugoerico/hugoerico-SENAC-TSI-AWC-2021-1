<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recado</title>
</head>
<body>
<div style="text-align: center;">
<canvas id="myCanvas" width="200" height="100" style="border:1px solid #d3d3d3;" >
Your browser does not support the HTML canvas tag.</canvas>
</div>

<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.font = "30px Arial";
ctx.strokeText("OI",80,50);
</script>
</body>
</html>