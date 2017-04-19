<?php

function joaoemaria($ignore_segment = array(), $list = FALSE, $attrs = array()) {


    $ignore_segment = (!is_array($ignore_segment)) ? array($ignore_segment) : $ignore_segment;

    $ci = &get_instance();
    
    /*
     * irá pegar todos os URI.
     */
    $crumb = $ci->uri->segment_array();
    $result = $ci->uri->total_segments();
    
    
    $url_crumb = array();
    
    /*
     * ucfirst irá me retonar o primeiro char em maiusculo.
     */
    foreach ($crumb as $key => $c):
        // in_array procura no array se tem algum elemento especifico.
        if (!in_array($key, $ignore_segment)) {
            /*
             * se o resultado for menor que um, não irá criar um link, caso o
             * contrário irá criar o link de todo o caminho corretamente.
             */
            if ($result <= 1) {
                $url_crumb[] = anchor(base_url().$crumb[1], ucfirst($c));
            } if ($result <= 2) {
                $url_crumb[] = anchor(base_url().$crumb[1].'/'.$c, ucfirst(str_replace(array('_', '-'), ' ', $c))); 
            } else {
                $url_crumb[] = ucfirst(str_replace(array('_', '-'), ' ', $c)); 
            }
        }

    endforeach;

    // da um implode adicionando '>' entre as palavras.
    $fim = implode(' > ', $url_crumb);

    if ($list)
        $fim = ul($url_crumb, $attrs);

    if (!empty($fim))
        return $fim;
}

    /*
    echo joaoemaria(); // default out put
    echo joaoemaria(1); // this will ignore first segment of url
    echo joaoemaria(array(1,4)) // this will ignore first and 4th segment for crumb 
    echo joaoemaria(1,TRUE); // this will create unorder html list
    echo joaoemaria(1,TRUE,array('class'=>'test')); // can define attributes for ul list
    echo joaoemaria(null,TRUE,array('class'=>'test')); // this will print all segment of url in crumb
     */
