<?php
/*
 * Module ......: prodsocialnetworks
 * File ........: prodsocialnetworks.php
 * Description .: Simple Prestashop Module to able Social Networks on Producst Page
 * Authot ......: Luis Machado Reis <luis.reis@singularideas.com.br>
 * Licence .....: GNU Lesser General Public License V3
 * Created .....: 01/09/2010
 */

class prodsocialnetworks extends Module {

	private $_html = '';

	private $twitterEnabled = "false";
	private $facebookEnabled = "false";	
	private $orkutEnabled = "false";	
	
	function __construct() {
		$this->name = 'prodsocialnetworks';
		parent::__construct();

		$this->tab = 'SingularIdeas.com.br Modules';
		$this->version = '0.1';
		$this->displayName = $this->l('Social Products');
		$this->description = $this->l('Your products on Social Networks');

		$this->_refresh();
	}

	function install() {
		if (parent::install() == false || $this->registerHook('extraRight') == false) {
			return false;
		}
				
		return true;
	}

	public function getContent() {
		if (Tools::isSubmit('submit')) {
			$this->_update();
		}

		$this->_displayForm();
		return $this->_html;
	}
	
	public function _displayForm() {
		$this->_refresh();
		$this->_html .= '
			<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
				<fieldset>
					<legend><img src="../modules/'.$this->name.'/logo.gif" />'.$this->l('Social Networks on Products').'</legend>
					<label>'.$this->l('Twitter').'</label>
					<div class="margin-form">
						<input type="radio" name="twitterEnabled" value="true" '.(($this->twitterEnabled == 'true')?'CHECKED':'').'/>&nbsp;'.$this->l('Enabled').'&nbsp;&nbsp;
						<input type="radio" name="twitterEnabled" value="false" '.(($this->twitterEnabled == 'false')?'CHECKED':'').'/>&nbsp;'.$this->l('Disabled').'&nbsp;
					</div>
					<label>'.$this->l('Facebook').'</label>
					<div class="margin-form">
						<input type="radio" name="facebookEnabled" value="true" '.(($this->facebookEnabled == 'true')?'CHECKED':'').'/>&nbsp;'.$this->l('Enabled').'&nbsp;&nbsp;
						<input type="radio" name="facebookEnabled" value="false" '.(($this->facebookEnabled == 'false')?'CHECKED':'').'/>&nbsp;'.$this->l('Disabled').'&nbsp;
					</div>
					<label>'.$this->l('Orkut').'</label>
					<div class="margin-form">
						<input type="radio" name="orkutEnabled" value="true" '.(($this->orkutEnabled == 'true')?'CHECKED':'').'/>&nbsp;'.$this->l('Enabled').'&nbsp;&nbsp;
						<input type="radio" name="orkutEnabled" value="false" '.(($this->orkutEnabled == 'false')?'CHECKED':'').'/>&nbsp;'.$this->l('Disabled').'&nbsp;
					</div>

					<input type="submit" name="submit" value="'.$this->l('Update').'" class="button" />
				</fieldset>
			</form>';	
	}

	function hookExtraRight($params) {
		global $smarty;

		$smarty->assign('twitterEnabled', $this->twitterEnabled);
		$smarty->assign('facebookEnabled', $this->facebookEnabled);
		$smarty->assign('orkutEnabled', $this->orkutEnabled);

		return $this->display(__FILE__, 'prodsocialnetworks.tpl');
	}

	private function _refresh() {
		$this->twitterEnabled = Configuration::get($this->name.'_twitter');
		$this->facebookEnabled = Configuration::get($this->name.'_facebook');
		$this->orkutEnabled = Configuration::get($this->name.'_orkut');
	}
	
	private function _update() {
		Configuration::updateValue($this->name.'_twitter', Tools::getValue('twitterEnabled'));
		Configuration::updateValue($this->name.'_facebook', Tools::getValue('facebookEnabled'));
		Configuration::updateValue($this->name.'_orkut', Tools::getValue('orkutEnabled'));
	}
}
