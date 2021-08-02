<?php

$name = "aj <script>alert('ss');</script>";

$langs = ['PHP', 'Python', 'Java', 'Rust', 'Go', 'Ruby & Rails'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="">

    <input type="text" name="<?php echo htmlspecialchars($name); ?>" id="" value="<?php echo htmlspecialchars($name); ?>">

    <ul>
        <?php 
         foreach($langs as $lang):
            $classLang = strtolower(str_replace(' ', '-', str_replace('&', 'and', $lang)));
        ?>
        <li class="<?php echo htmlspecialchars( $classLang ) ?>"><?php echo htmlspecialchars($lang) ?></li>
        <?php endforeach; ?>

        <h1>
           Your name is: <?php  echo isset($_GET['name']) ? $_GET['name'] : 'No name'  ?>
        </h1>
       
    </ul>
</form>
</body>
</html>