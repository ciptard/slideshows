<div class="slideshows form">
<?php echo $this->Form->create('Slideshow');?>
	<fieldset>
		<legend><?php __('Admin Add Slideshow'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('active');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('slideshow_slide_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Slideshows', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Slideshow Slides', true), array('controller' => 'slideshow_slides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slideshow Slide', true), array('controller' => 'slideshow_slides', 'action' => 'add')); ?> </li>
	</ul>
</div>