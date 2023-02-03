<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        GameList Vote Test
    </title>
</head>

<?php
$result = null;
if($_POST) {
    $ch = curl_init();
    $data = [
        'token' => 'kmTEmpnYu8IxPFFzDbFMxgdiPFIDXYyUcg5zUPVbQdvNzuJm1OguX3UiRPeV',
        'username' => 'VenomTM',
        'return_url' => 'google.de'
    ];
    curl_setopt($ch, CURLOPT_URL, 'https://game-list.eu/v1/vote');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $result = json_decode($result);
}

?>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded">
            Welcome on GameList Vote Script Test

            <div>
                Click on the button to get a test vote link
            </div>
            <?php if(empty($result)){ ?>
            <form action="index.php" method="post">
                <button type="submit" name="create_vote" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Create Vote Link
                </button>
            </form>
            <?php } ?>
            <?php if (!empty($result)){ ?>
                <a href="<?php $result->url ?>" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Vote Now
                </a>
            <?php } ?>

        </div>
    </div>
</body>
</html>