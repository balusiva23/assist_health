
<!-- application/views/payment_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
</head>
<body>
    <h2>Pay with PhonePe</h2>

    <form action="<?php echo base_url('payment/initiate_payment'); ?>" method="post">
        <label for="amount">Amount (in INR):</label>
        <input type="number" name="amount" id="amount" placeholder="Enter amount" required />

        <br><br>

        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
