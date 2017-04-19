<?php
    function joaoemaria($ignore_segment = array(), $list = FALSE, $attrs = array()) {
        $ignore_segment = (!is_array($ignore_segment)) ? array($ignore_segment) : $ignore_segment;

        $ci = &get_instance();
        
        $crumb = $ci->uri->segment_array();
        $result = $ci->uri->total_segments();
        
        $url_crumb = array();
        
        foreach ($crumb as $key => $c):
            if (!in_array($key, $ignore_segment)) {
                if ($result <= 1) {
                    $url_crumb[] = anchor(base_url().$crumb[1], ucfirst($c));
                } if ($result <= 2) {
                    $url_crumb[] = anchor(base_url().$crumb[1].'/'.$c, ucfirst(str_replace(array('_', '-'), ' ', $c))); 
                } else {
                    $url_crumb[] = ucfirst(str_replace(array('_', '-'), ' ', $c)); 
                }
            }

        endforeach;

        $fim = implode(' > ', $url_crumb);

        if ($list)
            $fim = ul($url_crumb, $attrs);

        if (!empty($fim))
            return $fim;
    }
