<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Exemples POO en PHP - basé sur le MOOC POO - PHP OpenClassrooms">
        <meta name="keywords" content="POO, PHP, Bootstrap">
        <meta name="author" content="Christophe Malo">

        <title>
            <?= isset($title) ? $title : 'Un système de news' ?>
        </title>

        <link rel="stylesheet" href="/css/Envision.css" type="text/css" />
        <!--        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrap">
            <header>
                <h1><a href="/">Un système de news</h1>
                <p>En cours de développement</p>
            </header>

            <nav>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <?php if ($user->isAuthenticated()) { ?>
                        <li><a href="/admin/">Admin</a></li>
                        <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
                    <?php } ?>
                </ul>
            </nav>

            <div id="content-wrap">
                <section id="main">
                    <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

                    <?= $content ?>
                </section>
            </div>

            <footer></footer>
        </div>

    </body>
<html>