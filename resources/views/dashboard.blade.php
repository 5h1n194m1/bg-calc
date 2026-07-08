<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BG-CALC Dashboard</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

</head>


<body class="bg-gray-100">


<div class="max-w-6xl mx-auto p-8">


    <div class="mb-8">

        <h1 class="text-3xl font-bold">
            BG-CALC Dashboard
        </h1>

        <p class="text-gray-600">
            Tournament Management System
        </p>

    </div>



    <div class="grid md:grid-cols-3 gap-5">


        <a href="{{ route('admin.tournaments.index') }}"
           class="bg-white p-6 rounded-lg shadow hover:shadow-lg">

            <h2 class="font-bold text-lg">
                Tournament Management
            </h2>

            <p class="text-gray-600 mt-2">
                Kelola tournament, team, stage, match, dan result.
            </p>

        </a>



        <div class="bg-white p-6 rounded-lg shadow">

            <h2 class="font-bold text-lg">
                Stage Manager
            </h2>

            <p class="text-gray-600 mt-2">
                Tournament → Stage → Match.
            </p>

        </div>



        <div class="bg-white p-6 rounded-lg shadow">

            <h2 class="font-bold text-lg">
                Leaderboard
            </h2>

            <p class="text-gray-600 mt-2">
                Coming Next Patch.
            </p>

        </div>


    </div>


</div>


</body>

</html>