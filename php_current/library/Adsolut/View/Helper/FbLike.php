<?php

/**
 * Description of UrlDetail
 *
 * @author marcello
 */
class Adsolut_View_Helper_FbLike extends Zend_View_Helper_Abstract {
    
    public function fbLike($url) {
        return "<iframe src=\"\/\/www.facebook.com/plugins\/like.php?href={$url}&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=283322855071011\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:90px; height:21px;\" allowTransparency=\"true\"></iframe>";
    }
    
}