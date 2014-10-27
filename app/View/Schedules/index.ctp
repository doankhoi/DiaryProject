<h2>Danh sách lịch làm việc</h2>
<br>
<div>
    <?php

    function splitCharater($str) {
        if (count(explode(' ', $str)) <= 100)
            return $str;

        $result = explode(' ', $str);

        return implode(' ', array_slice($result, 0, 100));
    }

    foreach ($data as $schedule) {
        echo $this->Html->link(
                $schedule['Schedule']['title'], array(
            'controller' => 'Schedules',
            'action' => 'view',
            $schedule['Schedule']['id']
                )
        );
        echo "<p>" . splitCharater($schedule['Schedule']['notes']). "</p>";
        ?>
        <hr>
        <?php
    }
    ?>    
</div>

<?php
echo $this->Paginator->prev('← Newer ', null, null, array('class' => 'disabled')); //Shows the next and previous links
echo " | " . $this->Paginator->numbers() . " | "; //Shows the page numbers
echo $this->Paginator->next('Older →', null, null, array('class' => 'disabled')); //Shows the next and previous links
echo " Page " . $this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
?> 