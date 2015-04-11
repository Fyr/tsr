<div class="span8 offset2">
<?
    $id = $this->request->data($objectType.'.id');
    $title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', $objectType);
    echo $this->element('admin_title', compact('title'));
    echo $this->PHForm->create($objectType);
    echo $this->element('admin_content');
    
	foreach($fieldSet as $field => $options) {
		echo $this->PHForm->input($field, $options);
	}
	echo $this->element('admin_content_end');
	echo $this->element('Form.form_actions', array('backURL' => $this->Html->url(array('action' => 'index'))));
    echo $this->PHForm->end();
?>
</div>
