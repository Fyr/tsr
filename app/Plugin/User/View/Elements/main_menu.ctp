<nav class="navigation">
		<div class="container top-navigation">
		<ul>
			<li><?=$this->Html->link(__('Dashboard'), array('plugin' => 'user', 'controller' => 'Campaigns', 'action' => 'index'))?></li>  
			<li><a href="#">Adverts</a></li>
			<li><a href="#">Widgets</a></li> 	
			<li class="dropdown full-width2">
				<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Moderator</a>
				<div class="dropdown-menu right top-dropDown-1">
					<ul>
						<li><a href="#">Sites</a></li>       
						<li><a href="#">Statistics</a></li>    
						<li><a href="#">Ads</a></li>      
						<li><a href="#">Users</a></li>      
						<li><a href="#">Landing</a></li>
					</ul>
				</div>
			</li>
			<li class="dropdown full-width2">
				<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Editor</a>
				<div class="dropdown-menu right top-dropDown-1">
					<ul>
						<li><a href="#">Sites</a></li>       
						<li><a href="#">Statistics</a></li>    
						<li><a href="#">Ads</a></li>      
						<li><a href="#">Users</a></li>
						<li><a href="#">Landing</a></li>
					</ul>
				</div>
			</li>
			<li class="dropdown full-width2">
				<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Admin</a>
				<div class="dropdown-menu right top-dropDown-1">
					<ul>
						<li><a href="#">Sites</a></li>
						<li><a href="#">Statistics</a></li>    
						<li><a href="#">Ads</a></li>      
						<li><a href="#">Users</a></li>      
						<li><a href="#">Landing</a></li>
					</ul>
				</div>
			</li>
		</ul>
		</div>
	</nav>