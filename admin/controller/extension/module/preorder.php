<?php
class ControllerExtensionModulePreorder extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/preorder');
//
		$this->document->setTitle($this->language->get('heading_title'));
//
		$data['breadcrumbs'] = array();
//
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true),
		);
//
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'], true),
		);
//
//		$data['breadcrumbs'][] = array(
//			'text' => $this->language->get('heading_title'),
//			'href' => $this->url->link('extension/feed/openbay', 'token=' . $this->session->data['token'], true),
//		);
//
		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=feed', true);
//
//		$data['heading_title'] = $this->language->get('heading_title');
//		$data['button_cancel'] = $this->language->get('button_cancel');
//		$data['text_installed'] = $this->language->get('text_installed');
//
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $this->load->model('setting/setting');




        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {



//                	foreach ($this->request->post as $key => $value) {
//
//
//                	    var_dump([$key,$value]);
//
////                        if (substr($key, 0, strlen($code)) == $code) {
////                            if (!is_array($value)) {
////                                $this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `code` = '" . $this->db->escape($code) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape($value) . "'");
////                            } else {
////                                $this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = '" . (int)$store_id . "', `code` = '" . $this->db->escape($code) . "', `key` = '" . $this->db->escape($key) . "', `value` = '" . $this->db->escape(json_encode($value, true)) . "', serialized = '1'");
////                            }
////                        }
//                    }


            $this->model_setting_setting->editSetting('preorder', $this->request->post);


            $this->session->data['success'] = $this->language->get('text_success');
             $this->response->redirect($this->url->link('extension/module/preorder', 'token=' . $this->session->data['token'] . '&type=total', true));
        }



        if (!isset($this->request->get['module_id'])) {
            $data['action'] = $this->url->link('extension/module/preorder', 'token=' . $this->session->data['token'], true);
        } else {
            $data['action'] = $this->url->link('extension/module/preorder', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
        }
        if (!empty($this->request->get['store_id'])) {
            $store_id = (int) $this->request->get['store_id'];
        } else {
            $store_id = 0;
        }
        if(!isset($this->request->get['store_id'])) {
            $this->request->get['store_id'] = 0;
        }
        $store = $this->getCurrentStore($this->request->get['store_id']);
        $data['store_id']		= $store_id;
        $data['store']		= $store;



        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }
        $this->load->model('localisation/stock_status');

        $data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

        $on_of=$this->model_setting_setting->getSetting('preorder_of_on');
        $data['on_of'] = $on_of;
//        var_dump($data['on_of']);

//   language
        foreach ($this->initlanguage() as $key=>$languageVariable) {
            $data[$key] = $this->language->get($languageVariable);
        }

// etting
       $data['preorder_setting']=  $this->model_setting_setting->getSetting('preorder', $this->request->post);


// get_order_status()
        $data['order_statuses'] = array();
        $this->load->model('localisation/order_status');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();



       // var_dump( [ $data['order_statuses'], $data['preorder_setting'] ] );
		$this->response->setOutput($this->load->view('extension/module/preorder/preorder', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/preorder')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function install() {
//		$this->load->model('setting/setting');
//		$this->load->model('extension/event');
//
//		$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/openbay');
//		$this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/openbay');
//
//		$settings = $this->model_setting_setting->getSetting('openbaypro');
//		$settings['openbaypro_status'] = 1;
//		$this->model_setting_setting->editSetting('openbaypro', $settings);
//
//		$this->model_extension_event->addEvent('openbay_product_del_after', 'admin/model/catalog/product/deleteProduct/after', 'extension/openbay/eventDeleteProduct');
//
//		$this->model_extension_event->addEvent('openbay_product_edit_after', 'admin/model/catalog/product/editProduct/after', 'extension/openbay/eventEditProduct');
//
//		$this->model_extension_event->addEvent('openbay_menu', 'admin/view/common/column_left/before', 'extension/openbay/eventMenu');
	}

	public function uninstall() {
//		$this->load->model('setting/setting');
//		$this->load->model('extension/event');
//
//		$settings = $this->model_setting_setting->getSetting('openbaypro');
//		$settings['openbaypro_status'] = 0;
//		$this->model_setting_setting->editSetting('openbaypro', $settings);
//
//		$this->model_extension_event->deleteEvent('openbay_product_del_after');
//		$this->model_extension_event->deleteEvent('openbay_product_edit_after');
//		$this->model_extension_event->deleteEvent('openbay_menu');
	}
	protected  function initlanguage(){
        $this->language->load('extension/module/preorder');
        $languageVariables = array(
            'text_default',
            'button_cancel',
            'text_disabled',
            'text_enabled',
            'text_module',
            'text_module_settings',
            'text_module_settings_help',
            'default_notification',
            'text_success',
            'text_success_activation',
            'text_button_name',
            'text_pre_order',
            'text_pre_order_note',
            'text_pre_order_note_help',
            'pre_order_note',
            'text_admin_notification',
            'text_admin_notification_help',
            'text_email',
            'text_email_help',
            'text_email_subject',
            'text_email_body',
            'text_custom_css',
            'text_customer_email',
            'text_customer_name',
            'text_product',
            'text_date',
            'text_language',
            'text_actions',
            'text_remove',
            'text_remove_all',
            'text_module_status',
            'text_module_status_help',
            'text_module_settings_order_status',
            'text_module_settings_order_status_help',

        );

        $lan=[];
        foreach ($languageVariables as $languageVariable) {
            $lan[$languageVariable] = $this->language->get($languageVariable);
        }

        return $lan;
    }




    private function getCurrentStore($store_id) {
        if($store_id && $store_id != 0) {
            $store = $this->model_setting_store->getStore($store_id);
        } else {
            $store['store_id'] = 0;
            $store['name'] = $this->config->get('config_name');
            $store['url'] = $this->getCatalogURL();
        }
        return $store;
    }
    private function getCatalogURL() {
        if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) {
            $storeURL = HTTPS_CATALOG;
        } else {
            $storeURL = HTTP_CATALOG;
        }
        return $storeURL;
    }
}
