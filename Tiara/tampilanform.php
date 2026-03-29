<?php
// Inisialisasi variabel agar tidak error saat pertama kali dibuka
$firstName = $lastName = $phone = $address = "";
$showResult = false;

// Cek apakah tombol submit ditekan
if (isset($_POST['submit'])) {
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $showResult = true;
}

// Logika untuk reset
if (isset($_POST['reset'])) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Sederhana</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 50px; background-color: #fff; }
        .container { width: 500px; text-align: left; }
        
        /* Styling Form */
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Biar padding gak ngerusak lebar */
        }
        textarea { height: 100px; resize: vertical; }
        
        /* Styling Tombol */
        .btn-submit {
            background-color: #4da3ff;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 20px;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }
        .btn-submit:hover { background-color: #3b8ee0; }
        
        .btn-reset {
            background: none;
            border: none;
            color: #555;
            cursor: pointer;
            padding: 0;
            font-size: 14px;
            text-decoration: none;
        }

        /* Styling Hasil */
        .result-section { margin-top: 30px; line-height: 1.6; }
        .result-section h3 { margin: 5px 0; font-weight: normal; font-size: 18px; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="">
        <input type="text" name="first_name" placeholder="First Name" value="<?= $firstName ?>" required>
        <input type="text" name="last_name" placeholder="Last Name" value="<?= $lastName ?>" required>
        <input type="text" name="phone" placeholder="Phone Number" value="<?= $phone ?>" required>
        <textarea name="address" placeholder="Address" required><?= $address ?></textarea>
        
        <button type="submit" name="submit" class="btn-submit">Submit</button>
    </form>

    <?php if ($showResult): ?>
        <div class="result-section">
            <h3>Hi, my name is <span class="bold"><?= $firstName . " " . $lastName ?></span></h3>
            <h3><span class="bold">Phone Number :</span> <?= $phone ?></h3>
            <h3><span class="bold">Address :</span> <?= $address ?></h3>
            
            <form method="POST" style="margin-top: 10px;">
                <button type="submit" name="reset" class="btn-reset">Reset</button>
            </form>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
