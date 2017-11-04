<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Lexical analysis</title>
    <link rel="icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="external/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery.min.js"></script>
    <script src="external/tether/dist/js/tether.min.js"></script>
    <script src="external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <div class="jumbotron">
        <div class="center margin-in-bottom">
            <h2>Lexical analysis</h2>
        </div>
    </div>

    <div class="col-md-7 text-right">
        <textarea id="code" rows="19" cols="60">
int main(){
    float area;
    float raio;
    float pi = 3.14;
    
    cin >> raio;

    if(raio > 0){
        area = raio * raio * pi;
    } else {
        cout << "negativo";

        while(raio)
            raio++;
    }

    return 0;
}        
        </textarea>
    </div>

    <div class="col-md-5 margin-in-top-for-buttons margin-in-let-for-label">
        <b>Matheus Arendt Hunsche</b>
    </div>
    <div class="col-md-5">
        <b>Eduardo Ferrarezi</b>
    </div>
    <div class="col-md-5 margin-in-bottom-for-buttons">
        <b>Rodrigo Rotava</b>
    </div>



    <div class="col-md-5 align-text-bottom">
        <div class="btn-toolbar">
            <button type="button" onclick="toAnalyze()" class="btn btn-success btn-lg">Run</button>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#symbolsModal">Symbols</button>
            <div class="modal fade" id="symbolsModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 1;">&times;</button>
                        </div>

                        <div class="modal-body text-center">
                            <table id="symbols">
                                <thead>
                                    <tr>
                                        <th data-field="classe">classe</th>
                                        <th data-field="lexema">lexema</th>
                                        <th data-field="output">output</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tokensModal">Tokens</button>
            <div class="modal fade" id="tokensModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 1;">&times;</button>
                        </div>
                        <div id="divTokens" class="modal-body text-center">
                            <table id="tokens">
                                <thead>
                                    <tr>
                                        <th data-field="classe">classe</th>
                                        <th data-field="lexema">lexema</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/html/afd.html" type="button" class="btn btn-primary btn-lg">AFD</a>
        </div>
    </div>

    <div class="col-md-7 text-right margin-in-bottom">
        <textarea disabled id="console" rows="3" cols="60">Wait!</textarea>
    </div>

</body>

</html>