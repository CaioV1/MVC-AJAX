<html>
    <head>
        <title>
            AJAX MVC - TESTE
        </title> 
        <meta charset="utf-8">
        <script src="View/JQuery/jquery-3.3.1.js"></script>
        <script src="View/JavaScript/crud_script.js"></script>    
        <form name="frm_filme" method="GET" action="index.php">
            <body>
                <div id="teste">
                    
                </div>    
                <table>
                    <tr>
                        <td>
                            Nome
                        </td>
                        <td>
                            <input type="text" name="txt_nome" id="txt_nome" value="">
                        </td>    
                    </tr>
                    <tr>
                        <td>
                            Classficação
                        </td>
                        <td>
                            <input type="text" name="txt_classificacao" id="txt_classificacao" value="">
                        </td>    
                    </tr>    
                    <tr>
                        <td>
                            Estúdio
                        </td>
                        <td>
                            <input type="text" name="txt_estudio" id="txt_estudio" value="">
                        </td>    
                    </tr>    
                    <tr>
                        <td colspan="2">
                            <input type="button" name="btn_enviar" id="btn_enviar">
                        </td>    
                    </tr>
                </table>
                <br>   
                <table border="1" id="table">  
                </table>  
            </body> 
        </form>    
    </head>    
</html>    