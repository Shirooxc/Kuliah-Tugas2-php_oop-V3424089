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
        echo "<form action='".$this->action."' method='POST' class='card p-4 shadow-lg bg-white border-0 rounded-4' data-aos='fade-up' data-aos-duration='1200'>";

        for($i=0;$i<$this->jumField;$i++)
        {
            echo "<div class='mb-3'>";
            echo "<label class='form-label fw-semibold'>" . $this->fields[$i]['label'] . "</label>";

            if($this->fields[$i]['type'] == 'textarea') 
            {
                echo "<textarea name='" . $this->fields[$i]['name'] . "' class='form-control rounded-3' rows='3'></textarea>";
            }
            else if ($this->fields[$i]['type']=='select')
            {
                echo "<select name='" . $this->fields[$i]['name'] . "' class='form-select rounded-3'>";
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
                    echo "<input class='form-check-input' type='radio' name='" . $this->fields[$i]['name'] . "' value='$value' required>";
                    echo "<label class='form-check-label'>$label</label>";
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
                    echo "<input class='form-check-input' type='checkbox' name='" . $this->fields[$i]['name'] . "[]' value='$value'>";
                    echo "<label class='form-check-label'>$label</label>";
                    echo "</div>";
                }
                echo"</div>";
            }
            else 
            {
                echo"<input type='" . $this->fields[$i]['type'] . "' name='" . $this->fields[$i]['name']."' class='form-control rounded-3' required>";
            }
            echo "</div>";
        }
        echo"<button type='submit' name='tombol' class='btn btn-dark w-100 py-2 rounded-3 mt-3 fw-bold'>" . $this->submit . "</button>";
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
?>
