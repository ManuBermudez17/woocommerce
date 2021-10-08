<?php

class Paycomet_Postfinance extends Paycomet_APM
{
    // Setup our Gateway's id, description and other values
    public function __construct()
    {
        $this->id = 'paycomet_postfinance';
        $this->icon = PAYTPV_PLUGIN_URL . 'images/apms/postfinance.svg';
        $this->has_fields = false;
        $this->method_title = 'PAYCOMET - PostFinance';
        $this->method_description = sprintf( __( 'PAYCOMET general data must be configured <a href="%s">here</a>.', 'wc_paytpv' ), admin_url( 'admin.php?page=wc-settings&tab=checkout&section=paytpv' ) );
        $this->methodId = 23;
        $this->title = __('Pay with PostFinance', 'wc_paytpv' );
        $this->description = __('You will be redirected to PostFinance', 'wc_paytpv' );

        $this->supports = array(
            'refunds'
        );


        // Load the form fields
        $this->init_form_fields();
        $this->init_settings();

        $this->loadProp();

        if ($this->title == "Paga con PostFinance") {
            $this->title = __( 'Pay with PostFinance', 'wc_paytpv' );
        }
        if ($this->description == "Se te redirigirá a PostFinance") {
            $this->description = __( 'You will be redirected to PostFinance', 'wc_paytpv' );
        }

        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    }

    public function process_payment($order_id)
    {
        return parent::payWithAlternativeMethod($order_id, $this->methodId);
    }

    public function can_refund_order($order)
    {
        return parent::canRefundOrder($this->methodId);
    }
}
