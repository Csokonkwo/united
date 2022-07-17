<?php 
include('../path.php');
include('server.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "/admin/includes/head.php"); ?>
</head>
<body>
    
    <?php include(ROOT_PATH . "/admin/includes/header.php"); ?>
    
        <div class="form">
            <div class="container">
                Enter a Transaction
                <form method="POST" action="">
                    <?Php if(count($errors) > 0): ?>
                    <div class="alert error">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?>.</li>
                        <?php endforeach ?>
                    </div>
                    <?php endif ?>

                    <input type="text" name="user_id" value= "<?php echo $username; ?>" placeholder="Enter User_ID">

                    <input type="text" name="amount" value= "<?php echo $amount; ?>" placeholder="Enter Amount">
                    
                    <select oninput="checkTransaction()" id="select_transaction" name="type" class="text-input">
                        <option value="deposit">Deposit</option>
                        <option value="withdrawal">Withdrawal</option>
                        <option value="referral">Referral</option>
                        <option value="interest">Interest</option>
                        <option value="investment">Investment</option>
                    </select>
                    
                    <select name="status" class="text-input">
                        <option value="1">Pending</option>
                        <option value="2">In Process</option>
                        <option value="3">Complete</option>
                        <option value="0">Cancelled</option>
                    </select>
                    
                    <div class="refss">
                        <input id="transaction_reference" type="text" name="reference" placeholder="Optional">
                        <input id="payment_method" type="text" name="payment_method" value="Bitcoin" placeholder="Input Payment Method">
                    </div>

                    <button type="submit" name="add_transaction" class="btn btn-big">Submit</button>
                
                </form>
            </div>
        </div>

        <script>
            var select_transaction = document.querySelector('#select_transaction');
            var transaction_reference = document.querySelector('#transaction_reference');
            var payment_method = document.querySelector('#payment_method');
            var refss = document.querySelector('.refss');

            function checkTransaction(){

                if(select_transaction.value == "interest"){
                    refss.style.display = "none";
                }else{
                    refss.style.display = "block";
                }
                
                if(select_transaction.value == "investment"){
                    transaction_reference.placeholder = "Input Plan";
                    payment_method.value = 0;
                    payment_method.placeholder = 'Counter';
                }else{
                    transaction_reference.placeholder = "admin";
                    payment_method.value = 'Bitcoin';
                    payment_method.placeholder = 'Payment Method';
                }
                
            };

        </script>

        <div class="table">
            <div class="container">     
            <i class="fa fa-history"> </i> Transactions
                <?php $transactions = selectAll('transactionz');  ?>
                <table>
                    <thead>
                        <th>S/N</th>
                        <th>USERNAME</th>
                        <th>T_ID</th>
                        <th>AMOUNT</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                        <th>P_METHOD</th>
                        <th>REFERENCE</th>
                        <th>DATE</th>
                        <th colspan="2">Actions</th>
                    </thead>
                    <tbody>
                    <?php foreach ($transactions as $key => $transaction): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $transaction['user_id']]); 
                            if($transaction['type'] == 'deposit' || $transaction['status'] == 'received'){
                                $color='green'; 
                            }
        
                            if($transaction['type'] == 'withdrawal' || $transaction['status'] == 'sent'){
                                $color='red'; 
                            }
                            
                            if($transaction['type'] == 'investment'){
                                $color='blue'; 
                            }
                            if($transaction['type'] == 'interest'){
                                $color='green'; 
                            }

                            if($transaction['type'] == 'referral'){
                                $color='green'; 
                            }
                        
                        ?>
                            <td style="color:<?php echo $color?>"><?php echo $key + 1 ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $userT['username'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['id'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo '$'. $transaction['amount'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['type'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['status'] ?></td>
                            <td><?php echo $transaction['payment_method'] ?></td>
                            <td><?php echo $transaction['reference'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo date('F j, Y.', strtotime($transaction['created_at'])); ?></td>

                            <td><a href="edit_transaction.php?edit=1&t_id=<?php echo $transaction['id'] ?>">edit</a></td>
                            <td><a href="history.php?delete=1&del_id=<?php echo $transaction['id'] ?>">delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <?php include(ROOT_PATH . "/admin/includes/footer.php"); ?>
    
</body>
</html>