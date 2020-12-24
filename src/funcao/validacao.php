<?php
    //Verifica se o email já foi cadastrado
    function EhMesmoEmail($email, $PDO){
        $CmdSQL = "SELECT Email FROM usuario WHERE Email = :email";

        $Consulta  = $PDO->prepare($CmdSQL);
        $Consulta->bindParam(':email', $email);

        $Consulta->execute();

        if($Consulta->rowCount() == 0):
            return 0;
        else:
            return 1;
        endif;
    }

    //Verifica se o cpf já foi cadastrado
    function EhMesmoCPF($cpf, $PDO){
        $CmdSQL = "SELECT CPF FROM usuario WHERE CPF = :cpf";

        $Consulta = $PDO->prepare($CmdSQL);
        $Consulta->bindParam(":cpf", $cpf);

        $Consulta->execute();

        if($Consulta->rowCount() == 0):
            return 0;
        else:
            return 1;
        endif;
    }

    //Verifica se o cpf é válido
    function EhCPFValido($cpf){

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf);
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
?>
