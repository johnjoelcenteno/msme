<style>
	section {
		position: relative;
		padding: 24px;
		display: flex;
		justify-content: center;
	}

	.bg-light {
		background: white;
		padding: 20px;
		margin-top: 3%;
		border-radius: 10px;
		height: 70rem;
		width: 80%;
		box-shadow: 4px 6px 17px 0px #888888;
	}

	.credentials {
		text-align: left;
		margin-left: 15%;
		margin-right: 15%;
		margin-top: 30px;
	}

	.login-div {
		display: flex;
		justify-content: right;
		margin-top: 30px;
	}

	center {
		margin-bottom: 60px;
	}

	body {
		background-image: url("<?= base_url() ?>assets/img/landbackground.jpg");
		background-repeat: no-repeat;
		background-size: cover;
	}

	img {
		vertical-align: middle;
		margin-top: 50px;
	}
</style>

<script src="<?= base_url() ?>assets/jquery/dist/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- BEGIN LOGIN SECTION -->
<section class="land-background">
	<div align="center" class="bg-light">
		<h1 align="center" style="font-weight: bold; margin-top: 5%" class="text-uppercase">Department of Trade and Industries</h1>
		<div class="col-md-6">
			<img src="<?= base_url() ?>assets/img/logo.png" width="300" height="250" alt="">
		</div>
		<div class="col-md-6" style="top: 10%;">
			<form action="">
				<div class="credentials">
					<div class="form-group">
						<!-- <label for="">Username</label> -->
						<input type="text" id="username" class="form-control" placeholder="Username" autocomplete="off">
					</div>

					<div class="form-group">
						<!-- <label for="">Password</label> -->
						<input type="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
					</div>

					<div class="login-div">
						<button type="submit" class="btn btn-primary col-md-12">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- END LOGIN SECTION -->

<script>
	$(document).ready(function() {
		$('form').submit(function(e) {
			e.preventDefault();
			let credObj = {
				username: $('#username').val(),
				password: $('#password').val()
			};

			$.post("<?= base_url() ?>SignIn/postLogin", credObj, function(resp) {

				if (resp == 0) {
					$('#username').val("");
					$('#password').val("");

					$('#username').focus();
				}

				resp == 1 ? window.location.replace("<?= base_url() ?>Dashboard") : Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'Invalid credentials',
					showConfirmButton: false,
					timer: 1500
				});
			});
		});
	});
</script>