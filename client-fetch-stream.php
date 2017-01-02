<?php ob_start("ob_gzhandler"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Links</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Nav Link 1</a></li>
        <li><a href="#">Nav Link 2</a></li>
        <li><a href="#">Nav Link 3</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 col-sm-offset-2 text-left"> 
      <h1>Random Links</h1>

      <ol>
        <template id="link"><li><a></a></li></template>
        <script>
        fetch('links-stream.php').then(function (response) {
            var reader = response.body.getReader()
            var decoder = new TextDecoder()
            var partial = ''
            var template = document.getElementById('link')
            var node = template.content
            var list = template.parentNode

            function go() {
                return reader.read().then(function(result) {
                    var lines = (partial + decoder.decode(result.value || new Uint8Array, {
                        stream: !result.done
                    })).split("\n")

                    partial = lines.pop()

                    const frag = document.createDocumentFragment()

                    lines.forEach(function (link, index) {
                        link = JSON.parse(link)

                        var el = document.importNode(node, true)
                        
                        var a = el.querySelector('a')
                        a.href = link.link
                        a.textContent = link.name
                        a.setAttribute('data-index', index)
                        
                        frag.appendChild(el)
                    })
                    
                    list.appendChild(frag)

                    if (!result.done) {
                        return go()
                    }
                })
            }

            return go()
        })
        </script>
      </ol>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sample Footer</p>
</footer>

</body>
</html>