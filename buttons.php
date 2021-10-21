<style>
    body{
        margin: 0;
        padding: 0;
    }
    .buttons{
        /* border: 3px solid blue; */
        display: flex;
        justify-content: space-around;
        padding: 20px;
        background-color: transparent;
        box-shadow: 0 0 2px 9px grey;
    }
    .buttons button a{
        text-decoration: none;
    }
    .buttons button{
        font-size: 3rem;
        /* font-family: sans serif; */
        color: white ;
        padding-left: 15px;
        padding-right: 15px;
        background-color: rgb(131, 116, 116);
        box-shadow: 0 0 2px 2px white;
        border-radius: 20px;
    }
    .buttons button:hover{
        color: white;
        cursor: pointer;
        box-shadow: 0 0 3px 5px white;
    }
    @media (max-width:1009px){
        .buttons{
            flex-direction: column;
        }
        .buttons button{
            margin-top: 20px;
        }
    }
    @media (max-width: 312px){
        .buttons button{
            font-size: 2rem;
        }
    }
</style>
<div class="buttons">
    <button><a href="homepage.php">Home</a></button>
    <button><a href="transfermoney.php">Transfer Money</a></button>
    <button><a href="transferhistory.php">Transaction History</a></button>
</div>