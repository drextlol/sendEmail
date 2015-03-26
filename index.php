<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Envio de emails teste</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <script src="js/vendor/modernizr.js"></script>

        <style>
            .error{
                width: 100%;
                display: block;
                background: #CC0000;
                color: #fff;
                text-align: center;
                padding: 10px;
            }

            .sucess{
                width: 100%;
                display: block;
                background: #00aa47;
                color: #fff;
                text-align: center;
                padding: 10px;
            }
        </style>
    </head>
    <body>

        <div class="row">
            <div class="large-12 columns">
                <center><h1>Envio de emails teste</h1></center>
            </div>
        </div>
        
        <?php
            if (isset($_GET['msg'])) {
                if ($_GET['error'] == "true") {
                    echo "<div class='error'>" . $_GET['msg'] . "</div>";
                }else{
                    echo "<div class='sucess'>" . $_GET['msg'] . "</div>";
                }
            }
        ?>
        
        <br>

        <div class="row" style="width: 500px;">
            <form action="sendMail.php" method="POST">
                <div class="large-12 columns">

                    <h3>Dados de host de email</h3>
                    <label>
                        <span>Host:</span>
                        <input type="text" placeholder="Digite o host" name="formHost" required/>
                    </label>
                    <label>
                        <span>Username:</span>
                        <input type="text" placeholder="Digite seu usuário de host" name="formUser" required/>
                    </label>
                    <label>
                        <span>Password:</span>
                        <input type="password" placeholder="Digite sua senha de usuário do host" name="formPass" required/>
                    </label>
                    <label>
                        <span>Porta:</span>
                        <input type="text" placeholder="Exemplo: 587 para ssl" name="formPort" required/>
                    </label>
                    <label>
                        <span>Autenticação:</span>
                        <input type="text" placeholder="digite 'true' ou 'false'" name="formAuth" required/>
                    </label>

                    <label>
                        <span>SMTP Secure:</span>
                        <input type="text" placeholder="TLS / SSL" name="formSecure" required/>
                    </label>

                    <label>
                        <select name="formDebug">
                            <option value="0" selected>Desativar debug</option>
                            <option value="3">Ativar debug</option>
                        </select>
                    </label>

                    <br />

                    <h3>Dados de remetente</h3>

                    <label>
                        <span>Email que será enviado:</span>
                        <input type="text" placeholder="exemplo@email.com.br" name="formEmail" required/>
                    </label>

                    <label>
                        <span>Nome da pessoa que irá receber:</span>
                        <input type="text" placeholder="Joãozinho" name="formName" required/>
                    </label>

                    <label>
                        <span>Assunto do email:</span>
                        <input type="text" placeholder="Joãozinho" name="formSubject" />
                    </label>

                    <label>
                        <span>Conteúdo do email:</span>
                        <textarea name="formBody" placeholder="Você pode escrever um texto ou html nessa área"></textarea>
                    </label>
                    
                    <br>

                    <label>
                        <button class="button right">Enviar email</button>
                    </label>
                </div>
            </form>
        </div>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
        $(document).foundation();
        </script>
    </body>
</html>
