<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SeuDrink Api Documentação</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Poppins;
        }

        body,
        main,
        html {
            background-color: black;
           
        }

        main {
            display: flex;
            padding: 5em 10em;
            justify-content: center;
            align-items: center;
        }

        main section {
            
            border-radius: 30px;
            color: white;
        }

        .params {
            display: flex;
            flex-direction: row;
            gap: 2em;
            align-items: center;
            margin: 2em 0;
        }



    </style>

</head>

<body>

    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <section>
            <h2 class="mb-5 text-center">Rotas para Consulta [GET]</h2>

            <div class="alert alert-primary" role="alert">
                https://apiDrink.celleta.com/bebidas
            </div>

            <div class="params">

                <h4>Parâmetros:</h4>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {NOME : STRING}
                </button>
               
            </div>




            <div class="alert alert-primary" role="alert">
                https://apiDrink.celleta.com/frutas
            </div>

            <div class="params">

                <h4>Parâmetros:</h4>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {NOME : STRING}
                </button>
               
            </div>

            <div class="alert alert-primary mb-5" role="alert">
                https://apiDrink.celleta.com/drinks
            </div>

            <div class="params">

                <h4>Parâmetros:</h4>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {BEBIDA_ID : NUMBER}
                </button>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {FRUTA_ID : NUMBER}
                </button>
               
            </div>

            <h2 class="mb-5  text-center">Rotas para Criação [POST]</h2>

            <div class="alert alert-success" role="alert">
                https://apiDrink.celleta.com/bebida/novo
            </div>

            <div class="params">

                <h4>Parâmetros:</h4>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {NOME : STRING}
                </button>
               
            </div>

            <div class="alert alert-success" role="alert">
                https://apiDrink.celleta.com/fruta/novo
            </div>

            <div class="params">

                <h4>Parâmetros:</h4>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {NOME : STRING}
                </button>
               
            </div>

            <div class="alert alert-success" role="alert">
                https://apiDrink.celleta.com/ingrediente/novo
            </div>

            <div class="params">

                <h4>Parâmetros:</h4>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {NOME : STRING}
                </button>
               
            </div>

            <div class="alert alert-success" role="alert">
                https://apiDrink.celleta.com/drink/novo
            </div>

            <div class="params">

                <h4>Parâmetros:</h4>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {NOME : STRING}
                </button>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {FOTO : STRING}
                </button>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {PREPARO : STRING}
                </button>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {FRUTA_ID : NUMBER}
                </button>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {BEBIDA_ID : NUMBER}
                </button>

                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Top popover">
                    {INGREDIENTES : ARRAY}
                </button>
               
            </div>
        </section>

    </main>

</body>

</html>