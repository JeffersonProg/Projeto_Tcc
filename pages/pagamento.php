<?php 
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();
$nivel_necessario = 1;
  
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioCpf']) OR ($_SESSION['nivel'] < $nivel_necessario)) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: ../pages/usuario.php"); exit;
}
$conn = mysqli_connect("localhost", "root","", "projeto_tcc");
$_GET['valor'];
$desconto =0;

if(isset($_GET['codpromo'])){
    $codpromo = $_GET['codpromo'];
    $result2_postagem = "SELECT * FROM promocao WHERE codpromo = '$codpromo'";
    $resultado2_postagem = mysqli_query($conn, $result2_postagem);
    while($dado = $resultado2_postagem->fetch_array()){  
        $desconto = $dado['valordesconto'];
    }
}

?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Pagamento</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                <style>@import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

body {
    background-color: #f5eee7;
    font-family: "Poppins", sans-serif;
    font-weight: 300
}

.container {
    height: 100vh
}

.card {
    border: none
}

.card-header {
    padding: .5rem 1rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, .03);
    border-bottom: none
}

.btn-light:focus {
    color: #212529;
    background-color: #e2e6ea;
    border-color: #dae0e5;
    box-shadow: 0 0 0 0.2rem rgba(216, 217, 219, .5)
}

.form-control {
    height: 50px;
    border: 2px solid #eee;
    border-radius: 6px;
    font-size: 14px
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #039be5;
    outline: 0;
    box-shadow: none
}

.input {
    position: relative
}

.input i {
    position: absolute;
    top: 16px;
    left: 11px;
    color: #989898
}

.input input {
    text-indent: 25px
}

.card-text {
    font-size: 13px;
    margin-left: 6px
}

.certificate-text {
    font-size: 12px
}

.billing {
    font-size: 11px
}

.super-price {
    top: 0px;
    font-size: 22px
}

.super-month {
    font-size: 11px
}

.line {
    color: #bfbdbd
}

.free-button {
    background: #1565c0;
    height: 52px;
    font-size: 15px;
    border-radius: 8px
}

.payment-card-body {
    flex: 1 1 auto;
    padding: 24px 1rem !important
}</style>
                                
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                
                            </head>
                            <body>
                            <div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="row g-3">
        <div class="col-md-6"> <span>Forma de Pagamento</span>
            <div class="card">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header p-0" id="headingTwo">
                            <h2 class="mb-0"> <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="d-flex align-items-center justify-content-between"> <span>Paypal</span> <img src="https://i.imgur.com/7kQEsHU.png" width="30"> </div>
                                </button> </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body"> <input type="text" class="form-control" placeholder="Paypal email"> </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0">
                            <h2 class="mb-0"> <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="d-flex align-items-center justify-content-between"> <span>Cartão de crédito</span>
                                        <div class="icons"> <img src="https://i.imgur.com/2ISgYja.png" width="30"> <img src="https://i.imgur.com/W1vtnOV.png" width="30"> <img src="https://i.imgur.com/35tC99g.png" width="30"> <img src="https://i.imgur.com/2ISgYja.png" width="30"> </div>
                                    </div>
                                </button> </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body payment-card-body"> <span class="font-weight-normal card-text">Número do cartão</span>
                                <div class="input"> <i class="fa fa-credit-card"></i> <input type="text" class="form-control" placeholder="0000 0000 0000 0000"> </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-6"> <span class="font-weight-normal card-text">Data de validade</span>
                                        <div class="input"> <i class="fa fa-calendar"></i> <input type="text" class="form-control" placeholder="MM/YY"> </div>
                                    </div>
                                    <div class="col-md-6"> <span class="font-weight-normal card-text">CVC/CVV</span>
                                        <div class="input"> <i class="fa fa-lock"></i> <input type="text" class="form-control" placeholder="000"> </div>
                                    </div>
                                </div> <span class="text-muted certificate-text"><i class="fa fa-lock"></i>Sua trnsação está protegida com certificado SSL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6"> <span>Resumo</span>
            <div class="card">
                <div class="d-flex justify-content-between p-3">
                    <div class="d-flex flex-column"> <span>Valor da compra</span> </div>
                    <div class="mt-1"> <sup class="super-price">R$ <?php echo number_format($_GET['valor'], 2, ',', '.');?></sup> </div>
                </div>
                <hr class="mt-0 line">
                <div class="p-3">
                    <div class="d-flex justify-content-between mb-2">Tem um código promocional?</div>
                    <div class="d-flex justify-content-between"> <form action="pagamento.php" method="get"> <input type="text" class="form-control" name="codpromo" placeholder="Digite o código aqui" value="<?php if(isset($_GET['codpromo'])){echo $codpromo;}?>"> <input type="hidden" name="valor" value="<?php echo $_GET['valor'];?>" > </form></div>
                </div>
                <hr class="mt-0 line">
                <div class="p-3 d-flex justify-content-between">
                    <div class="d-flex flex-column"> <span>Valor da compra</span> <span>Desconto</span> <br> <span>Total</span> </div><div class="d-flex flex-column"> <span>R$  <?php echo number_format($_GET['valor'], 2, ',', '.');?></span> <span>R$ <?php echo number_format($desconto, 2, ',', '.');?></span><br> <span>R$ <?php $total = $_GET['valor'] - $desconto; echo number_format($total, 2, ',', '.');?></span></div>
                </div>
                <div class="p-3"> <a href="processoPedido.php?desc=<?php echo $desconto;?>" class="btn btn-primary btn-block free-button">Pagar</a>
                </div>
            </div>
        </div>
    </div>
</div>
                            </body>
                        </html>