<?php
if (ISSET($_POST['code'])) {
	$code = $_POST['code'];
	$type = $code[0];
	if ($type == '1') {
		$sub_type = $code[1];
		if ($sub_type == '0') {
			$path = 'resource/audio';
		}
		elseif ($sub_type == '1') {
			$path = 'resource/geographic';
		}
		elseif ($sub_type == '2') {
			$path = 'resource/image';
		}
		elseif ($sub_type == '3') {
			$path = 'resource/information';
		}
		elseif ($sub_type == '4') {
			$path = 'resource/poll';
		}
		elseif ($sub_type == '5') {
			$path = 'resource/website';
		}
		elseif ($sub_type == '6') {
			$path = 'resource/video';
		}
	}
	elseif ($type == '2') {
		$path = 'object-set';
	}
	elseif ($type == '3') {
		$path = 'galleries';
	}
	elseif ($type == '4') {
		$path = 'docent-tours';
	}
	elseif ($type == '5') {
		$path = 'tours';
	}
	elseif ($type == '6') {
		$path = 'tour-set';
	}
	elseif ($type == '7') {
		$path = 'object';
	}
	header( "Location: http://tap.ummaintra.net/$path/$code" ) ;
}
?>

<div id="container" class="clearfix body-container">

  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    <?php if ($main_menu): ?>
      <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
    <?php endif; ?>
  </div>

  <header id="header" role="banner" class="header-region clearfix">
	
	<div class="region region-header">
		<div class="content-width">
			<span id="logo" class="main-logo">
				<span class="logo-wrapper">
			  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
				<img class= "sprite sprite--umma-dialogues" src="/sites/all/themes/custommobile/images/dot.gif" alt="UMMA Dialogues, University of Michigan Museum of Art">
			  </a>
			  </span>
			  <span class="logo-wrapper">
			  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
			  	<img class= "sprite sprite--many-voices" src="/sites/all/themes/custommobile/images/dot.gif" alt="Many Voices">
			  </a>
			  </span>
			  </span>
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
    		<img class="sprite show-hide show-hide--menu list collapsed" alt="Show Main Menu" title="Show Main Menu" src="/sites/all/themes/custommobile/images/dot.gif">
    		<a href="/enter-code.php" id="no-js--code-link">
    			<img class="sprite show-hide show-hide--code pad collapsed" alt="Show Stop Code Field" title="Show Stop Code Field" src="/sites/all/themes/custommobile/images/dot.gif">
    		</a>
		</div>
	</div>
	    
	
    <?php if ($main_menu || $secondary_menu || !empty($page['navigation'])): ?>
      <nav id="navigation" role="navigation" class="nav-region clearfix content-width">
        <?php if (!empty($page['navigation'])): ?> <!--if block in navigation region, override $main_menu and $secondary_menu-->
          
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
        
        <div id="keypad-wrapper" class="keypad-wrapper content-width hidden">
			<form method="post" class="keypad-form">
				<span class="keypad-label">Enter code:</span> <input class="keypad-display form-initial" type="number" pattern="[0-9]*" name="code"/></input>
				<input type="submit" value="Go" class="code-submit">
			</form>
		</div><!-- /#keypad -->
      </nav> <!-- /#navigation -->
    <?php endif; ?>
  </header> <!-- /#header -->

<div class="page-body">
	<div class="content-width">
	
  <section id="main" role="main" class="clearfix main-content">
    <?php print $messages; ?>
    	<div id="highlighted" class="highlighted">
    	<?php print render($page['highlighted']); ?>
    		<?php print render($title_prefix); ?>
    		<?php if ($title): ?>
    			<table class="title-table">
    				<tr><td class="title-icon-cell"><img src="/sites/all/themes/custommobile/images/dot.gif" class="sprite sprite--stop-type--l"></td>
    				<td class="title-cell"><h1 class="page-title"><?php print $title; ?></h1></td></tr>
    			</table>
   	<?php print render($title_suffix); ?>
    		
    	</div>
    <?php endif; ?>
    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
    <?php print render($page['content']); ?>
  </section> <!-- /#main -->
  
  <?php if ($page['sidebar_first']): ?>
    <aside id="sidebar-first" role="complementary" class="sidebar left-sidebar clearfix">
      <?php print render($page['sidebar_first']); ?>
    </aside>  <!-- /#sidebar-first -->
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
    <aside id="sidebar-second" role="complementary" class="sidebar right-sidebar clearfix">
      <?php print render($page['sidebar_second']); ?>
    </aside>  <!-- /#sidebar-second -->
  <?php endif; ?>
  </div>
</div>
  <footer id="footer" role="contentinfo" class="page-footer clearfix">
    <?php print render($page['footer']) ?>
    <?php print $feed_icons ?>
  </footer> <!-- /#footer -->

</div> <!-- /#container -->
