<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>

    <style>
        body{
            background-color: #333;
        }
        .container{
            border: 4px solid #333;
            margin-top: 10px;
            background-color: cyan;
        }
        .container h2{
            font-size: 5rem;
            text-align: center;
            color: blue;
            background-color: cyan;
        }
        .first{
            /* border: 3px solid black; */
            display: flex;
            justify-content: center;
            padding: 10px;
        }
        table{
            border: 5px solid crimson;
            border-radius: 5px;
            background-color: pink;
        }
        thead{
            border: 3px solid red;
        }
        .text{
            font-size: 3rem;
            border: 3px solid darkblue;
            border-radius: 8px;
            color: blue;
            background-color: pink;
        }
        .py{
            font-size: 2.3rem;
            font-weight: bold;
            border: 2px solid crimson;
            border-radius: 5px;
            color: green;
            background-color: #fff;
        }
        .btn{
            font-size: 3rem;
            font-weight: bold;
            border-radius: 15px;
            transition: 0.2s;
        }
        .btn:hover{
            cursor: pointer;
            color: white;
            background-color: #333;
        }
        @media (max-width: 1061px){
            .text{
                font-size: 2rem;
            }
            .py{
                font-size: 2rem;
            }
            .btn{
                font-size: 2rem;
            }
        }
        @media (max-width: 858px){
            .text{
                font-size: 1rem;
            }
            .py{
                font-size: 1rem;
            }
            .btn{
                font-size: 1rem;
            }
        }
        @media (max-width: 463px){
            .text{
                font-size: 0.5rem;
            }
            .py{
                font-size: 0.5rem;
            }
            .btn{
                font-size: 0.8rem;
            }
        }
        @media (max-width: 310px){
            .container h2{
                font-size: 4rem;
            }
        }
    </style>

</head>

<body>
<?php
    include 'configuration.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>

<?php
  include 'buttons.php';
?>

<div class="container">
    <h2>Transfer Money</h2>
        <div class="first">
            <table class="table">
                <thead>
                    <tr>
                    <th class="text">Id</th>
                    <th class="text">Name</th>
                    <th class="text">E-Mail</th>
                    <th class="text">Balance</th>
                    <th class="text">Operation</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td class="py"><?php echo $rows['sno'] ?></td>
                    <td class="py"><?php echo $rows['name']?></td>
                    <td class="py"><?php echo $rows['email']?></td>
                    <td class="py"><?php echo $rows['balance']?></td>
                    <td><a href="singleuser.php?id= <?php echo $rows['sno'] ;?>"><button type="button" class="btn">Transact</button></a></td> 
                </tr>
                <?php
                    }
                ?>
            
                </tbody>
            </table>
        </div> 
    </div>

    <?php
        include 'footer.php';
    ?>

</body>
</html>