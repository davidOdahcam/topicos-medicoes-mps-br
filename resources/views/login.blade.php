<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Login</title>
    <link href="./css/app.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container d-flex justify-content-center flex-column" style="min-height: 100vh;">
		<div class="row">
			<div class="col-lg-6 order-lg-2">
				<div class="d-flex justify-content-center flex-column">
					<div class="text-center mt-4">
						<h1 class="h2 mb-3">Já possui conta?</h1>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="m-sm-4">
								<form>
									<div class="mb-3">
										<label class="form-label">Email</label>
										<input class="form-control form-control-lg" type="text" name="name"
											placeholder="Insira seu email" />
									</div>
									<div class="mb-3">
										<label class="form-label">Senha</label>
										<input class="form-control form-control-lg" type="password" name="password"
											placeholder="Insira sua senha" />
									</div>
									<div class="text-center mt-3">
										<button class="btn btn-lg btn-primary">Entrar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 order-lg-1">
				<div class="d-flex justify-content-center flex-column">
					<div class="text-center mt-4">
						<h1 class="h2 mb-3">Não possui conta?</h1>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="m-sm-4">
								<form>
									<div class="mb-3">
										<label class="form-label">Nome</label>
										<input class="form-control form-control-lg" type="text" name="name"
											placeholder="Insira seu nome" />
									</div>
									<div class="mb-3">
										<label class="form-label">Email</label>
										<input class="form-control form-control-lg" type="email" name="email"
											placeholder="Insira seu email" />
									</div>
									<div class="mb-3">
										<label class="form-label">Senha</label>
										<input class="form-control form-control-lg" type="password" name="password"
											placeholder="Insira sua senha" />
									</div>
									<div class="text-center mt-3">
										<button class="btn btn-lg btn-primary">Cadastrar</button>
										<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="./js/app.js"></script>
    <script type="text/javascript" src="./js/translateTable.js"></script>
</body>

</html>