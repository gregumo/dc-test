<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nantes Métropole - Composteurs de quartier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <router-link :to="{name : 'composters.index'}" class="navbar-brand">Nantes Métropole - Composteurs
                    </router-link>
                </div>
            </div>
        </header>
        <router-view></router-view>
        <footer class="py-5"></footer>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
