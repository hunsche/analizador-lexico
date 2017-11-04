window.onload = function() {
  populateSymbols();

  let tokens = [];
  tokens.push({
    classe: "",
    lexema: ""
  });

  $(function() {
    $("#tokens").bootstrapTable({
      data: tokens
    });
  });

  $(function() {
    $("#tokens").bootstrapTable("refresh");
  });
};

function toAnalyze() {
  let symbols = populateSymbols();
  populateToken(symbols);
}

function populateSymbols() {
  let data = [
    {
      classe: "Rezervat",
      lexema: "int",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "main",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "float",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "if",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "else",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "cout",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "cin",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "while",
      output: ""
    },
    {
      classe: "Rezervat",
      lexema: "return",
      output: ""
    },
    {
      classe: "Separator",
      lexema: "(",
      output: ""
    },
    {
      classe: "Separator",
      lexema: ")",
      output: ""
    },
    {
      classe: "Separator",
      lexema: "{",
      output: ""
    },
    {
      classe: "Separator",
      lexema: "}",
      output: ""
    },
    {
      classe: "Separator",
      lexema: "<<",
      output: ""
    },
    {
      classe: "Separator",
      lexema: ">>",
      output: ""
    },
    {
      classe: "Separator",
      lexema: ";",
      output: ""
    },
    {
      classe: "Separator",
      lexema: '"',
      output: ""
    },
    {
      classe: "Variable",
      lexema: "area",
      output: ""
    },
    {
      classe: "Variable",
      lexema: "raio",
      output: ""
    },
    {
      classe: "Variable",
      lexema: "pi",
      output: ""
    },
    {
      classe: "Numeric",
      lexema: "3, ., 1, 4",
      output: ""
    },
    {
      classe: "Numeric",
      lexema: "0",
      output: ""
    },
    {
      classe: "Attribution",
      lexema: "=",
      output: ""
    },
    {
      classe: "Attribution",
      lexema: "++",
      output: ""
    },
    {
      classe: "Literal",
      lexema: "n, e, g, a, t, i, v, o",
      output: ""
    },
    {
      classe: "Condition",
      lexema: ">",
      output: ""
    },
    {
      classe: "operation",
      lexema: "*",
      output: ""
    }
  ];

  $(function() {
    $("#symbols").bootstrapTable({
      data: data
    });
  });

  return data;
}

function populateToken(symbols) {
  let tokens = [];
  document.getElementById("console").value += "\n" + getTokens(symbols, tokens);
  if (!tokens.length) {
    tokens.push({
      classe: "",
      lexema: ""
    });
  }

  $("#tokens").remove();

  document.getElementById("divTokens").innerHTML = `
  <table id="tokens">
    <thead>
        <tr>
            <th data-field="classe">classe</th>
            <th data-field="lexema">lexema</th>
        </tr>
    </thead>
  </table>`;

  $(function() {
    $("#tokens").bootstrapTable({
      data: tokens
    });
  });
}

function getTokens(symbols, tokens) {
  let code = document.getElementById("code").value;
  let count = 0;
  let spaces = 0;
  let col = 0;
  let row = 1;
  let buffers = [];

  for (let index = 0; index < code.length; index++) {
    count++;
    col++;
    let char = code[index];

    if (char == " ") {
      spaces++;
      continue;
    }

    if (char == "\n") {
      row++;
      col = 0;
      spaces++;
      continue;
    }

    for (let buffer in buffers) buffers[buffer] += char;
    buffers.push(char);

    for (let buffer in buffers) {
      let lexema = findLexema(buffers[buffer], symbols);
      if (lexema) {
        if (count - lexema.lexema.length - spaces > 0) {
          let maior = buffers[0];

          for (let interator in buffers) {
            if (buffers[interator].length > maior.length)
              maior = buffers[interator];
          }

          let error = maior.replace(lexema.lexema, "");

          return (
            "Error line " +
            row +
            ", caracter " +
            col +
            ". In '" +
            error +
            "' did you mean '" +
            findLevenshtein(error, symbols) +
            "'!"
          );
        }

        count = 0;
        spaces = 0;
        buffers = [];
        let obj = {
          classe: lexema.classe,
          lexema: lexema.lexema.replace(/ /g, "").replace(/,/g, "")
        };
        tokens.push(obj);
      }
    }
  }

  return "Success!";
}

function findLexema(value, symbols) {
  let found;
  for (let key in symbols) {
    if (symbols[key].lexema.replace(/ /g, "").replace(/,/g, "") == value) {
      found = symbols[key];
      break;
    }
  }
  return found;
}

function findLevenshtein(value, symbols) {
  let found;
  for (let key in symbols) {
    if (
      symbols[key].classe == "Rezervat" &&
      getDistance(symbols[key].lexema, value) <= value.length / 2
    ) {
      found = symbols[key].lexema;
      break;
    }
  }
  return found;
}

function getDistance(a, b) {
  /*
Copyright (c) 2011 Andrei Mackenzie
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

  if (a.length == 0) return b.length;
  if (b.length == 0) return a.length;

  var matrix = [];

  // increment along the first column of each row
  var i;
  for (i = 0; i <= b.length; i++) {
    matrix[i] = [i];
  }

  // increment each column in the first row
  var j;
  for (j = 0; j <= a.length; j++) {
    matrix[0][j] = j;
  }

  // Fill in the rest of the matrix
  for (i = 1; i <= b.length; i++) {
    for (j = 1; j <= a.length; j++) {
      if (b.charAt(i - 1) == a.charAt(j - 1)) {
        matrix[i][j] = matrix[i - 1][j - 1];
      } else {
        matrix[i][j] = Math.min(
          matrix[i - 1][j - 1] + 1, // substitution
          Math.min(
            matrix[i][j - 1] + 1, // insertion
            matrix[i - 1][j] + 1
          )
        ); // deletion
      }
    }
  }

  return matrix[b.length][a.length];
}
