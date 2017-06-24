<?php

class vIndex extends View{

    function __destruct(){
        $this->insertComponent("MenuBar", 1);
        ?>
        <section class="container">
            <?php
                
                $this->insertComponent("Teste", 1);
            ?>
        </section>
        <?php
        $this->insertTemplate("Footer", 1);
        unset($this);
        
    }
}
new vIndex($this->viewData);
