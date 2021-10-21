<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>

</head>

<style>
    .main-div{
        border: 5px solid darkblue;
        box-shadow: 0 0 4px 4px yellow;
        margin-top: 10px;
        background: linear-gradient(
        to right,
        /* rgb(83, 83, 209),
        rgb(90, 184, 184) */
        blue,
        cyan
        );
    }
    .main-div h2{
        font-size: 6rem;
        text-shadow: 4px 4px green;
        text-align: center;
        font-weight: bold;
        color: white;
    }
    form{
        border: 1px solid red;
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    form tr th{
        font-size: 3rem;
        border: 3px solid green;
        color: green;
        background-color: yellow;
    }
    form td{
        border: 3px solid green;
        font-size: 3rem;
        color: green;
        background-color: yellow;
    }
    .label1{
        margin-top: 40px;
        margin-bottom: 20px;
        border-radius: 14px;
        margin-right: 34rem;
        margin-left: 34rem;
        background-color: orange;
        color: white;
        font-size: 4rem;
    }
    .form-control{
        font-size: 1.5rem;
        margin-right: 300px;
        margin-left: 300px;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 20px;
        padding: 10px;
    }
    .label2{
        font-size: 3.4rem;
        color: white;
        background-color: orange;
        margin-right: 590px;
        margin-left: 590px;
        border-radius: 20px;
        margin-top: 30px;
    }
    .btn-class button{
        font-size: 2rem;
        padding: 10px;
        margin: 20px;
        border-radius: 16px;
        box-shadow: 4px 4px #333;
        border: 2px solid black;
        transition: 0.2s;
    }
    .btn-class button:hover{
        color: white;
        background-color: green;
        cursor: pointer;
    }
</style>

<body>
 
<?php
  include 'buttons.php';
?>

	<div class="main-div">
        <h2>Transaction</h2>
            <?php
                include 'configuration.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where sno=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit">
                    <table class="table table-striped table-condensed table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Balance</th>
                        </tr>
                        <tr style="color : black;">
                            <td><?php echo $rows['sno'] ?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['balance'] ?></td>
                        </tr>
                   </table>
                <label class="label1">
                    Transfer To:
                </label>
                <select name="to" class="form-control" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                        include 'configuration.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM users where sno!=$sid";
                        $result=mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option class="table" value="<?php echo $rows['sno'];?>" >
                        <?php echo $rows['name'] ;?> (Balance: 
                        <?php echo $rows['balance'] ;?> ) 
                    </option>
                    <?php 
                        } 
                    ?>
                <div>
                </select>
                <label class="label2">Amount:</label>
                <input type="number" class="form-control" name="amount" required>   
                <div class="btn-class">
                    <button name="submit" type="submit" id="myBtn" >Transfer</button>
                </div>
            </form>
       </div>

</body>
</html>

<?php
include 'configuration.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where sno=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where sno=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")'; 
        echo '</script>';
    }


  
    
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where sno=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where sno=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                    window.location='transferhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>