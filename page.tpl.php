<div id="keypad-wrapper" class="hidden">
	<input id="keypad-display"></input><a name="Keypad" class="key-show-hide pad">Keypad</a>
	<table class="keypad">
		<tr>
			<td class="keypad-button" id="1-button">1</td>
			<td class="keypad-button" id="2-button">2</td>
			<td class="keypad-button" id="3-button">3</td>
		</tr>
		<tr>
			<td class="keypad-button" id="4-button">4</td>
			<td class="keypad-button" id="5-button">5</td>
			<td class="keypad-button" id="6-button">6</td>
		</tr>
		<tr>
			<td class="keypad-button" id="7-button">7</td>
			<td class="keypad-button" id="8-button">8</td>
			<td class="keypad-button" id="9-button">9</td>
		</tr>
		<tr>
			<td class="keypad-button long-button" id="clear-button">Clear</td>
			<td class="keypad-button" id="0-button">0</td>
			<td class="keypad-button long-button" id="go-button">Go</td>
		</tr>
	</table>
</div>

<div id="container" class="clearfix">

  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    <?php if ($main_menu): ?>
      <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
    <?php endif; ?>
  </div>

  <header id="header" role="banner" class="clearfix">
	
	<div class="region region-header">
		<div class="content-width">
			<?php if ($logo): ?>
			  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			  </a>
			<?php endif; ?>
			<?php if ($site_name || $site_slogan): ?>
			  <hgroup id="site-name-slogan">
				<?php if ($site_name): ?>
				  <h1 id="site-name">
					<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><span><?php print $site_name; ?></span></a>
				  </h1>
				<?php endif; ?>
				<?php if ($site_slogan): ?>
				  <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
				<?php endif; ?>
			  </hgroup>
			<?php endif; ?>
    		<?php print render($page['header']); ?>
    		<a class="key-show-hide pad" name="Keypad">Keypad</a>
		</div>
	</div>
	<div class="header-spacer"></div>

    <?php if ($main_menu || $secondary_menu || !empty($page['navigation'])): ?>
      <nav id="navigation" role="navigation" class="clearfix">
        <?php if (!empty($page['navigation'])): ?> <!--if block in navigation region, override $main_menu and $secondary_menu-->
          <?php print render($title_prefix); ?>
    		<?php if ($title): ?><h1 class="page-title content-width"><?php print $title; ?></h1><?php endif; ?>
   		 <?php print render($title_suffix); ?>
          <?php print render($page['navigation']); ?>
        <?php endif; ?>
        <?php if (empty($page['navigation'])): ?>
		  <?php print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'id' => 'main-menu',
              'class' => array('links', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
		  <?php print theme('links__system_secondary_menu', array(
            'links' => $secondary_menu,
            'attributes' => array(
              'id' => 'secondary-menu',
              'class' => array('links', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Secondary menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        <?php endif; ?>
      </nav> <!-- /#navigation -->
    <?php endif; ?>
    <?php if ($breadcrumb): print $breadcrumb; endif;?>
  </header> <!-- /#header -->

<div class="page-body">
	<div class="content-width">
	<?php print render($title_prefix); ?>
    		<?php if ($title): ?><h1 class="page-title content-width"><?php print $title; ?></h1><?php endif; ?>
   	<?php print render($title_suffix); ?>
  <section id="main" role="main" class="clearfix">
    <?php print $messages; ?>
    <a id="main-content"></a>
    <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print render($page['content']); ?>
  </section> <!-- /#main -->
  
  <?php if ($page['sidebar_first']): ?>
    <aside id="sidebar-first" role="complementary" class="sidebar clearfix">
      <?php print render($page['sidebar_first']); ?>
    </aside>  <!-- /#sidebar-first -->
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
    <aside id="sidebar-second" role="complementary" class="sidebar clearfix">
      <?php print render($page['sidebar_second']); ?>
    </aside>  <!-- /#sidebar-second -->
  <?php endif; ?>
  </div>
</div>
  <footer id="footer" role="contentinfo" class="clearfix">
    <?php print render($page['footer']) ?>
    <?php print $feed_icons ?>
  </footer> <!-- /#footer -->

</div> <!-- /#container -->
