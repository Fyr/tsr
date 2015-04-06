<?

	echo $this->PHForm->input('id', array('type' => 'hidden'));
	echo $this->PHForm->input('username', array('class' => 'input-medium'));
	
	$groups = array(1 => __('Administrator'), 2 => __('Regular user'));
	echo $this->PHForm->input('user_group_id', array('options' => $groups));
    echo $this->PHForm->input('password', array('class' => 'input-medium', 'required' => false));
    echo $this->PHForm->input('password_confirm', array('class' => 'input-medium', 'type' => 'password', 'required' => false));
    echo $this->PHForm->input('active');