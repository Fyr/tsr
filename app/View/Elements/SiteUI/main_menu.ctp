	<header id="header" class="header">  
        <div class="container">       
            <h1 class="logo">
                <a href="/"><span class="text"><?=Configure::read('domain.title')?></span></a>
            </h1><!--//logo-->
            <nav class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    	 <li class="nav-item"><a class="dd" href="#how_it_works"><?=__('How It Works')?></a></li>
                         <li class="nav-item"><a class="dd" href="#features"><?=__('Features')?></a></li>         
                         <li class="nav-item"><a class="dd" href="#clients"><?=__('Clients')?></a></li>        
                         <li class="nav-item"><a class="dd" href="#contact"><?=__('Contacts')?></a></li>          
                         <li class="nav-item"><a class="dd" href="#login"><?=__('Sign in')?></a></li>  
                         <li class="nav-item last"><a class="dd" href="#signup"><?=__('Sign up')?></a></li>
                         <li class="nav-item langs">
                         	<a href="javascript:void(0)" onclick="setLang('eng')">ENG</a><span class="lang"> | </span><a href="javascript:void(0)" onclick="setLang('per')">PER</a>
                         </li>
                    </ul>
                </div>
            </nav>                
        </div>
    </header>