<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>

</head>

<style>
    body{
        margin: 0;
        padding: 0;
        background-color: orange;
    }
    h2{
        font-size: 5rem;
        border: 2px solid green;
        background-color: lightgreen;
        text-align: center;
        margin-right: 350px;
        margin-left: 350px;
        border-radius: 20px;
        color: #333;
    }
    .main-div{
        /* border: 5px solid crimson; */
        border-radius: 10px;
        display: flex;
        justify-content: center;
        padding: 20px;
    }
    table{
        border: 5px solid black;
        background-color: blue;
        border-radius: 20px;
        box-shadow: 7px 7px black;
    }
    tr th{
        border: 3px solid blue;
        font-size: 3rem;
        background-color: lightgreen;
        border-radius: 10px;
    }
    tr td{
        border: 3px solid blue;
        font-size: 3rem;
        background-color: lightgreen;
        border-radius: 10px;
    }
    @media (max-width: 1154px){
        h2{
            font-size: 3rem;
            margin-right: 50px;
            margin-left: 50px;
        }
    }
    @media (max-width: 671px){
        tr th{
            font-size: 1rem;
        }
        tr td{
            font-size: 1rem;
        }
    }
    @media (max-width: 366px){
        h2{
            margin-right: 2px;
            margin-left: 2px;
            font-size: 1rem;
        }
    }
    @media (max-width: 283px){
        tr th{
            font-size: 0.7rem;
        }
        tr td{
            font-size: 0.7rem;
        }
    }
</style>

<body>

<?php
  include 'buttons.php';
?>
<h2>Transaction History</h2>
<div class="main-div">
    <table>
        <thead>
            <tr>
                <th>S.no.</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
           </tr>
        </thead>
        <tbody>
        <?php
            include 'configuration.php';
            $sql ="select * from transaction";
            $query =mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_assoc($query))
            {
        ?>
        <tr>
            <td><?php echo $rows['sno']; ?></td>
            <td><?php echo $rows['sender']; ?></td>
            <td><?php echo $rows['receiver']; ?></td>
            <td><?php echo $rows['balance']; ?> </td>
        
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>