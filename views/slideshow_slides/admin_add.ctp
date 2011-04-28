<?php echo $this->Html->scriptStart(array('inline'=>false));?>
$(function() {
		$( "#SlideshowSlideStart, #SlideshowSlideEnd" ).datepicker({dateFormat: 'yy-mm-dd'});
	});
<?php echo $this->Html->scriptEnd();?>
<div class="slideshowSlides form">
<?php echo $this->Form->create('SlideshowSlide',array('type'=>'file'));?>
	<fieldset>
		<legend><?php __('Admin Add Slideshow Slide'); ?></legend>
	<?php
		echo $this->Form->input('slideshow_id');
		echo $this->Form->file('File.image', array('label'=>'Image'));
		echo $this->Form->input('text');
		echo $this->Form->input('link');
		echo $this->Form->input('active');
		echo $this->Form->input('start', array('type'=>'text'));
		echo $this->Form->input('end', array('type'=>'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Slideshow Slides', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Slideshows', true), array('controller' => 'slideshows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slideshow', true), array('controller' => 'slideshows', 'action' => 'add')); ?> </li>
	</ul>
</div>