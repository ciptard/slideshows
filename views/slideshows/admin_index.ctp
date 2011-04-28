<div class="slideshows index">
	<h2><?php __('Slideshows');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('start');?></th>
			<th><?php echo $this->Paginator->sort('end');?></th>
			<th><?php echo $this->Paginator->sort('slideshow_slide_count');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($slideshows as $slideshow):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $slideshow['Slideshow']['id']; ?>&nbsp;</td>
		<td><?php echo $slideshow['Slideshow']['name']; ?>&nbsp;</td>
		<td><?php echo $slideshow['Slideshow']['active']; ?>&nbsp;</td>
		<td><?php echo $slideshow['Slideshow']['start']; ?>&nbsp;</td>
		<td><?php echo $slideshow['Slideshow']['end']; ?>&nbsp;</td>
		<td><?php echo $slideshow['Slideshow']['slideshow_slide_count']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $slideshow['Slideshow']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $slideshow['Slideshow']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $slideshow['Slideshow']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $slideshow['Slideshow']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Slideshow', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Slideshow Slides', true), array('controller' => 'slideshow_slides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slideshow Slide', true), array('controller' => 'slideshow_slides', 'action' => 'add')); ?> </li>
	</ul>
</div>