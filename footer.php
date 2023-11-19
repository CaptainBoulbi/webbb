
<footer class="navbar navbar-expand-lg bg-body-tertiary mt-auto">
  <div class="container-fluid">
    <a href="#" class="navbar-brand">
      <img src="/img/logo.png" alt="WEBBB logo" width="50" height="50">
      <span class="text-muted">© 2023 WEBBB, Inc</span>
    </a>
  </div>

  <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
    <li class="ms-3"><a class="text-muted" href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
    <li class="ms-3"><a class="text-muted" href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
    <li class="ms-3"><a class="text-muted" href="#"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a></li>
    <li class="ms-3"></li>
  </ul>
</footer>

<script>
function darkMode() {
  sessionStorage.setItem("theme", "dark");
  set_theme()
}
function lightMode() {
  sessionStorage.setItem("theme", "light");
  set_theme()
}

function set_theme(){
  if (sessionStorage.getItem("theme") == ""){
    sessionStorage.setItem("theme", "dark");
  }

  var x = document.getElementsByTagName("html")[0];
  if (sessionStorage.getItem("theme") == "dark")
    x.setAttribute("data-bs-theme", "dark")
  else
    x.setAttribute("data-bs-theme", "light")
}

function goEn(){
  window.location.replace(window.location.href.replace("/fr/", "/en/"))
}
function goFr(){
  window.location.replace(window.location.href.replace("/en/", "/fr/"))
}

// search bar

const page = document.getElementsByClassName("contenu")[0]
const contenu = page.innerHTML.split(" ")

const searchInput = document.querySelector("[data-search]")
searchInput.addEventListener("input", (e) => {
  const value = e.target.value
  const founds = []

  if (value.length == 0 || value === null){
    page.innerHTML = contenu.join(" ")
    return
  }

  for(var i=0; i<contenu.length; i++) {      
    const balise = /[<>]+/g
    if (contenu[i].match(balise) != null){
      founds[i] = contenu[i]
      continue
    }

    var isFound = contenu[i].toUpperCase().search(value.toUpperCase())

    if(isFound >= 0) { 
      founds[i] = '<span class="searched bg-warning text-dark"> ' + contenu[i] + ' </span>'
    }else{
      founds[i] = contenu[i]
    }
  }

  page.innerHTML = founds.join(" ")

  console.log(founds)
})
</script>

<script src="https://ramachandrajr.github.io/lorem-js/lorem-js/lorem.min.js"></script>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"
></script>
<script>
// enable popovers
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

const popover = new bootstrap.Popover('.popover-dismiss', {
  trigger: 'focus'
})
</script>
</body>
</html>
