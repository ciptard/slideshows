<div class="slideshowSlides form">
<?php echo $this->Form->create('SlideshowSlide');?>
	<fieldset>
		<legend><?php __('Admin Edit Slideshow Slide'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('slideshow_id');
		echo $this->Form->input('file');
		echo $this->Form->input('text');
		echo $this->Form->input('link');
		echo $this->Form->input('active');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SlideshowSlide.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SlideshowSlide.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Slideshow Slides', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Slideshows', true), array('controller' => 'slideshows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slideshow', true), array('controller' => 'slideshows', 'action' => 'add')); ?> </li>
	</ul>
</div>