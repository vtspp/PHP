<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>Curso PHP FUNDAMENTAL</title>
    </head>

    <body>
        
        <!-- Exemplo de estrutura de tabela
        <table border="1">
            <tr>
                <td>NOME</td>
                <td>SOBRENOME</td>
                <td>CPF</td>
                <td>EMAIL</td>
                <td>DATA NASCIMENTO</td>
                <td>GENERO</td>
                <td>TIPO SANGUINEO</td>
                <td>ENDEREÇO</td>
                <td>CIDADE</td>
                <td>ESTADO</td>
                <td>CEP</td>
            </tr>
        </table>-->
       
    <?php
    
        $table = '<table border="1">'; //Criação da tabela.
        $table .= '<tr>';
        $table .= '<th>'."NOME".'</th>';
        $table .= '<th>'."SOBRENOME".'</th>';
        $table .= '<th>'."EMAIL".'</th>';
        $table .= '<th>'."DATA NASCIMENTO".'</th>';
        $table .= '<th>'."GENERO".'</th>';
        $table .= '<th>'."TIPO SANGUINEO".'</th>';
        $table .= '<th>'."ENDEREÇO".'</th>';
        $table .= '<th>'."CIDADE".'</th>';
        $table .= '<th>'."ESTADO".'</th>';
        $table .= '<th>'."CEP".'</th>';
        $table .= '<th>'."CPF".'</th>';
        $table .= '</tr>';
        
        
        $handle = fopen("pacientes.csv","r");//$handle -> será o ponteiro inicial e "r" fará a leitura.
        
        while($arquivoLido = fgetcsv ($handle, 0)){ //Laço para que toda tabela seja carregada e indexada.
            
            $table .= '<tr>';
            
            if (validarData($arquivoLido[3]) == 1 && strlen($arquivoLido[10]) == 11){ //Condicional para validar os dados da tabela, através da função "ValidarData()", se o formato (dd/MM/yyyy) e se a quantidade de dígitos no cpf estão corretos.
                
                
                //Aqui eu poderia usar algo como for, mas eu precisava que todos os elementos indexados fossem carregados em uma única vez. Ainda não conheço uma forma de fazer isso...
                $table .= '<th>'.$arquivoLido[0].'</th>' 
                       .'<th>'.$arquivoLido[1].'</th>'
                       .'<th>'.$arquivoLido[2].'</th>'
                       .'<th>'.$arquivoLido[3].'</th>'
                       .'<th>'.$arquivoLido[4].'</th>'
                       .'<th>'.$arquivoLido[5].'</th>'
                       .'<th>'.$arquivoLido[6].'</th>'
                       .'<th>'.$arquivoLido[7].'</th>'
                       .'<th>'.$arquivoLido[8].'</th>'
                       .'<th>'.$arquivoLido[9].'</th>'
                       .'<th>'.$arquivoLido[10].'</th>';
            
            }
            
        }
        function validarData($date){ //Função que verifica o formato da data.
            $dataSplint = explode("/", "$date" ); //Divide a String
            
            //Armazena os caracteres da string em indíces.
            $dia = $dataSplint[0];
            $mes = $dataSplint[1];
            $ano = $dataSplint[2];
            
            $diaLimite = 31;
            $mesLimite = 12;
            return ($dia != 0 && $dia <= $diaLimite && $mes != 0 && $mes <= $mesLimite );
        }
        echo $table .= '</tr>';
        $tabela = '</table>';
    
    ?>     
    </body>
</html>