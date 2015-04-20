<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $name = 'Pages';
	public $uses = array('User', 'Page');
	// public $helpers = array('ArticleVars');

	public function home() {
		if ($this->request->is(array('put', 'post'))) {
			if ($this->request->data('action') == 'signup') {
				$this->request->data('User.user_group_id', 2);
				if ($this->User->save($this->request->data('User'))) {
					if ($this->Auth->login()) {
						return $this->redirect($this->Auth->loginRedirect);
					}
				}
			} elseif ($this->request->data('action') == 'login') {
				$this->request->data('User', $this->request->data('Login'));
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->loginRedirect);
				} else {
					$this->Session->setFlash(AUTH_ERROR, null, null, 'auth');
				}
			}
		}
		$this->currMenu = 'Home';
		$article = $this->Page->findBySlug('home');
		$this->set('article', $article);
	}
	
	public function view($slug) {
		$article = $this->Page->findBySlug($slug);
		$this->set('article', $article);
		
		$this->currMenu = $slug;
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
