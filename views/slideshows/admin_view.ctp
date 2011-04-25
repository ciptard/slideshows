<div class="slideshows view">
<h2><?php  __('Slideshow');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['end']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slideshow Slide Count'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slideshow['Slideshow']['slideshow_slide_count']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slideshow', true), array('action' => 'edit', $slideshow['Slideshow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Slideshow', true), array('action' => 'delete', $slideshow['Slideshow']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $slideshow['Slideshow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Slideshows', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slideshow', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Slideshow Slides', true), array('controller' => 'slideshow_slides', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slideshow Slide', true), array('controller' => 'slideshow_slides', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Slideshow Slides');?></h3>
	<?php if (!empty($slideshow['SlideshowSlide'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Slideshow Id'); ?></th>
		<th><?php __('File'); ?></th>
		<th><?php __('Text'); ?></th>
		<th><?php __('Link'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('Start'); ?></th>
		<th><?php __('End'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($slideshow['SlideshowSlide'] as $slideshowSlide):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $slideshowSlide['id'];?></td>
			<td><?php echo $slideshowSlide['slideshow_id'];?></td>
			<td><?php echo $slideshowSlide['file'];?></td>
			<td><?php echo $slideshowSlide['text'];?></td>
			<td><?php echo $slideshowSlide['link'];?></td>
			<td><?php echo $slideshowSlide['active'];?></td>
			<td><?php echo $slideshowSlide['start'];?></td>
			<td><?php echo $slideshowSlide['end'];?></td>
			<td><?php echo $slideshowSlide['created'];?></td>
			<td><?php echo $slideshowSlide['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'slideshow_slides', 'action' => 'view', $slideshowSlide['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'slideshow_slides', 'action' => 'edit', $slideshowSlide['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'slideshow_slides', 'action' => 'delete', $slideshowSlide['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $slideshowSlide['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Slideshow Slide', true), array('controller' => 'slideshow_slides', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
