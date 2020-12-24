<?php
    //Verifica se o usuário é maior de idade
    function EhMaiorIdade($DtNascimento){
        $DtNascimento = new DateTime($DtNascimento);
        $Idade = $DtNascimento->diff(new DateTime(date('Y-m-d')));
        if(($Idade->format("%Y")) >= 18):
            return true;
        else:
            return false;
        endif;
    }

    function CalcularIdade($DtNascimento){
        $DtNascimento = new DateTime($DtNascimento);
        $Idade = $DtNascimento->diff(new DateTime(date('Y-m-d')));
        return $Idade->format("%Y");
    }
?>
