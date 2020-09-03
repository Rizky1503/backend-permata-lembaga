<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
    	<a class="navbar-brand" href="{!! route('FrontEnd.index') !!}">INVESTA<span>PLANNING</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
        	<li class="nav-item active"><a href="" class="nav-link pl-0">HOME</a></li>
        	<li class="nav-item"><a href="" class="nav-link">FAQ</a></li>
        	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          GLOSSARY
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">GLOSSARY A-E</a>
		          <a class="dropdown-item" href="#">GLOSSARY F-J</a>
		          <a class="dropdown-item" href="#">GLOSSARY K-O</a>
		          <a class="dropdown-item" href="#">GLOSSARY P-T</a>
		          <a class="dropdown-item" href="#">GLOSSARY U-Z</a>
		        </div>
	      	</li>
          	<li class="nav-item"><a href="" class="nav-link">CONTACT US</a></li>
          	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          OTHER
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{ route('login') }}">LOGIN</a>
		          <a class="dropdown-item" href="{{ route('FrontEnd.RegisterKoordinator') }}">REGISTER KOORDINATOR</a>
		          <a class="dropdown-item" href="{{ route('FrontEnd.RegisterUser') }}">REGISTER USER</a>
		        </div>
	      	</li>
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
