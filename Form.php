<?php

class Form
{
    var $fields = array();
    var $action;
    var $submit = "";
    var $jumField=0;

    function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    function displayForm()
    {
        echo "<form action='".$this->action."' method='POST' class='card p-4 shadow-sm bg-light border-0'>";

        for($i=0;$i<$this->jumField;$i++)
        {
            echo "<div class='mb-3'>";
            echo "<label for='" . $this->fields[$i]['name'] . "' class='form-label fw-bold'>" . $this->fields[$i]['label'] . "</label>";

            if($this->fields[$i]['type'] == 'textarea') 
            {
                echo "<textarea name='" . $this->fields[$i]['name'] . "' class='form-control'></textarea>";
            }
            else if ($this->fields[$i]['type']=='select')
            {
                echo "<select name='" . $this->fields[$i]['name'] . "' class='form-select'>";
                foreach($this->fields[$i]['option'] as $value => $label)
                {
                    echo"<option value='$value'>$label</option>";
                }
                echo"</select>";
            }
            else if ($this->fields[$i]['type']=='radio')
            {
                echo "<div>";
                foreach($this->fields[$i]['option'] as $value => $label)
                {
                    echo "<div class='form-check form-check-inline'>";
                    echo "<input class='form-check-input' type='" . $this->fields[$i]['type'] . "' name='" . $this->fields[$i]['name'] . "' value='$value' required>";
                    echo "<label class='form-check-label' for='" . $this->fields[$i]['name'] . $value . "'>$label</label>";
                    echo "</div>";
                }
                echo"</div>";
            }
            else if ($this->fields[$i]['type']=='checkbox')
            {
                echo"<div>";
                foreach($this->fields[$i]['option'] as $value => $label)
                {
                    echo "<div class='form-check form-check-inline'>";
                    echo "<input class='form-check-input' type='" . $this->fields[$i]['type'] . "' name='" . $this->fields[$i]['name'] . "[]' value='$value'>";
                    echo "<label class='form-check-label' for='" . $this->fields[$i]['name'] . $value . "'>$label</label>";
                    echo "</div>";
                }
                echo"</div>";
            }
            else 
            {
                echo"<input type='" . $this->fields[$i]['type'] . "' name='" . $this->fields[$i]['name']."' class='form-control' required></td></tr>";
            }
            echo "</div>";
        }
        echo"<button type='submit' name='tombol' class='btn btn-dark w-100 mt-3'>" . $this->submit . "</button>";
        echo"</form>";
    }

    function addField($name,$label, $type, $option=array())
    {
	    $this->fields[$this->jumField]['name']=$name;
	    $this->fields[$this->jumField]['label']=$label;
        $this->fields[$this->jumField]['type']=$type;
        $this->fields[$this->jumField]['option']=$option;
	    $this->jumField++;
    }
}