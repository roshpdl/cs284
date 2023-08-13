<?php
function get_sql_data($pdo, $sqlcommand, $placeholder_values = array()){
        $query = $pdo->prepare($sqlcommand);
        $query->execute($placeholder_values);
        return $query->fetchAll();
    }
?>