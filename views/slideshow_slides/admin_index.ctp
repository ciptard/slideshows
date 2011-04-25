<div class="slideshowSlides index">
	<h2><?php __('Slideshow Slides');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('slideshow_id');?></th>
			<th><?php echo $this->Paginator->sort('file');?></th>
			<th><?php echo $this->Paginator->sort('text');?></th>
			<th><?php echo $this->Paginator->sort('link');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('start');?></th>
			<th><?php echo $this->Paginator->sort('end');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($slideshowSlides as $slideshowSlide):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $slideshowSlide['SlideshowSlide']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($slideshowSlide['Slideshow']['name'], array('controller' => 'slideshows', 'action' => 'view', $slideshowSlide['Slideshow']['id'])); ?>
		</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['file']; ?>&nbsp;</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['text']; ?>&nbsp;</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['link']; ?>&nbsp;</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['active']; ?>&nbsp;</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['start']; ?>&nbsp;</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['end']; ?>&nbsp;</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['created']; ?>&nbsp;</td>
		<td><?php echo $slideshowSlide['SlideshowSlide']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $slideshowSlide['SlideshowSlide']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $slideshowSlide['SlideshowSlide']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $slideshowSlide['SlideshowSlide']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $slideshowSlide['SlideshowSlide']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Slideshow Slide', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Slideshows', true), array('controller' => 'slideshows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slideshow', true), array('controller' => 'slideshows', 'action' => 'add')); ?> </li>
	</ul>
</div>