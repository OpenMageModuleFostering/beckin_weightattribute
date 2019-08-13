<?php

class Beckin_WeightAttribute_Block_Donation extends Mage_Adminhtml_Block_System_Config_Form_Fieldset {

    public function render(Varien_Data_Form_Element_Abstract $element) {
        $content = '<p></p>';
        $content.= '<style>
                    .donation {
                            margin-bottom: 10px;
                            padding: 10px;
                    }

                    .donation h3 {
                            color: #444;
                            padding: 0 0 10px 0;
                            font-size: 13px;
                    }

                    </style>

                    <div class="donation">
                           <h3>Help support our free extensions and hard work by making a donation of any amount. Thank You!</h3>
                           <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BVDZJJ8UYEQUN"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="Donate Button" /></a>

                    </div>'
               
                
                ;

        return $content;


    }


}