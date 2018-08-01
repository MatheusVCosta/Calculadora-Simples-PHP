<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Calcukadora</title>

    <style>
        #resultado{
            width:100%;
            height: 10px;
            text-align: center;
            font-size: 15px;
            font-family: Verdana;
        }
        #valor{
            width:100%;
            height: 160px;
            background-color: #615c5c;
        }
       
        #valor p {
            text-align:center;
            font-size: 15px;
            font-family: Verdana;
        }
        #titulo{
            text-align: center;
            font-size: 15px;
            font-family: Verdana;
        }
        table{
            border:2px solid black;
        }
    </style>

    <?php
        //Definindo as variaveis
        $Valor = array("", "");
        $resultado = 0;
        $operacao = null;
        $msg = "";
        $selecionado = array("", "", "", "");
        //Definindo as constantes
        define ("OPERACAO", "Selecione uma operação matemática");

        //Verificando se o botão foi precionado
        if(isset($_GET["btnCalcular"])){
            //pegando os valores que o usuário inseriu
            $Valor[0] = $_GET["txtValor1"];
            $Valor[1] = $_GET["txtValor2"];
            
            //Verificando se os valores estão vazios
            if($Valor[0] == "") {
                $style = "background-color:red"; 
            }
            if($Valor[1] == ""){
                $style = "background-color:red"; 
            }
            //Entrando na ação do botão
            else{
                //verificando qual operação esta selecionada 
                if(isset($_GET["rdOperacao"])){
                    //pegando a opção selecionada
                    $operacao = $_GET["rdOperacao"];
                    //Qual operação foi selecionada
                    if($operacao == 1){
                        $resultado = $Valor[0] + $Valor[1];
                        $selecionado[0] = "checked";// a variavel recebe um checked para depois que o calculo for feito a opção continuar selecionada
                    }
                    else if($operacao == 2){
                        $resultado =  $Valor[0] - $Valor[1];
                        $selecionado[1] = "checked";
                    }
                    else if($operacao == 3){
                        $resultado =  $Valor[0] * $Valor[1];
                        $selecionado[2] = "checked";
                    }
                    else if($operacao == 4){
                        if($Valor[0] == 0 or $Valor[1] == 0){
                            $msg = ("Não é possivel dividir por 0");
                        }else{
                            $resultado =  $Valor[0] / $Valor[1];
                        }
                        $selecionado[3] = "checked";
                    }
                }else{
                    $msg = OPERACAO;
                }
            }  
        }
    ?>
</head>

<body>
    <form name="calculo" method="GET" action="index.php">
        <table width="500px" height="300px" align="center">
            <tr height="100px">
                <td colspan="2" style="background-color:#615c5c;">
                    <p id="titulo">Calculadora Simples</p>
                </td>
                
            </tr>
            <tr  height="60px">
                <td width="20px">
                    Valor1:<input type="text" name="txtValor1" style="<?php echo($style)?>" value="<?php echo($Valor[0]);?>"><br>
                    Valor2:<input type="text" name="txtValor2" style="<?php echo($style)?>" value="<?php echo($Valor[1]);?>">
                </td>
                <td rowspan="3" width="180px"valign="top">
                    <div id="resultado" >
                        Resultado
                        
                    </div>
                    <div id="valor">
                        <p id="valor1"><?php echo($resultado);?></p>
                        <p><?php echo($msg);?> </p>
                    </div>
                </td>
                
            </tr>
            <tr  height="100px">
                <td >
                    <input type="radio" name="rdOperacao" value="1" <?php echo($selecionado[0]);?>> Somar<br>
                    <input type="radio" name="rdOperacao" value="2" <?php echo($selecionado[1]);?>> Subtrair<br>
                    <input type="radio" name="rdOperacao" value="3" <?php echo($selecionado[2]);?>> Multiplicar<br>
                    <input type="radio" name="rdOperacao" value="4" <?php echo($selecionado[3]);?>>Dividir
                </td>
                
            </tr>
            <tr  height="20px">
                <td align="center">
                    <input type="submit" value="Calcular" name="btnCalcular">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>