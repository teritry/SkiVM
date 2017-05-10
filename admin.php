<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="mainCss.css" rel="stylesheet">
    <script src="dist/js/jquery.min.js"></script>
</head>
<body>

<nav id="navbar" class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">HOME </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" id="loginNav">
                <p class="navbar-text">Signed in as: </p>
                <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".Login">Log In
                    </button>
                </li>
                <li>
                    <button id="regBtn" type="submit" class="btn btn-default"
                            onclick="window.location.href='/SkiVM/RegInfo.php'" data-toggle="modal"
                            data-target=".Registrer">Registrer
                    </button>
                </li>
                <li><a id="admin" href="admin.php">Admin</a></li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<article id="regart">
    <!-- Log in Modal -->
    <div class="modal fade Login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div id="modal">
                    <h2 class="h2">Log In</h2>
                    <input type="text" placeholder="Username" onsubmit="catch "><br>
                    <input type="password" placeholder="Password" onsubmit="catch ">
                    <br>
                    <div id="log-head">
                        <button class="btn btn-success" type="submit">Log in</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Innhold i admin -->
    <h1 id="tittleAdmin">Admin Konsoll</h1>
    <h2 id="tittle">Registrerte Brukere</h2>
    <div id="tabellBrukere">
        <table class="table" id="table-props">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
        <?php
        $db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
        if ($db->connect_error) {
            echo $db->connect_error;
            die("Kunne ikke koble til databasen");
        }

        $sql = "SELECT * from users";
        $resultat = mysqli_query($db, $sql);

        echo "<table>";
        echo "<tr><td> Fornavn: </td><td> Etternavn: </td><td> Telefonnummer: </td><td> Hvilken film: </td><td> Billett type: </td><td> Antall billetter </td></tr>";
        while ($row = mysqli_fetch_array($resultat)) {   //Creates a loop to loop through results
            echo "<tr><td >" . $row['fornavn'] . "</td><td>" . $row['etternavn'] . "</td><td>" . $row['tlfnr'] . "</td><td>";
            echo $row['film'] . "</td><td>" . $row['billettType'] . "</td><td>" . $row['antallBilletter'] . "</td></tr>";
        }
        echo "</table>";
        mysqli_close($db);
        ?>
    </div>
</article>

<script src="dist/js/bootstrap.js"></script>


</body>
</html>