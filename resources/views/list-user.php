<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello guys !</h1>
    <table border=1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
             <?php
                foreach($usersView as $user){
                    echo '<tr>
                            <td>'.$user['id'].'</td>
                            <td>'.$user['name'].'</td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
   
</body>
</html>