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
if(!empty($_POST)) {
    $ch = curl_init();
    $data = [
        'token' => 'kmTEmpnYu8IxPFFzDbFMxgdiPFIDXYyUcg5zUPVbQdvNzuJm1OguX3UiRPeV',
        'username' => $_POST['username'],
        'return_url' => 'google.de'
    ];
    curl_setopt($ch, CURLOPT_URL, 'https://api.game-list.eu/v1/vote');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $result = json_decode($result);
    print_r($result);
}

?>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-6 rounded w-1/2 shadow-lg mb-5 text-center flex flex-col justify-center">
            Welcome on GameList Vote Script Test

            <div>
                Click on the button to get a test vote link
            </div>
            <div class="w-64 text-center mb-4">
                <?php if(empty($result)){ ?>
                    <form action="/" method="post">
                        <input type="hidden" name="post_value" value="">
                        <div class="col-span-6 sm:col-span-3 mb-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username" autocomplete="given-name" class="mt-1 py-3 px-2 h-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required placeholder="GameList">
                        </div>
                        <button type="submit" name="create_vote" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Create Vote Link
                        </button>
                    </form>
                <?php } ?>
                <?php if (!empty($result)){ ?>
                    <a target="_blank" href="<?php echo $result->url ?>" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Vote Now
                    </a>
                <?php } ?>
            </div>
            <?php if (!empty($result)){ ?>
            <div class="bg-gray-900 text-white p-3 mb-5 text-left">
                <code lang="php">
                  <pre>
<?php print_r($result) ?>
                  </pre>
                </code>
            </div>
            <?php } ?>
        </div>

        <div class="bg-white p-6 rounded w-1/2 shadow-lg mb-5">
            <h2 class="text-2xl font-bold mb-3">Installation Guid</h2>

            <h4 class="text-md font-semibold mb-3">Step 1</h4>
            <p class="italic text-gray-400">Request Vote Link from our API use CURL</p>
            <div class="bg-gray-900 text-white p-3 mb-5">
                <code lang="php">
                  <pre>
$ch = curl_init();
$data = [
    'token' => 'SERVER_TOKEN',
    'username' => 'USERNAME',
    'return_url' => 'RETURN_URL'
];
curl_setopt($ch, CURLOPT_URL, 'https://api.game-list.eu/v1/vote');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = json_decode(curl_exec($ch));
                  </pre>
                </code>
            </div>

            <h4 class="text-md font-semibold mb-3">Step 2</h4>
            <p class="italic text-gray-400">Redirect your User to our Vote Site</p>
            <div class="bg-gray-900 text-white p-3 mb-5">
                <code lang="php">
                  <pre>
header("Location: " . $result->url, true, 301);
                  </pre>
                </code>
            </div>

        </div>
    </div>
</body>
</html>