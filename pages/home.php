<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

.form-holder { 
	  background-color: black;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      /*min-height: 100vh;*/
	  width:100%;
	  height:540px;
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    padding: 60px;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #fff;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #fff;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}

.form-content input[type=text], .form-content input[type=email], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}


.btn-primary{
    background-color: #6C757D;
    outline: none;
    border: 0px;
     box-shadow: none;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active{
    background-color: #495056;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}



.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}


</style>

<section class="banner-container">
<div style="background-image: url('imagens/home.jpeg');" class="banner-single"></div><!--banner-single-->
<div style="background-image: url('imagens/home2.jpeg');" class="banner-single"></div><!--banner-single-->   
<div style="background-image: url('imagens/home3.jpeg');" class="banner-single"></div><!--banner-single--> 
<div style="background-image: url('imagens/home4.jpeg');" class="banner-single"></div><!--banner-single-->  
      
	
		<div class="overlay"></div> 	<!--overlay-->
		
	
		<div class="bullets">
			
		</div>   <!--bullets-->


	</section>

	<section class="descricao-site">
		<div class="center">
			<div class="w50 left"><br><br>
				<h2>Zezinho do carvão</h2>
				<p>
				O mundo do carvão passa por aqui! Bem vindo ao Site Zezinho do Carvão o Portal mais completo 
				para você encontrar tudo o que precisa! Uma grande rede de produtos onde você, que ama uma 
				comemoração, com os amigos ou família, pode encontrar os melhores produtos.<br><br>
				Desfrute deste site que é dirigido a todos que atuam como comerciantes e consumidores.
				Compre no varejo ou atacado. Aqui nós ajudamos vocês a comprarem e escolherem o produto
				ideal!<br><br>
				Tem dúvidas? Não perca seu tempo! Entre em contato conosco para que possamos te auxiliar
				da melhor maneira possível. Estamos sempre prontos para te receber. Para um atendimento 
				online, basta acessar a sessão Contato, ou através das redes sociais.
				</p>
			</div>
			<div class="w50 left">
				<img class="right" src="imagens/foto.jpeg" width="auto" height="auto"> <!--limpar flutuação-->
			</div>
		</div>	
		<div class="clear"></div>
	</section>

	<section class="especialidades">

		<div class="center">
		<h2 class="title">Rede sociais</h2>
			<div class="w33 left box-especialidade">

				<h3><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg></h3>

				<h4>WhatsApp</h4>
				<p>(19) 99999-8765</p>
			</div><!--box-especialidade-->

			<div class="w33 left box-especialidade">
				<h3><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg></h3>
				<h4>zezin/fb</h4>
				<p>Nos acompanhe através do facebok...</p>
			</div><!--box-especialidade-->

			<div class="w33 left box-especialidade">
				<h3><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg></h3>
	
				<h4>zezin/insta</h4>
				<p>Saiba de todas as nossas orfetas através...</p>
			</div><!--box-especialidade-->
			<div class="clear"> </div>
		</div>
		
	</section>

	
		<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Receber ofertas?</h3>
                        <p>Cadastre-se para ficar por dentro de tudo.</p>
                        <form action="processoOfertas" method="post" class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="Ofname" placeholder="Nome completo" required>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="Ofemail" placeholder="Endereço de e-mail" required>
                            </div>                 

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" name="acao" class="btn btn-primary">Cadastrar</button>
                                <p class="text-center text-danger">
			<?php if(isset($_SESSION['erro'])){
                echo $_SESSION['erro'];
				        unset($_SESSION['erro']);}?>
		</p> 
		<p class="text-center text-success">
			<?php if(isset($_SESSION['sucesso'])){
				echo $_SESSION['sucesso'];
				unset($_SESSION['sucesso']);}?>
    </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--fim div formulário-->
		




	<section class="extras">
		<div class="center">
			<div id="depoimentos" class="w50 left depoimentos-container">
				<h2 class="title">Depoimentos </h2>
				
				<div class="depoimento-single">
					<p class="depoimento-descricao">
					Ótimo para grandes encomendas, os produtos chegaram em ótimas condições.
					</p>
					<p class="nome-autor">Luís Gabriel</p>
				</div><!--depoimento-single-->
				<div class="depoimento-single">
					<p class="depoimento-descricao">
					Produtos de ótima qualidade, recomendo.
					</p>
					<p class="nome-autor">usuário1342 </p>
				</div><!--depoimento-single-->
				<div class="depoimento-single">
					<p class="depoimento-descricao">
						Ótimo site, as entregas chegaram bem rápido. Consegui tirar todas as minhas
						dúvidas e fui muito bem atendida. Super aprovado!
					</p>
					<p class="nome-autor">Joana Santos</p>
				</div><!--depoimento-single-->
			</div><!--w50-->

			<div id="servicos" class="w50 left servicos-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
					<ul>
						<li>Qualidade no produto.</li>
						<li>Ofertas exclusivas.</li>
						<li>Atendimento online.</li>
						<li>Entrega rápida.</li>
						<li>Acompanhamento do pedido.</li>
						<li>Boas parceirias.</li>
						<li>Compre no varejo ou atacado.</li>
						<li>Atendimento via WhatsApp.</li>
					</ul>
				</div><!--servicos-->
			</div><!--w50-->

		</div><!--center-->
		<div class= "clear"></div>
	</section><!--extras-->