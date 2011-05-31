<?php
/**
 * Custom Template Parameter
 * 
 * This class adds a custom template selectlist parameter to allow user to use different template layouts in it's template's overrides
 * This is particularly usefull to show the same module in completely custom ways
 * (for example: same module but different layout based on the current page / section, or different styles in different website areas)
 * To use it just place a template file name custom_WHATEVERNAME.php in module override folder
 * @package Joomla
 * @author Marco "DWJ" Solazzi <hello@dwightjack.com>
 * @version 0.1
 * @copyright Copyright &copy; 2009 Marco Solazzi
 * @license GNU/GPL, see Joomla! licence in LICENSE.php.
 */
class JElementCustomtemplates extends JElement {

  var   $_name = 'customtemplates';

	function fetchElement($name, $value, &$node, $control_name) {
		
		$modulename = $node->attributes('modulename');
		if (!$modulename) {
			return JText::_('No module name found');
		}
		
		jimport( 'joomla.filesystem.folder' );
		jimport( 'joomla.filesystem.file' );
		
		$db =& JFactory::getDBO();
        $db->setQuery('SELECT template FROM #__templates_menu WHERE client_id=0 AND menuid=0');
        $template = $db->loadResult(); 
		$templatePath = JPATH_ROOT.DS.'templates'.DS.$template.DS.'html'.DS.$modulename;
		$exclude	= '\.(html|htm)';
		$filter = '^custom_';
		
		$files = array();
		if (JFolder::exists($templatePath) ) {
			$files = JFolder::files($templatePath,$filter);
		}
		$options = array (JHTML::_('select.option', '', '- '.JText::_('Use default').' -'));
		if ( !empty($files) && is_array($files) )
		{
			
			foreach ($files as $file)
			{
				if (preg_match( chr( 1 ) . $exclude . chr( 1 ), $file ))
				{
					continue;
				}
				$file = JFile::stripExt( $file );
				$options[] = JHTML::_('select.option', $file, $file);
			}
		}

		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"', 'value', 'text', $value, $control_name.$name);
	}
}
?>