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

    <div class="center margin-in-bottom margin-in-top">
        <h2>Lexical analysis</h2>
    </div>

    <div class="jumbotron">
        <div class="center">
            <textarea rows="16" cols="40">
int main(){
    float area;
    float raio = 3.00;
    float pi = 3.14;
    
    if(raio > 0){
        area = raio * raio * pi;
    } else {
        cout << "raio negativo";
        while(raio)
            raio++;
    }

    return 0;
}
            </textarea>
        </div>
    </div>

    <div class="center margin-in-bottom">
        <button type="button" onclick="seeAfd()" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#afd">See AFD</button>
        <div class="modal fade" id="afd" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 1;">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <table id="afd">
                            <thead>
                                <tr>
                                    <th data-field="output">Output</th>
                                    <th data-field="goldenRatio">φ</th>
                                    <th data-field="i">i</th>
                                    <th data-field="f">f</th>
                                    <th data-field="(">(</th>
                                    <th data-field="t">t</th>
                                    <th data-field="r">r</th>
                                    <th data-field="u">u</th>
                                    <th data-field="e">e</th>
                                    <th data-field=")">)</th>
                                    <th data-field="s">s</th>
                                    <th data-field="t">t</th>
                                    <th data-field="r">r</th>
                                    <th data-field="i">i</th>
                                    <th data-field="n">n</th>
                                    <th data-field="g">g</th>
                                    <th data-field="a">a</th>
                                    <th data-field="=">=</th>
                                    <th data-field='"'>"</th>
                                    <th data-field=';'>;</th>
                                    <th data-field='c'>c</th>
                                    <th data-field='o'>o</th>
                                    <th data-field='m'>m</th>
                                    <th data-field='p'>p</th>
                                    <th data-field='i'>i</th>
                                    <th data-field='l'>l</th>
                                    <th data-field='a'>a</th>
                                    <th data-field='d'>d</th>
                                    <th data-field='o'>o</th>
                                    <th data-field='r'>r</th>
                                    <th data-field='e'>e</th>
                                    <th data-field='s'>s</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" onclick="toAnalyze()" class="btn btn-primary btn-lg">To Analyze</button>
    </div>

    <div class="jumbotron">
        <div class="text-center">
            <div class="col-md-4 text-center">
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
    
            <div class="col-md-4 text-center">
                <table id="token">
                    <thead>
                        <tr>
                            <th data-field="classe">classe</th>
                            <th data-field="lexema">lexema</th>
                        </tr>
                    </thead>
                </table>
            </div>
    
            <div class="col-md-4 text-center">
                <table id="levenshtein">
                    <thead>
                        <tr>
                            <th data-field="word">word</th>
                            <th data-field="similar">similar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="center margin-in-top">
        <b>Matheus Arendt Hunsche, Eduardo Ferrarezi, Rodrigo Rotava</b>
    </div>

</body>

</html>