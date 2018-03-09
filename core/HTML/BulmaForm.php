<?php
namespace Core\HTML;
class BulmaForm extends Form{

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html){
        return "<div class=\"field\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label class="label">' . $label . '</label>';
        if($type === 'textarea'){
            $input = '<textarea class="textarea" rows="10" name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else{
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="input">';
        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options){
        $label = '<label class="label">' . $label . '</label>';
        $input = '<div class="select"><select name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select></div>';
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit($name = 'Envoyer', $class='is-success'){
        
        return $this->surround('<p class="control"><button class="button '. $class .'">'. $name . '</button></p>');
    }

    
}