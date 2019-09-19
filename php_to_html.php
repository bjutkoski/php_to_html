<?php
  function html_comp($tag, $props, ...$children) {    
    $props_str = '';
    foreach ($props as $prop=>$value){      
      $props_str .= ' ' . $prop . '=' . '"'. $value . '"';
    }

    if ($children) {
      $componente = '<'.$tag.$props_str.'>';
      foreach ($children as $child){
        if (is_string($child)){
          $componente .= $child;
        } else {
          $componente .= $child();
        }
      };
      if (in_array($tag, ['input'])){        
        $componente .= '>';
      } else {
        $componente .= '</'.$tag.'>';
      }
    } else {
      $componente = '<'.$tag.$props_str.'>'.'</'.$tag.'>';
    }

    return function() use ($componente){
      return $componente;
    };
  }

  function div($props, ...$children){
    return html_comp('div', $props, ...$children);
  }

  function form($props, ...$children){
    return html_comp('form', $props, ...$children);
  }

  function input($props, ...$children){
    return html_comp('input', $props, ...$children);
  }
  
  function table($props, ...$children){
    return html_comp('table', $props, ...$children);
  }  

  function th($props, ...$children){
    return html_comp('th', $props, ...$children);
  }  

  function tr($props, ...$children){
    return html_comp('tr', $props, ...$children);
  }  

  function td($props, ...$children){
    return html_comp('td', $props, ...$children);
  }  

  function select($props, ...$children){
    return html_comp('select', $props, ...$children);
  }    

  function option($props, ...$children){
    return html_comp('option', $props, ...$children);
  }    

  function body($props, ...$children){
    return html_comp('body', $props, ...$children);
  }    
?>